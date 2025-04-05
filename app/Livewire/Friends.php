<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\UserFriend;
use Livewire\WithPagination;
use App\Models\UserFriendRequest;
use App\Traits\WithUserSortAndFilter;

class Friends extends Component
{
    use WithPagination;
    use WithUserSortAndFilter;

    public function render()
    {
        $friendRequestsCount = UserFriendRequest::query()
            ->where('to_user_id', auth()->id())
            ->count();

        $results = User::query()
            ->select('users.id', 'users.name', 'users.avatar', 'users_friends.created_at')
            ->join('users_friends', 'users_friends.friend_id', '=', 'users.id')
            ->where('users_friends.accepted_at', '!=', null)
            ->where('users_friends.user_id', auth()->id())
            ->when(strlen($this->search) >= 3, function ($query) {
                $query->where('users.name', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sort_by, $this->sort_direction)
            ->paginate($this->results_per_page);

        return view('livewire.friends', [
            'results' => $results,
            'friendRequestsCount' => $friendRequestsCount,
        ]);
    }

    public function showFriendRequests()
    {
        return redirect()->route('friend-requests');
    }

    public function removeFriend($id)
    {
        $user = User::query()
            ->where('id', $id)
            ->first();

        if (!$user) {
            session()->flash('error', 'User not found.');
            return;
        }

        UserFriend::query()
            ->where(function ($query) use ($id) {
                $query->where('user_id', auth()->id())
                    ->where('friend_id', $id);
            })
            ->orWhere(function ($query) use ($id) {
                $query->where('user_id', $id)
                    ->where('friend_id', auth()->id());
            })
            ->delete();

        $this->resetPage();

        session()->flash('success', 'You are no longer friends with ' . $user->name . '.');
    }

    public function viewFriend($id)
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
