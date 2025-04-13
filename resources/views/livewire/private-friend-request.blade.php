<div class="max-w-6xl mx-auto p-6">
    <div class="flex flex-col gap-6">
        <div>
            <div class="flex flex-col-reverse sm:flex-row gap-4 justify-between items-center">
                <h1 class="text-2xl sm:text-3xl font-bold">
                    Send Friend Request
                </h1>
                <x-button
                    secondary
                    outline
                    wire:click.prevent="returnHome"
                >
                    <x-slot:icon>
                        <x-icons.home />
                    </x-slot:icon>
                    Return Home
                </x-button>
            </div>
        </div>

        <p>
            Click then button below to send a friend request to this user. They will be notified of your request
            and can choose to accept or decline it. If they accept, you will be able to see their public recipes
            and they will be able to see yours.
        </p>

        <div class="flex flex-col gap-4 items-center justify-center w-full">
            <a
                class="hover:scale-105 transition-all duration-300 ease-in-out"
                href="{{ route('view-creator', [
                    'creator' => $user->slug,
                ]) }}"
            >
                <div class="flex flex-col gap-4 items-center justify-center w-64 bg-gray-100 shadow-md py-8 px-6">
                    @if ($user->avatar)
                        <div class="avatar px-6">
                            <x-avatar
                                :image="asset($user->avatar)"
                                :alt="$user->name . 'Profile Picture'"
                                :title="$user->name . 'Profile Picture'"
                            />
                        </div>
                    @else
                        <x-initials :initials="$user->getInitials()" />
                    @endif
                    <div class="text-wrap">
                        <h2 class="text-base text-center font-bold text-wrap">
                            {{ Str::limit($user->name, 25) }}
                        </h2>
                    </div>
                </div>
            </a>
            <div class="my-6">
                @if ($isCurrentUser)
                    <x-alert warning>
                        This is your friend request page. Send this link to your friends to allow them to send you a
                        friend request even if your profile is private.
                    </x-alert>
                @elseif ($isAlreadyFriend)
                    <x-alert success>
                        You are already friends with this user.
                    </x-alert>
                @elseif($isFriendRequestSent)
                    <x-alert info>
                        A friend request has been sent and is awaiting approval.
                    </x-alert>
                @else
                    <x-button
                        primary
                        wire:click.prevent="sendFriendRequest"
                    >
                        Send Friend Request
                    </x-button>
                @endif
            </div>
        </div>
    </div>
</div>
