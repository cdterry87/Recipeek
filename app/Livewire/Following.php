<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\UserFollower;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Traits\WithUserSortAndFilter;

class Following extends Component
{
    use WithPagination;
    use WithUserSortAndFilter;

    public function render()
    {
        $results = User::query()
            ->select('users.id', 'users.name', 'users.avatar', 'users_followers.created_at')
            ->join('users_followers', 'users_followers.user_id', '=', 'users.id')
            ->where('users_followers.follower_id', auth()->id())
            ->when(strlen($this->search) >= 3, function ($query) {
                $query->where('users.name', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sort_by, $this->sort_direction)
            ->paginate($this->results_per_page);

        return view('livewire.following', [
            'results' => $results,
        ]);
    }

    public function unfollow($id)
    {
        $user = User::query()
            ->where('id', $id)
            ->first();

        if (!$user) {
            session()->flash('error', 'User not found.');
            return;
        }

        UserFollower::query()
            ->where('user_id', $id)
            ->where('follower_id', auth()->id())
            ->delete();

        $this->resetPage();

        session()->flash('success', 'You unfollowed ' . $user->name . '.');
    }

    public function view($id)
    {
        $user = User::query()
            ->where('id', $id)
            ->first();
        if (!$user) {
            session()->flash('error', 'User not found.');
            return;
        }

        return redirect()->route('view-creator', [
            'creator' => $user,
        ]);
    }
}
