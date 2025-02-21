<?php

use App\Livewire\Dashboard;
use App\Livewire\MyRecipes;
use App\Livewire\EditRecipe;
use App\Livewire\ViewRecipe;
use App\Livewire\UserProfile;
use App\Livewire\CreateRecipe;
use App\Livewire\RatedRecipes;
use App\Livewire\SavedRecipes;
use App\Livewire\LoginRegister;
use App\Livewire\ResetPassword;
use App\Livewire\SearchRecipes;
use App\Livewire\ForgotPassword;
use App\Livewire\DiscoverRecipes;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Login/Register (with Google login with Socialite)
Route::get('login', LoginRegister::class)->name('login');

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

// User Profile
Route::get('profile', UserProfile::class)->name('user-profile');

// Dashboard
Route::get('dashboard', Dashboard::class)->name('dashboard');

// My Recipes
Route::get('my-recipes', MyRecipes::class)->name('my-recipes');

// Create Recipe
Route::get('create-recipe', CreateRecipe::class)->name('create-recipe');

// Edit Recipe
Route::get('edit-recipe/{recipe}', EditRecipe::class)->name('edit-recipe');

// Saved Recipes
Route::get('saved-recipes', SavedRecipes::class)->name('saved-recipes');

// Rated Recipes
Route::get('rated-recipes', RatedRecipes::class)->name('rated-recipes');
