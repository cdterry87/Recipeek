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
        return response()->json(Auth::user()->recipes()->with('tags')->with('favorites')->with('user')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageFile = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $imageFile = '/storage/recipe_images/' . $filename;
            $file->move(storage_path('app/public/recipe_images'), $filename);
        }

        $recipe = Recipe::create([
            'title' => $request->title,
            'description' => $request->description,
            'prep_hours' => $request->prep_hours,
            'prep_minutes' => $request->prep_minutes,
            'cook_hours' => $request->cook_hours,
            'cook_minutes' => $request->cook_minutes,
            'servings' => $request->servings,
            'calories' => $request->calories,
            'image' => $imageFile,
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
        return response()->json($recipe->where('id', $recipe->id)->with('ingredients')->with('instructions')->with('tags')->with('user')->first());
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
        $updates = ['title', 'description', 'prep_hours', 'prep_minutes', 'cook_hours', 'cook_minutes', 'servings', 'calories', 'private'];

        if ($request->hasFile('newImage')) {
            $file = $request->file('newImage');

            $filename = time() . '.' . $file->getClientOriginalExtension();
            $imageFile = '/storage/recipe_images/' . $filename;
            $file->move(storage_path('app/public/recipe_images'), $filename);

            $request->request->add(['image' => $imageFile]);
            $updates[] = 'image';

            if (!is_null($recipe->image) && file_exists('app/public/recipe_images/' . end($oldImageParts))) {
                $oldImageParts = explode('/', $recipe->image);
                $fileToDelete = storage_path('app/public/recipe_images/' . end($oldImageParts));
                unlink($fileToDelete);
            }
        }

        $status = $recipe->update(
            $request->only($updates)
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
