<?php

namespace App\Traits;

use App\Enums\RecipeSortBy;
use App\Enums\SortDirection;
use App\Enums\ResultsPerPage;

trait WithRecipeSortAndFilter
{
    // Sorting
    public $sort_by = 'created_at';
    public $sort_direction = 'desc';
    public $results_per_page = 12;

    // Filtering
    public $search = '';
    public $category = '';
    public $cuisine = '';
    public $difficulty = '';
    public $method = '';
    public $occasion = '';
    public $time = '';

    public function mountWithRecipeSortAndFilter()
    {
        $this->sort_by = RecipeSortBy::default();
        $this->sort_direction = SortDirection::default();
        $this->results_per_page = ResultsPerPage::default();
    }

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
