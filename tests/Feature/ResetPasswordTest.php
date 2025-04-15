<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Support\Str;
use App\Models\PasswordResetToken;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_reset_password_page_renders_correctly()
    {
        // Create a user
        User::factory()->create([
            'email' => 'test3294328409@example.com'
        ]);

        // Create a password reset token
        $token = Str::uuid();
        PasswordResetToken::create([
            'email' => 'test3294328409@example.com',
            'token' => $token,
            'created_at' => now()
        ]);

        $response = $this->get(route('reset-password', [
            'token' => $token
        ]));
        $response->assertStatus(200);
        $response->assertSee('Reset Your Password');
    }

    public function test_reset_password_form_submits_correctly()
    {
        // Create a user
        User::factory()->create([
            'email' => 'test324923084@example.com'
        ]);

        // Create a password reset token
        $token = '1234-1234-1234-1234';
        PasswordResetToken::create([
            'email' => 'test324923084@example.com',
            'token' => $token,
            'created_at' => now()
        ]);

        Livewire::test('reset-password', [
            'token' => '1234-1234-1234-1234'
        ])
            ->set('password', '')
            ->call('submit')
            ->assertHasErrors('password')
            ->set('password', 'password1234')
            ->set('password_confirmation', 'password1234')
            ->call('submit')
            ->assertHasNoErrors()
            ->assertRedirect(route('user-profile'));

        // Assert that a password reset token was removed
        $this->assertDatabaseMissing('password_reset_tokens', [
            'email' => 'test324923084@example.com'
        ]);
    }
}
