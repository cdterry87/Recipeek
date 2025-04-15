<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_profile_page_renders_correctly()
    {
        // Try to access the page unauthenticated and assert redirect to login
        $response = $this->get(route('user-profile'));
        $response->assertRedirect('/login');

        // Create a user, authenticate the user, access the page again and assert 200
        $user = User::factory()->create();
        $this->actingAs($user);
        $response = $this->get(route('user-profile'));
        $response->assertStatus(200);
        $response->assertSee('Edit Profile');
        $response->assertSee('Change Password');
        $response->assertSee('Friend Request Link');
    }

    public function test_remove_avatar_works_correctly()
    {
        $user = User::factory()->create([
            'avatar' => 'storage/avatars/test-avatar.jpg',
        ]);
        $this->actingAs($user);

        Livewire::test('user-profile')
            ->assertSet('avatarPath', 'storage/avatars/test-avatar.jpg')
            ->call('removeAvatar')
            ->assertHasNoErrors()
            ->assertSet('avatarPath', null);
    }

    public function test_edit_profile_form_submits_correctly()
    {
        $user = User::factory()->create([
            'avatar' => 'storage/avatars/test-avatar.jpg',
        ]);
        $this->actingAs($user);

        Livewire::test('user-profile')
            ->assertSet('name', $user->name)
            ->assertSet('email', $user->email)
            ->assertSet('bio', $user->bio)
            ->assertSet('avatarPath', 'storage/avatars/test-avatar.jpg')
            ->set('name', 'New Name')
            ->set('email', 'newemail@example.com')
            ->set('bio', 'New bio')
            ->call('updateProfile')
            ->assertHasNoErrors()
            ->set('name', '')
            ->set('email', '')
            ->call('updateProfile')
            ->assertHasErrors(['name', 'email']);

        // Assert database was updated
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'New Name',
            'email' => 'newemail@example.com',
            'bio' => 'New bio',
        ]);
    }

    public function test_change_password_form_submits_correctly()
    {
        $user = User::factory()->create([
            'password' => bcrypt('oldpassword'),
        ]);
        $this->actingAs($user);

        Livewire::test('user-profile')
            ->set('password', 'password123')
            ->set('password_confirmation', 'password1234')
            ->call('changePassword')
            ->assertHasErrors(['password'])
            ->set('password_confirmation', 'password123')
            ->call('changePassword')
            ->assertHasNoErrors();
    }

    public function test_friend_request_link_form_submits_correctly()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test('user-profile')
            ->call('clearFriendRequestLink')
            ->assertHasNoErrors()
            ->assertSet('private_friend_request_link', null)
            ->call('regenerateFriendRequestLink')
            ->assertHasNoErrors()
            ->assertSet('private_friend_request_link', $user->getPrivateFriendRequestLink());
    }
}
