<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Quiz;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Quiz::class;

    public function definition(): array
    {

        $title = $this->faker->sentence(rand(3,7));

        return [
            'title' => $title,
            'description' => $this->faker->text(200),
            'slug' => Str::slug($title),

        ];
    }
}
