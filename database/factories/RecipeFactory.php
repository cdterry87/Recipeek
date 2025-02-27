<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => substr(ucwords(fake()->words(rand(2, 5), true)), 0, 60),
            'description' => substr(fake()->sentence(), 0, 80),
            'prep_hours' => fake()->numberBetween(0, 2),
            'prep_minutes' => fake()->numberBetween(0, 59),
            'cook_hours' => fake()->numberBetween(0, 2),
            'cook_minutes' => fake()->numberBetween(0, 59),
            'servings' => fake()->numberBetween(1, 10),
            'calories' => fake()->numberBetween(100, 1000),
            'image' => null,
            'video' => null,
            'private' => false,
            'user_id' => User::factory(),
        ];
    }
}
