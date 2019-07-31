<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Auth::routes();

// Auth logout
Route::get('/api/logout', function () {
    Auth::logout();
    return Redirect::to('login');
});

// User authenticated routes
Route::group(['middleware' => 'auth'], function () {
    // API routes
    Route::prefix('api')->group(function () {
        Route::resource('/categories', 'CategoryController');
        Route::resource('/recipes', 'RecipeController');
    });

    // Catch-all route
    Route::get('/{any}', 'HomeController@index')->where('any', '.*');
});
