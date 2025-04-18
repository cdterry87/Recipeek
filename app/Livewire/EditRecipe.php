<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditRecipe extends Component
{
    use WithFileUploads;

    public $uuid;
    public $recipeId;
    public $slug;
    public $title, $description, $image, $category;
    public $cuisine, $difficulty, $method, $occasion;
    public $servings, $calories, $video, $notes;
    public $hours = 0;
    public $minutes = 0;
    public $public = false;
    public $imagePath;

    public $ingredient, $quantity, $unit;
    public $instruction, $order;

    public $ingredients = [];
    public $instructions = [];

    public function mount($uuid)
    {
        $recipe = Recipe::query()
            ->where('uuid', $uuid)
            ->with('ingredients', 'instructions')
            ->firstOrFail();


        if (!$recipe) abort(404);

        // If the user is not the owner of the recipe, redirect them to the view recipe page
        if ($recipe->user_id !== auth()->id()) {
            return redirect()->route('view-recipe', ['recipe' => $recipe->slug]);
        }

        $this->recipeId = $recipe->id;
        $this->uuid = $recipe->uuid;
        $this->slug = $recipe->slug;
        $this->title = $recipe->title;
        $this->description = $recipe->description;
        $this->category = $recipe->category;
        $this->cuisine = $recipe->cuisine;
        $this->difficulty = $recipe->difficulty;
        $this->method = $recipe->method;
        $this->occasion = $recipe->occasion;
        $this->hours = $recipe->hours;
        $this->minutes = $recipe->minutes;
        $this->servings = $recipe->servings;
        $this->calories = $recipe->calories;
        $this->video = $recipe->video;
        $this->notes = $recipe->notes;
        $this->public = $recipe->public ? true : false;
        $this->imagePath = $recipe->image;

        $this->ingredients = $recipe->ingredients;
        $this->instructions = $recipe->instructions;
    }

    public function removeImage()
    {
        $recipe = Recipe::query()
            ->where('uuid', $this->uuid)
            ->where('user_id', auth()->id())
            ->first();

        if ($recipe->image) {
            Storage::disk('public')->delete($recipe->image);
            $recipe->image = null;
            $recipe->save();
            $this->imagePath = null;
            session()->flash('recipe-message', 'Recipe image removed successfully.');
        } else {
            session()->flash('recipe-message', 'Image could not be removed. Please try again later.');
        }
    }

    public function saveRecipe()
    {
        $this->validate([
            'title' => 'required|string|max:60',
            'description' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:20',
            'cuisine' => 'nullable|string|max:20',
            'difficulty' => 'nullable|string|max:20',
            'method' => 'nullable|string|max:20',
            'occasion' => 'nullable|string|max:20',
            'hours' => 'required|integer|max:99',
            'minutes' => 'required|integer|max:59',
            'servings' => 'nullable|integer|max:999',
            'calories' => 'nullable|integer|max:99999',
            'image' => 'nullable|image|max:2048',
            'video' => 'nullable|string',
            'notes' => 'nullable|string',
            'public' => 'boolean',
        ]);

        $imagePath = $this->imagePath;
        if ($this->image) {
            $path = $this->image->store('recipes', 'public');
            $imagePath = 'storage/' . $path;
        }

        $public = $this->public ?? false;

        Recipe::query()
            ->where('uuid', $this->uuid)
            ->where('user_id', auth()->id())
            ->update([
                'title' => $this->title,
                'description' => $this->description,
                'category' => $this->category,
                'cuisine' => $this->cuisine,
                'difficulty' => $this->difficulty,
                'method' => $this->method,
                'occasion' => $this->occasion,
                'hours' => $this->hours,
                'minutes' => $this->minutes,
                'servings' => $this->servings,
                'calories' => $this->calories,
                'image' => $imagePath,
                'video' => $this->video,
                'notes' => $this->notes,
                'public' => $public,
            ]);

        session()->flash('recipe-message', 'Recipe updated successfully!');
    }

    public function deleteRecipe()
    {
        $recipe = Recipe::query()
            ->where('uuid', $this->uuid)
            ->where('user_id', auth()->id())
            ->first();

        if ($recipe) {
            $recipe->delete();
            session()->flash('recipe-message', 'Recipe deleted successfully.');
            return redirect()->route('my-recipes');
        } else {
            session()->flash('recipe-message', 'Recipe could not be deleted. Please try again later.');
        }
    }

    public function render()
    {
        return view('livewire.edit-recipe');
    }
}
