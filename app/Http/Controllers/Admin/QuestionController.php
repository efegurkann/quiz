<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Quiz;
use App\Http\Requests\QuestionCreateRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\QuestionUpdateRequest;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $quiz = Quiz::where('id', $id)->with('questions')->first() ?? abort(404, 'Quiz bulunamadı');
        return view('admin.question.list', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $quiz = Quiz::find($id);
        return view('admin.question.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionCreateRequest $request, $id)
    {
        if($request->hasFile('image')){
            $fileName = Str::slug($request->question).'.'.$request->image->extension();
            $fileNameWithUpload = 'uploads/'.$fileName;
            $request->image->move(public_path('uploads'), $fileName);
            $request->merge(['image' => $fileNameWithUpload]);
        }
        Quiz::find($id)->questions()->create($request->post());


        return redirect()->route('questions.index', $id)->with('success', 'Soru başarıyla oluşturuldu');
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
    public function edit($quiz_id,$question_id)
    {
        $question = Quiz::find($quiz_id)->questions()->whereId($question_id)->first() ?? abort(404, 'Quiz Ve Soru bulunamadı');
        return view('admin.question.edit', compact('question'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionUpdateRequest $request, $quiz_id, $question_id)
    {
        if($request->hasFile('image')){
            $fileName = Str::slug($request->question).'.'.$request->image->extension();
            $fileNameWithUpload = 'uploads/'.$fileName;
            $request->image->move(public_path('uploads'), $fileName);
            $request->merge(['image' => $fileNameWithUpload]);
        }
        Quiz::find($quiz_id)->questions()->whereId($question_id)->first()->update($request->post());


        return redirect()->route('questions.index', $quiz_id)->with('success', 'Soru başarıyla güncellendi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($quiz_id, $question_id)
    {
        Quiz::find($quiz_id)->questions()->whereId($question_id)->first()->delete();
        return redirect()->route('questions.index', $quiz_id)->with('success', 'Soru başarıyla silindi');
    }
}
