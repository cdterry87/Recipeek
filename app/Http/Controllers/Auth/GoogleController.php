<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName() ?? $googleUser->getNickname(),
                'password' => bcrypt(Str::random(24)), // Random since no password needed
                'avatar' => $googleUser->getAvatar(),
                'private_friend_request_id' => Str::uuid()
            ]
        );

        Auth::login($user, true);

        return redirect()->intended('/');
    }
}
