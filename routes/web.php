<?php

use App\Livewire\Welcome;
use App\Livewire\MyRecipes;
use App\Livewire\EditRecipe;
use App\Livewire\ViewRecipe;
use App\Livewire\UserProfile;
use App\Livewire\CreateRecipe;
use App\Livewire\SavedRecipes;
use App\Livewire\LoginRegister;
use App\Livewire\ResetPassword;
use App\Livewire\SearchRecipes;
use App\Livewire\ForgotPassword;
use App\Livewire\DiscoverRecipes;
use Illuminate\Support\Facades\Route;

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

// Search
Route::get('search', SearchRecipes::class)->name('search-recipes');

// Recipe
Route::get('recipe/{recipe}', ViewRecipe::class)->name('view-recipe');


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
});
