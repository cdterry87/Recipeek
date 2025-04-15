<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\UserFriend;
use App\Models\UserFriendRequest;

class PrivateFriendRequest extends Component
{
    public $private_friend_request_id;
    public $isAlreadyFriend = false;
    public $isFriendRequestSent = false;
    public $isCurrentUser = false;

    public function mount($private_friend_request_id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->private_friend_request_id = $private_friend_request_id;

        if (!$this->private_friend_request_id) {
            return redirect()->route('home');
        }
    }

    /**
     * Computed property to get the user's details (i.e. $this->user)
     */
    public function getUserProperty()
    {
        return User::query()
            ->where('private_friend_request_id', $this->private_friend_request_id)
            ->first();
    }

    public function render()
    {
        if (!$this->user) abort(404);

        $this->isAlreadyFriend = UserFriend::query()
            ->where('user_id', auth()->id())
            ->where('friend_id', $this->user->id)
            ->exists();

        $this->isFriendRequestSent = UserFriendRequest::query()
            ->where('from_user_id', auth()->id())
            ->where('to_user_id', $this->user->id)
            ->exists();

        $this->isCurrentUser = auth()->id() === $this->user->id;

        return view('livewire.private-friend-request', [
            'user' => $this->user,
        ]);
    }

    public function sendFriendRequest()
    {
        if (!$this->user) {
            session()->flash('error', 'User not found.');
        }

        UserFriendRequest::create([
            'from_user_id' => auth()->id(),
            'to_user_id' => $this->user->id,
        ]);

        $this->isFriendRequestSent = true;

        session()->flash('success', 'A friend request was sent to ' . $this->user->name . '.');
    }

    public function returnHome()
    {
        return redirect()->route('home');
    }
}
