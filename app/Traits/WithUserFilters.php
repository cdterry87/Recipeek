<?php

namespace App\Traits;

trait WithUserFilters
{
    public $search = '';

    public function updating($field)
    {
        // Reset pagination when any filter is updated
        if (in_array($field, ['search'])) {
            $this->resetPage();
        }
    }

    public function resetFilters()
    {
        $this->reset([
            'search',
        ]);
    }
}
