<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/subscribe', function () {
    $this->validate(request(), [
        'email' => 'required|email',
    ]);

    // Return a 200 status
    return response()->json(['message' => 'Thank you for subscribing!', 'isSubmitted' => true]);
})->name('subscribe');
