<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create a demo user
        User::factory()->create([
            'name' => 'Demo User',
            'email' => 'demo@example.com',
            'password' => bcrypt('password'), // Use bcrypt to hash the password
            'avatar' => 'demo/demo-user.jpg', // Path to the demo avatar image
            'bio' => 'I may just be a demo user, but I love cooking and sharing all of my delicious recipes with the Recipeek community! I hope you enjoy my recipes as much as I do!',
            'public' => true
        ]);

        $this->call([
            RecipeSeeder::class,
        ]);

        // Create 10 random users with 1 - 3 recipes each
        // User::factory(10)->create()->each(function ($user) {
        //     $user->recipes()->saveMany(Recipe::factory(rand(1, 3))->make());
        // });
    }
}
