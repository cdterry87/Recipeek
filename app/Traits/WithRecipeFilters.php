<?php

namespace App\Traits;

trait WithRecipeFilters
{
    public $search = '';
    public $category = '';
    public $cuisine = '';
    public $difficulty = '';
    public $method = '';
    public $occasion = '';
    public $time = '';

    public function updating($field)
    {
        // Reset pagination when any filter is updated
        if (in_array($field, ['search', 'category', 'cuisine', 'difficulty', 'method', 'occasion', 'time'])) {
            $this->resetPage();
        }
    }

    public function resetFilters()
    {
        $this->reset([
            'search',
            'category',
            'cuisine',
            'difficulty',
            'method',
            'occasion',
            'time',
        ]);
    }
}
