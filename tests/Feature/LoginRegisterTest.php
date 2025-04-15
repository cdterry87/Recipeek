<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginRegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_register_page_renders_correctly()
    {
        // Make sure page renders correctly
        $response = $this->get(route('login'));
        $response->assertStatus(200);
        $response->assertSee('Email');
        $response->assertSee('Password');
        $response->assertSee('Login');
        $response->assertSee('Forgot your password?');
        $response->assertSee('Continue with Google');
        $response->assertSee('Join Our Community');
    }

    public function test_login_works_correctly()
    {
        User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        Livewire::test('login-register')
            ->assertSet('hasLoginError', false)
            ->set('email', '')
            ->set('password', '')
            ->call('login')
            ->assertHasErrors(['email', 'password'])
            ->set('email', 'test@example.com')
            ->set('password', 'wrongpassword')
            ->call('login')
            ->assertSet('hasLoginError', true)
            ->set('password', 'password123')
            ->call('login')
            ->assertSet('hasLoginError', false)
            ->assertRedirect(route('home'));

        $this->assertAuthenticated();
    }

    public function test_register_works_correctly()
    {
        Livewire::test('login-register')
            ->set('name', '')
            ->set('email', '')
            ->set('password', '')
            ->set('password_confirmation', '')
            ->call('register')
            ->assertHasErrors(['name', 'email', 'password'])
            ->set('name', 'Test User')
            ->set('email', 'test@example.com')
            ->set('password', 'password123')
            ->set('password_confirmation', 'password123')
            ->call('register')
            ->assertHasNoErrors()
            ->assertRedirect(route('home'));

        $this->assertAuthenticated();
    }
}
