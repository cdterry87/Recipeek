<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Recipe;
use Livewire\Component;
use App\Enums\RecipeSortBy;
use Livewire\WithPagination;
use App\Traits\WithRecipeFilters;
use App\Traits\WithRecipeSorting;

class ViewCreator extends Component
{
    use WithPagination;
    use WithRecipeFilters;
    use WithRecipeSorting;

    public $creatorId;

    public function mount(User $creator)
    {
        $this->creatorId = $creator->id;
    }

    /**
     * Computed property to get the creator's details (i.e. $this->creator)
     */
    public function getCreatorProperty()
    {
        return User::findOrFail($this->creatorId);
    }

    public function render()
    {
        $recipes = Recipe::query()
            ->when(strlen($this->search) >= 3, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->when($this->category, function ($query) {
                $query->where('category', $this->category);
            })
            ->when($this->cuisine, function ($query) {
                $query->where('cuisine', $this->cuisine);
            })
            ->when($this->difficulty, function ($query) {
                $query->where('difficulty', $this->difficulty);
            })
            ->when($this->method, function ($query) {
                $query->where('method', $this->method);
            })
            ->when($this->occasion, function ($query) {
                $query->where('occasion', $this->occasion);
            })
            ->when($this->time, function ($query) {
                $query->where(function ($query) {
                    $query->where('hours', '>', 0)
                        ->orWhere('minutes', '>', 0);
                });

                if ($this->time === 'Fast') {
                    $query->where(function ($query) {
                        $query->whereNull('hours')
                            ->orWhere('hours', 0);
                    })->where('minutes', '<=', 30);
                } elseif ($this->time === 'Normal') {
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
                } elseif ($this->time === 'Time-Intensive') {
                    $query->where('hours', '>=', 1)
                        ->where('minutes', '>', 0);
                }
            })
            ->when($this->sort_by === RecipeSortBy::POPULARITY->value, function ($query) {
                $query->withCount('saves')->orderBy('saves_count', $this->sort_direction);
            })
            ->when($this->sort_by === RecipeSortBy::RATING->value, function ($query) {
                $query->withAvg('ratings', 'rating')->orderBy('ratings_avg_rating', $this->sort_direction);
            })
            ->when($this->sort_by === RecipeSortBy::COOK_TIME->value, function ($query) {
                $query->orderByRaw('(hours * 60 + minutes) ' . $this->sort_direction);
            })
            ->when(!in_array($this->sort_by, [
                RecipeSortBy::POPULARITY->value,
                RecipeSortBy::RATING->value,
                RecipeSortBy::COOK_TIME->value,
            ]), function ($query) {
                $query->orderBy($this->sort_by, $this->sort_direction);
            })
            ->where('public', true)
            ->where('user_id', $this->creator->id)
            ->paginate($this->results_per_page);

        return view('livewire.view-creator', [
            'creator' => $this->creator,
            'recipes' => $recipes,
        ]);
    }
}
