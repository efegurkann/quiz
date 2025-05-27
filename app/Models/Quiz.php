<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Quiz extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'description', 'status', 'finished_at', 'slug'];

    protected $dates = ['finished_at'];

    protected $casts = [
        'finished_at' => 'datetime',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
