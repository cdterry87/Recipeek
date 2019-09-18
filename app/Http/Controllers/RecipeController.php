<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Auth::user()->recipes()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipe = Recipe::create([
            'title' => $request->title,
            'description' => $request->description,
            'prep_hours' => $request->prep_hours,
            'prep_minutes' => $request->prep_minutes,
            'total_hours' => $request->total_hours,
            'total_minutes' => $request->total_minutes,
            'servings' => $request->servings,
            'calories' => $request->calories,
            'private' => $request->private_recipe,
            'user_id' => Auth::user()->id
        ]);

        return response()->json([
            'status' => (bool) $recipe,
            'data' => $recipe,
            'message' => $recipe ? 'Recipe created successfully!' : 'Error adding recipe!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        return response()->json($recipe->where('id', $recipe->id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $status = $recipe->update(
            $request->only(['title', 'description', 'prep_hours', 'prep_minutes', 'total_hours', 'total_minutes', 'servings', 'calories', 'private'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Recipe updated successfully!' : 'Error updating recipe!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $status = $recipe->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Recipe deleted successfully!' : 'Error deleting recipe!'
        ]);
    }
}
