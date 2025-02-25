<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UserProfile extends Component
{
    use WithFileUploads;

    public $name, $email, $bio, $avatar, $password, $password_confirmation;
    public $avatarPath = null;

    public function mount()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        if (!$user) {
            return redirect()->route('login');
        }

        $this->name = $user->name;
        $this->email = $user->email;
        $this->bio = $user->bio;
        $this->avatarPath = $user->avatar;
    }

    public function render()
    {
        return view('livewire.user-profile');
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'bio' => 'nullable|string|max:500',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $user = auth()->user();
        if ($this->avatar) {
            $path = $this->avatar->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->name = $this->name;
        $user->email = $this->email;
        $user->bio = $this->bio;
        $user->save();

        // Set the avatar path if a file was uploaded
        $this->avatarPath = null;
        if ($user->avatar) {
            $this->avatar = null;
            $this->avatarPath = $user->avatar;
        }

        session()->flash('update-profile-message', 'Profile updated successfully.');
    }

    public function changePassword()
    {
        $this->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();
        $user->password = bcrypt($this->password);
        $user->save();

        session()->flash('change-password-message', 'Password changed successfully.');
    }

    public function removeAvatar()
    {
        $user = auth()->user();
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
            $user->avatar = null;
            $user->save();
            $this->avatarPath = null;
            session()->flash('update-profile-message', 'Avatar removed successfully.');
        }
    }
}
