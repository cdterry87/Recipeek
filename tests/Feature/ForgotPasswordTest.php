<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ForgotPasswordTest extends TestCase
{
    public function test_forgot_password_page_renders_correctly()
    {
        $response = $this->get(route('forgot-password'));
        $response->assertStatus(200);
        $response->assertSee('Forgot Your Password?');
    }

    public function test_forgot_password_form_submits_correctly()
    {
        // Create a user to submit the password reset request
        $user = User::factory()->create([
            'email' => 'test@example.com'
        ]);

        Livewire::test('forgot-password')
            ->set('email', '')
            ->call('submit')
            ->assertHasErrors('email')
            ->set('email', 'invalid-email')
            ->call('submit')
            ->assertHasErrors('email')
            ->set('email', 'test@example.com')
            ->call('submit')
            ->assertHasNoErrors();

        // Assert that a password reset request was saved
        $this->assertDatabaseHas('password_reset_tokens', [
            'email' => 'test@example.com'
        ]);
    }
}
