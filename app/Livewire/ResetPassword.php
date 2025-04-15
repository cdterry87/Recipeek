<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\PasswordResetToken;

class ResetPassword extends Component
{
    public $token;
    public $password, $password_confirmation;

    public function mount($token)
    {
        $this->token = $token;
    }

    public function render()
    {
        return view('livewire.reset-password');
    }

    public function submit()
    {
        $passwordResetRequest = PasswordResetToken::query()
            ->where('token', $this->token)
            ->firstOrFail();

        $user = User::query()
            ->where('email', $passwordResetRequest->email)
            ->first();

        // Verify user exists in the system
        if (!$user) {
            session()->flash('password-reset-error', 'This user account was not found in our system. Please create an account to continue.');
            return;
        }

        // If password request is older than 2 hours, display an error
        if ($passwordResetRequest->created_at < now()->subHours(2)) {
            session()->flash('password-reset-error', 'This password reset request has expired. Please request a new password reset.');
            return;
        }

        // Validate the new password
        $this->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        // Update the user's password
        $user->password = bcrypt($this->password);
        $user->save();

        // Delete the password reset token
        PasswordResetToken::query()
            ->where('token', $this->token)
            ->delete();

        // Log the user in
        auth()->login($user);

        // Redirect to the user's profile with a success message
        return redirect()->route('user-profile')
            ->with('update-profile-message', 'Your password has been successfully reset. You are now logged in.');
    }
}
