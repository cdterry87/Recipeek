<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;

class MyRecipes extends Component
{
    use WithPagination;

    public $search = '';
    public $category = '';
    public $time = '';
    public $difficulty = '';

    public function updating($field)
    {
        // Reset pagination when any filter is updated
        if (in_array($field, ['search', 'category', 'time', 'difficulty'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $user = Auth::user();

        $recipes = Recipe::where('user_id', $user->id)
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->when($this->category, function ($query) {
                $query->where('category', $this->category);
            })
            ->when($this->time, function ($query) {
                $query->where(function ($query) {
                    $query->where('hours', '>', 0)
                        ->orWhere('minutes', '>', 0);
                });
                if ($this->time === 'F') {
                    $query->where(function ($query) {
                        $query->whereNull('hours')
                            ->orWhere('hours', 0);
                    })->where('minutes', '<=', 30);
                } else if ($this->time === 'N') {
                    $query->where(function ($query) {
                        $query->where(function ($query) {
                            $query->whereNull('hours')
                                ->orWhere('hours', 0);
                        })->where('minutes', '>', 30)
                            ->orWhere(function ($query) {
                                $query->where('hours', 1)
                                    ->where(function ($query) {
                                        $query->where('minutes', 0)
                                            ->orWhereNull('minutes');
                                    });
                            });
                    });
                } else if ($this->time === 'TI') {
                    $query->where('hours', '>=', 1)
                        ->where('minutes', '>=', 0);
                }
            })
            ->when($this->difficulty, function ($query) {
                $query->where('difficulty', $this->difficulty);
            })
            ->latest()
            ->paginate(8);

        return view('livewire.my-recipes', [
            'recipes' => $recipes,
        ]);
    }
}
