<?php

use App\Livewire\Friends;
use App\Livewire\Welcome;
use App\Livewire\Following;
use App\Livewire\MyRecipes;
use App\Livewire\EditRecipe;
use App\Livewire\ViewRecipe;
use App\Livewire\UserProfile;
use App\Livewire\ViewCreator;
use App\Livewire\CreateRecipe;
use App\Livewire\SavedRecipes;
use App\Livewire\LoginRegister;
use App\Livewire\ResetPassword;
use App\Livewire\ForgotPassword;
use App\Livewire\FriendRequests;
use App\Livewire\DiscoverRecipes;
use Illuminate\Support\Facades\Route;
use App\Livewire\PrivateFriendRequest;

Route::get('/', Welcome::class)->name('home');

// Login/Register (with Google login with Socialite)
Route::get('login', LoginRegister::class)->name('login');

Route::post('logout', function () {
    auth()->logout();
    session()->invalidate();
    return redirect()->route('home');
})->name('logout');

// Forgot Password
Route::get('forgot-password', ForgotPassword::class)->name('forgot-password');

// Password Reset
Route::get('reset-password/{token}', ResetPassword::class)->name('reset-password');

// About
Route::get('about', function () {
    return view('about');
})->name('about');

// Privacy Policy
Route::get('privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

// Terms of use
Route::get('terms-of-use', function () {
    return view('terms-of-use');
})->name('terms-of-use');

// Cookie Policy
Route::get('cookie-policy', function () {
    return view('cookie-policy');
})->name('cookie-policy');

// Discover
Route::get('discover', DiscoverRecipes::class)->name('discover-recipes');

// Recipe
Route::get('recipes/{recipe}', ViewRecipe::class)->name('view-recipe');

// Creator
Route::get('/creators/{creator}', ViewCreator::class)->name('view-creator');


// ///////////////////////
// Authenticated Routes
// ///////////////////////
Route::middleware(['auth:web'])->group(function () {
    // User Profile
    Route::get('profile', UserProfile::class)->name('user-profile');

    // My Recipes
    Route::get('my-recipes', MyRecipes::class)->name('my-recipes');

    // Create Recipe
    Route::get('create-recipe', CreateRecipe::class)->name('create-recipe');

    // Edit Recipe
    Route::get('edit-recipe/{recipe}', EditRecipe::class)->name('edit-recipe');

    // Saved Recipes
    Route::get('saved-recipes', SavedRecipes::class)->name('saved-recipes');

    // Following
    Route::get('following', Following::class)->name('following');

    // Friends
    Route::get('friends', Friends::class)->name('friends');
    Route::get('friend-requests', FriendRequests::class)->name('friend-requests');
    Route::get('private-friend-request/{private_friend_request_id}', PrivateFriendRequest::class)->name('private-friend-request');
});
