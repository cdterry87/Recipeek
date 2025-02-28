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
            'difficulty' => fake()->randomElement(['Easy', 'Normal', 'Hard', 'Expert']),
            'category' => fake()->randomElement(['Snack', 'Dinner', 'Breakfast', 'Lunch', 'Drink', 'Dessert']),
            'hours' => fake()->numberBetween(0, 3),
            'minutes' => fake()->randomElement([15, 25, 30, 45, 55]),
            'servings' => fake()->numberBetween(1, 8),
            'calories' => fake()->numberBetween(100, 1000),
            'image' => 'demo/recipe-' . fake()->numberBetween(1, 12) . '.jpg',
            'video' => null,
            'private' => false,
            'user_id' => User::factory(),
        ];
    }
}
