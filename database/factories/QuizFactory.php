<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Quiz;
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
        return [
            'title' => $this->faker->sentence(rand(3,7)),
            'description' => $this->faker->text(200),

        ];
    }
}
