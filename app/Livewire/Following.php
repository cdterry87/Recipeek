<?php

namespace App\Livewire;

use App\Models\Recipe;
use Livewire\Component;
use App\Enums\RecipeSortBy;
use App\Enums\UserSortBy;
use App\Models\UserFollower;
use App\Traits\WithUserFilters;
use Livewire\WithPagination;
use App\Traits\WithUserSorting;
use Illuminate\Support\Facades\Auth;

class Following extends Component
{
    use WithPagination;
    use WithUserSorting;
    use WithUserFilters;

    public function render()
    {
        $user = Auth::user();

        $users = UserFollower::where('follower_id', $user->id)
            ->select('users_followers.*', 'users.name', 'users.avatar')
            ->join('users', 'users.id', '=', 'users_followers.user_id')
            ->when(strlen($this->search) >= 3, function ($query) {
                $query->where('users.name', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sort_by, $this->sort_direction)
            ->paginate($this->results_per_page);

        return view('livewire.following', [
            'users' => $users,
        ]);
    }
}
