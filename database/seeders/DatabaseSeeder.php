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
        $demoUser = User::factory()->create([
            'name' => 'Demo User',
            'email' => 'demo@example.com',
            'password' => bcrypt('password'), // Use bcrypt to hash the password
        ]);

        // Create recipes for the demo user
        Recipe::factory(10)->create([
            'user_id' => $demoUser->id,
        ]);

        // @todo - Add ingredients for each recipe
        // @todo - Add instructions for each recipe
        // @todo - Add tags for each recipe
        // @todo - Add ratings for each recipe

        // @todo - Instead of making it seed random text for recipes, instead have it seed some real recipes with real images
    }
}
