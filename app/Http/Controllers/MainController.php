<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

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
        $quiz = Quiz::where('slug', $slug)->withCount('questions')->first() ?? abort(404, 'Quiz bulunamadı');
        return view('quiz_detail', compact('quiz'));
    }

    public function result(Request $request, $slug)
    {
        return $request->post();
    }
}


