<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\UserFriend;
use Livewire\WithPagination;
use App\Models\UserFriendRequest;
use App\Traits\WithUserSortAndFilter;

class FriendRequests extends Component
{
    use WithPagination;
    use WithUserSortAndFilter;

    public $areSentRequestsShown = false;

    public function render()
    {
        // Get count of sent friend requests
        $receivedRequestsCount = UserFriendRequest::query()
            ->where('to_user_id', auth()->id())
            ->count();

        // Get count of received friend requests
        $sentRequestsCount = UserFriendRequest::query()
            ->where('from_user_id', auth()->id())
            ->count();

        $results = User::query()
            ->select('users.id', 'users.name', 'users.avatar', 'users_friend_requests.created_at')
            ->when($this->areSentRequestsShown, function ($query) {
                $query->join('users_friend_requests', 'users_friend_requests.to_user_id', '=', 'users.id')
                    ->where('users_friend_requests.from_user_id', auth()->id());
            }, function ($query) {
                $query->join('users_friend_requests', 'users_friend_requests.from_user_id', '=', 'users.id')
                    ->where('users_friend_requests.to_user_id', auth()->id());
            })
            ->when(strlen($this->search) >= 3, function ($query) {
                $query->where('users.name', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sort_by, $this->sort_direction)
            ->paginate($this->results_per_page);

        return view('livewire.friend-requests', [
            'results' => $results,
            'receivedRequestsCount' => $receivedRequestsCount,
            'sentRequestsCount' => $sentRequestsCount,
        ]);
    }

    public function showSentRequests()
    {
        $this->areSentRequestsShown = true;
        $this->resetPage();
    }

    public function showReceivedRequests()
    {
        $this->areSentRequestsShown = false;
        $this->resetPage();
    }

    public function showFriends()
    {
        return redirect()->route('friends');
    }

    public function acceptFriendRequest($id)
    {
        $user = User::query()
            ->where('id', $id)
            ->first();

        if (!$user) {
            session()->flash('error', 'User not found.');
            return;
        }

        $request = UserFriendRequest::query()
            ->where('from_user_id', $id)
            ->where('to_user_id', auth()->id())
            ->first();
        if (!$request) {
            session()->flash('error', 'Friend request not found.');
            return;
        }

        // Add the friend to the user's friends list
        UserFriend::create([
            'user_id' => auth()->id(),
            'friend_id' => $id,
            'accepted_at' => now(),
        ]);

        // Add the user to the friend's friends list
        UserFriend::create([
            'user_id' => $id,
            'friend_id' => auth()->id(),
            'accepted_at' => now(),
        ]);

        // Delete the friend request
        $request->delete();

        $this->resetPage();

        session()->flash('success', 'You are now friends with ' . $user->name . '.');
    }

    public function rejectFriendRequest($id)
    {
        $user = User::query()
            ->where('id', $id)
            ->first();

        if (!$user) {
            session()->flash('error', 'User not found.');
            return;
        }

        UserFriendRequest::query()
            ->where('to_user_id', auth()->id())
            ->where('from_user_id', $id)
            ->delete();

        $this->resetPage();

        session()->flash('success', 'You have rejected the friend request from ' . $user->name . '.');
    }

    public function cancelFriendRequest($id)
    {
        $user = User::query()
            ->where('id', $id)
            ->first();

        if (!$user) {
            session()->flash('error', 'User not found.');
            return;
        }

        UserFriendRequest::query()
            ->where('from_user_id', auth()->id())
            ->where('to_user_id', $id)
            ->delete();

        $this->resetPage();

        session()->flash('success', 'Your friend request to ' . $user->name . ' has been cancelled.');
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
