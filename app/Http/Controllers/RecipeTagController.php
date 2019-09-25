<?php

namespace App\Http\Controllers;

use App\RecipeTags;
use Illuminate\Http\Request;

class RecipeTagController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = RecipeTags::create([
            'tag' => $request->tag,
            'recipe_id' => $request->recipe_id
        ]);

        return response()->json([
            'status' => (bool) $tag,
            'data' => $tag,
            'message' => $tag ? 'Tag added successfully!' : 'Error adding tag!'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecipeTags  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecipeTags $tag)
    {
        $status = $tag->update(
            $request->only(['tag'])
        );

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Tag updated successfully!' : 'Error updating tag!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecipeTags  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecipeTags $tag)
    {
        $status = $tag->delete();

        return response()->json([
            'status' => $status,
            'message' => $status ? 'Tag removed successfully!' : 'Error removing tag!'
        ]);
    }
}
