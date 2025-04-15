<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Recipe;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeTest extends TestCase
{
    use RefreshDatabase;

    public function test_welcome_page_renders_correctly()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('hero-section');
        $response->assertSee('details-section');
        $response->assertSee('trending-section');
        $response->assertSee('subscribe-section');
        $response->assertSee('no-recipes');
        $response->assertDontSee('recipe-grid');

        // Create 4 public recipes
        Recipe::factory()->count(4)->create(['public' => true]);

        // Refresh the page
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('recipe-grid');
        $response->assertDontSee('no-recipes');
    }

    public function test_discover_recipes_redirects_correctly()
    {
        Recipe::factory()->create(['public' => true, 'title' => 'Focaccia Bread']);
        Recipe::factory()->count(4)->create(['public' => true]);

        Livewire::test('welcome')
            ->set('search', 'Focaccia')
            ->call('discover')
            ->assertRedirect(route('discover-recipes', ['search' => 'Focaccia']));
    }

    public function test_subscribe_form_submits_correctly()
    {
        Livewire::test('welcome')
            ->assertSee('subscribe-form')
            ->assertSet('isFormSubmitted', false)
            ->set('email', 'invalid-email')
            ->call('subscribe')
            ->assertHasErrors(['email' => 'email'])
            ->set('email', 'subscriber@example.com')
            ->call('subscribe')
            ->assertHasNoErrors()
            ->assertSet('isFormSubmitted', true);
    }
}
