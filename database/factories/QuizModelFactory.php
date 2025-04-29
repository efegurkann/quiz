<?php

namespace Database\Factories;
use App\Models\QuizModel;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class QuizModelFactory extends Factory
{

    protected $model = QuizModel::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>$this->faker->sentence(rand(3, 10)),
            'description'=>$this->faker->paragraph(rand(3, 10)),
        ];
    }
}
