<?php

namespace App\Traits;

use App\Enums\RecipeSortBy;
use App\Enums\SortDirection;
use App\Enums\ResultsPerPage;

trait WithRecipeSorting
{
    public $sort_by = 'created_at';
    public $sort_direction = 'desc';
    public $results_per_page = 12;

    public function mountWithRecipeSorting()
    {
        $this->sort_by = RecipeSortBy::default();
        $this->sort_direction = SortDirection::default();
        $this->results_per_page = ResultsPerPage::default();
    }
}
