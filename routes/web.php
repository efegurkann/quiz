<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/panel', [MainController::class, 'dashboard'])->name('dashboard');
    Route::get('/quiz/detay/{slug}', [MainController::class, 'quiz_detail'])->name('quiz.detail');
    Route::get('/quiz/{slug}', [MainController::class, 'quiz'])->name('quiz.join');
    Route::post('/quiz/{slug}', [MainController::class, 'result'])->name('quiz.result');
});

Route::group([
    'middleware' => ['auth', 'isAdmin'],
    'prefix' => 'admin',
], function () {
    Route::get('quizzes/{id}', [QuizController::class, 'destroy'])->whereNumber('id', '[0-9]+')->name('quizzes.destroy');
    Route::resource('quizzes', QuizController::class);
    Route::resource('quizzes/{quiz_id}/questions', QuestionController::class);
    route::get('quizzes/{quiz_id}/questions/{question_id}/destroy', [QuestionController::class, 'destroy'])->whereNumber(['quiz_id', 'question_id'], '[0-9]+')->name('questions.destroy');
});
