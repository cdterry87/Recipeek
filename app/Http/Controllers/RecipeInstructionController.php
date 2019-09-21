<?php

namespace App\Http\Controllers;

use App\RecipeInstructions;
use Illuminate\Http\Request;

class RecipeInstructionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $instruction = RecipeInstructions::create([
            'instruction' => $request->instruction,
            'recipe_id' => $request->recipe_id
        ]);

        return response()->json([
            'status' => (bool) $instruction,
            'data' => $instruction,
            'message' => $instruction ? 'Ingredient added successfully!' : 'Error adding instruction!'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecipeInstructions  $instruction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecipeInstructions $instruction)
    {
        $status = $instruction->update(
            $request->only(['instruction'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Ingredient updated successfully!' : 'Error updating instruction!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $instruction
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecipeInstructions $instruction)
    {
        $status = $instruction->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Ingredient removed successfully!' : 'Error removing instruction!'
        ]);
    }
}
