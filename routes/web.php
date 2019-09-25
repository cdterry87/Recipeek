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

// Auth/Logout routes
Auth::routes();
Route::get('/api/logout', function () {
    Auth::logout();
    return Redirect::to('login');
});

// Website landing page
Route::get('/', function () {
    return view('welcome');
});

// Home page after login
Route::get('/home', 'HomeController@index')->name('home');

// Authenticated routes
Route::group(['middleware' => 'auth'], function () {
    Route::prefix('api')->group(function () {
        // Application API routes go here
        Route::resource('/recipes', 'RecipeController');
        Route::resource('/ingredients', 'RecipeIngredientController');
        Route::resource('/instructions', 'RecipeInstructionController');
        Route::resource('/tags', 'RecipeTagController');

        // User account routes
        Route::get('/user', 'UserController@index');
        Route::post('/account', 'UserController@account');
        Route::post('/password', 'UserController@password');
    });

    // Catch-all route
    Route::get('/{any}', 'HomeController@index')->where('any', '.*');
});
