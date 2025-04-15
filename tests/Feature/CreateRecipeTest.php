<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateRecipeTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_recipe_page_renders_correctly()
    {
        // Try to access the page unauthenticated and assert redirect to login
        $response = $this->get('/create-recipe');
        $response->assertRedirect('/login');

        // Create a user, authenticate the user, access the page again and assert 200
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);
        $response = $this->get('/create-recipe');
        $response->assertStatus(200);
    }

    public function test_create_recipe_form_submits_correctly()
    {
        // Create a user, authenticate the user
        $user = \App\Models\User::factory()->create();
        $this->actingAs($user);

        Livewire::test('App\Livewire\CreateRecipe')
            ->set([
                'title' => 'Test Recipe',
                'description' => 'This is a test recipe.',
                'category' => 'Dessert',
                'cuisine' => 'Italian',
                'difficulty' => 'Easy',
                'method' => 'Baking',
                'occasion' => 'Birthday',
                'hours' => 1,
                'minutes' => 30,
                'servings' => 4,
                'calories' => 200,
                'image' => null,
                'video' => null,
                'notes' => null,
                'public' => true,
            ])
            ->call('saveRecipe')
            ->assertRedirect(route('edit-recipe', [
                'uuid' => \App\Models\Recipe::where('title', 'Test Recipe')->first()->uuid,
            ]));
    }
}
