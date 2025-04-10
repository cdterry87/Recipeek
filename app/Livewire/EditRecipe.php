<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class EditRecipe extends Component
{
    public $title, $description, $image, $category;
    public $cuisine, $difficulty, $method, $occasion;
    public $servings, $calories, $video, $notes;
    public $hours = 0;
    public $minutes = 0;
    public $public = false;
    public $imagePath;

    public function mount()
    {
        $recipe = Recipe::query()
            ->where('uuid', request()->route('uuid'))
            ->firstOrFail();

        // If the user is not the owner of the recipe, redirect them to the view recipe page
        if ($recipe->user_id !== auth()->id()) {
            return redirect()->route('view-recipe', ['recipe' => $this->recipe->slug]);
        }

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
    }

    public function removeImage()
    {
        $recipe = Recipe::query()
            ->where('uuid', request()->route('uuid'))
            ->where('user_id', auth()->id())
            ->firstOrFail();

        if ($recipe->image) {
            Storage::disk('public')->delete($recipe->image);
            $recipe->image = null;
            $recipe->save();
            $this->imagePath = null;
            session()->flash('update-recipe-message', 'Recipe image removed successfully.');
        }
    }

    public function updateRecipe()
    {
        //
    }

    public function render()
    {
        return view('livewire.edit-recipe');
    }
}
