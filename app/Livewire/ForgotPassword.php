<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\PasswordResetToken;

class ForgotPassword extends Component
{
    public $email;

    public function render()
    {
        return view('livewire.forgot-password');
    }

    public function submit()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        // Check if the email exists in the users table
        $user = User::query()
            ->where('email', $this->email)
            ->first();

        if ($user) {
            // Delete any previous password reset requests for this user
            PasswordResetToken::query()
                ->where('email', $this->email)
                ->delete();

            // Create a new password reset token
            PasswordResetToken::create([
                'email' => $this->email,
                'token' => Str::uuid(),
                'created_at' => now(),
            ]);
            $this->email = null;
        }

        // @todo - handle emailing password reset link

        session()->flash('forgot-password-message', 'Thank you for submitting a password reset request. If your email address is in our system, you will receive a password reset link in your email shortly.');
    }
}
