<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuizCreateRequest;
use App\Http\Requests\QuizUpdateRequest;
class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quizzes = Quiz::withCount('questions');

        if (request()->get('title')){
            $quizzes = $quizzes->where('title', 'LIKE', '%' . request()->get('title') . '%');
        };

        if (request()->get('status')){
            $quizzes = $quizzes->where('status', request()->get('status'));
        };

        $quizzes = $quizzes->paginate(5);

        return view('admin.quiz.list', compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.quiz.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuizCreateRequest $request)
    {
        Quiz::create($request->post());
        return redirect()->route('quizzes.index')->withSuccess('Quiz başarıyla oluşturuldu.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $quiz = Quiz::withCount('questions')->find($id) ?? abort(404, 'Quiz bulunamadı');
        return view ('admin.quiz.edit', compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuizUpdateRequest $request, string $id)
    {
        $quiz = Quiz::find($id) ?? abort(404, 'Quiz bulunamadı');
        Quiz::where('id', $id)->first()->update($request->except('_token', '_method'));
        return redirect()->route('quizzes.index')->withSuccess('Quiz başarıyla güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $quiz = Quiz::find($id) ?? abort(404, 'Quiz bulunamadı');
        $quiz->delete();
        return redirect()->route('quizzes.index')->withSuccess('Quiz silme işlemi başarıyla gerçekleştirildi.');
    }
}
