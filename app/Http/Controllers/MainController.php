<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Result;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function dashboard()
    {
        $quizzes = Quiz::where('status', 'active')->withCount('questions')->paginate(5);
        return view('dashboard', compact('quizzes'));
    }

    public function quiz($slug)
    {
        $quiz = Quiz::where('slug', $slug)->with('questions')->first() ?? abort(404, 'Quiz bulunamadı');
        return view('quiz', compact('quiz'));
    }

    public function quiz_detail($slug)
    {
        $quiz = Quiz::where('slug', $slug)->withCount(['my_result', 'topTen'])->first() ?? abort(404, 'Quiz bulunamadı');
        return view('quiz_detail', compact('quiz'));
    }

    public function result(Request $request, $slug)
    {
        $quiz = Quiz::with('questions')->whereSlug($slug)->first() ?? abort(404, 'Quiz Bulunamadı');
        $correct = 0;

        if ($quiz->my_result) {
            abort(404, 'Bu quiz\'e daha önce katıldınız.');
        }

        foreach ($quiz->questions as $question) {
            Answer::create([
                'user_id' => Auth::id(),
                'question_id' => $question->id,
                'answer' => $request->post($question->id),
            ]);

            if ($question->correct_answer === $request->post($question->id)) {
                $correct+=1;
            }
        }

        $point = round(100 / count($quiz->questions)) * $correct;
        $wrong = count($quiz->questions) - $correct;

        Result::create([
            'user_id' => Auth::id(),
            'quiz_id' => $quiz->id,
            'point' => $point,
            'correct' => $correct,
            'wrong' => $wrong
        ]);

        return redirect()->route('quiz.detail', $quiz->slug)->with('success', 'Quiz başarıyla tamamlandı. Puanınız: ' . $point);
    }
}
