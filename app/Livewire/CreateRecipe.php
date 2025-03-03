<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Recipe;

class CreateRecipe extends Component
{
    use WithFileUploads;

    public $title, $description, $category, $difficulty;
    public $hours, $minutes, $servings, $calories;
    public $image, $video, $private = false;

    protected $rules = [
        'title' => 'required|string|max:60',
        'description' => 'nullable|string|max:80',
        'category' => 'nullable|string|max:16',
        'difficulty' => 'nullable|string|max:16',
        'hours' => 'nullable|integer|min:0|max:23',
        'minutes' => 'nullable|integer|min:0|max:59',
        'servings' => 'nullable|integer|min:1|max:50',
        'calories' => 'nullable|integer|min:0|max:5000',
        'image' => 'nullable|image|max:2048',
        'video' => 'nullable',
        'private' => 'boolean',
    ];

    public function saveRecipe()
    {
        $this->validate();

        $recipe = Recipe::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
            'difficulty' => $this->difficulty,
            'hours' => $this->hours,
            'minutes' => $this->minutes,
            'servings' => $this->servings,
            'calories' => $this->calories,
            'private' => $this->private,
        ]);

        if ($this->image) {
            $path = $this->image->store('recipes', 'public');
            $recipe->update(['image' => $path]);
        }

        session()->flash('success', 'Recipe created successfully!');

        return redirect()->route('edit-recipe', $recipe->id);
    }

    public function render()
    {
        return view('livewire.create-recipe');
    }
}
