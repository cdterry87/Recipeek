<?php

namespace App\Traits;

use App\Enums\UserSortBy;
use App\Enums\SortDirection;
use App\Enums\ResultsPerPage;

trait WithUserSorting
{
    public $sort_by = 'name';
    public $sort_direction = 'asc';
    public $results_per_page = 12;

    public function mountWithUserSorting()
    {
        $this->sort_by = UserSortBy::default();
        $this->sort_direction = SortDirection::ASC->value;
        $this->results_per_page = ResultsPerPage::default();
    }
}
