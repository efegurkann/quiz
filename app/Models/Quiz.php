<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Result;

class Quiz extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'description', 'status', 'finished_at', 'slug'];

    protected $dates = ['finished_at'];

    protected $casts = [
        'finished_at' => 'datetime',
    ];


    protected $appends = ['details'];

    public function getDetailsAttribute()
    {
        if ($this->results()->count() > 0) {
            return [
                'average' => round($this->results()->avg('point')),
                'join_count' => $this->results()->count(),
            ];
        }
        return null;
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function my_result()
    {
        return $this->hasOne(Result::class)->where('user_id', auth()->user()->id);
    }

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
