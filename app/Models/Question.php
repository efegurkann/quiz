<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Question extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'question', 'image', 'answer1', 'answer2', 'answer3', 'answer4', 'correct_answer'];
    //
}
