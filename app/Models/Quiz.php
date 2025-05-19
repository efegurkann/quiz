<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'finished_at'];
}
