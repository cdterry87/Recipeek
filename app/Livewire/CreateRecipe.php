<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateRecipe extends Component
{
    use WithFileUploads;

    public $title, $description, $image, $category;
    public $cuisine, $difficulty, $method, $occasion;
    public $servings, $calories, $video, $notes;
    public $hours = 0;
    public $minutes = 0;
    public $public = false;

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

        $imagePath = null;
        if ($this->image) {
            $path = $this->image->store('recipes', 'public');
            $imagePath = 'storage/' . $path;
        }

        $public = $this->public ?? false;

        $recipe = Recipe::create([
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
            'uuid' => Str::uuid(),
            'user_id' => auth()->id(),
        ]);

        session()->flash('message', 'Recipe created successfully! Please add ingredients and instructions.');

        return redirect()->route('edit-recipe', [
            'uuid' => $recipe->uuid,
        ]);
    }

    public function render()
    {
        return view('livewire.create-recipe');
    }
}
