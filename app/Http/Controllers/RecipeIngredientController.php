<?php

namespace App\Http\Controllers;

use App\RecipeIngredients;
use Illuminate\Http\Request;

class RecipeIngredientController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ingredient = RecipeIngredients::create([
            'ingredient' => $request->ingredient,
            'recipe_id' => $request->recipe_id
        ]);

        return response()->json([
            'status' => (bool) $ingredient,
            'data' => $ingredient,
            'message' => $ingredient ? 'Ingredient added successfully!' : 'Error adding ingredient!'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecipeIngredients  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecipeIngredients $ingredient)
    {
        $status = $ingredient->update(
            $request->only(['ingredient'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Ingredient updated successfully!' : 'Error updating ingredient!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecipeIngredients $ingredient)
    {
        $status = $ingredient->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Ingredient removed successfully!' : 'Error removing ingredient!'
        ]);
    }
}
