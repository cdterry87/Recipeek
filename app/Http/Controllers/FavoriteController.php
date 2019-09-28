<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        return response()->json(auth()->user()
            ->favorites()
            ->with('recipe.tags')           // Retrieves the recipe and its tags
            ->with('recipe.favorites')      // Retrieves the recipe and its favorites
            ->latest()
            ->get());
    }
}
