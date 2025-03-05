<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        // Read the JSON file
        $json = File::get(database_path('data/recipes.json'));
        $recipes = json_decode($json, true);

        foreach ($recipes as $recipeData) {
            // Create the recipe record
            $recipe = Recipe::create([
                'user_id' => $recipeData['user_id'],
                'title' => $recipeData['title'],
                'description' => $recipeData['description'],
                'category' => $recipeData['category'],
                'cuisine' => $recipeData['cuisine'],
                'difficulty' => $recipeData['difficulty'],
                'method' => $recipeData['method'],
                'occasion' => $recipeData['occasion'],
                'hours' => $recipeData['hours'],
                'minutes' => $recipeData['minutes'],
                'servings' => $recipeData['servings'],
                'calories' => $recipeData['calories'],
                'image' => 'demo/' . $recipeData['image'],
                'video' => isset($recipeData['video']) ? $recipeData['video'] : null,
                'notes' => isset($recipeData['notes']) ? $recipeData['notes'] : null,
                'public' => $recipeData['public'],
            ]);

            // Insert ingredients
            foreach ($recipeData['ingredients'] as $ingredient) {
                DB::table('recipes_ingredients')->insert([
                    'recipe_id' => $recipe->id,
                    'ingredient' => $ingredient['ingredient'],
                    'quantity' => $ingredient['quantity'],
                    'unit' => $ingredient['unit'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Insert instructions
            foreach ($recipeData['instructions'] as $instruction) {
                DB::table('recipes_instructions')->insert([
                    'recipe_id' => $recipe->id,
                    'instruction' => $instruction['instruction'],
                    'order' => $instruction['order'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
