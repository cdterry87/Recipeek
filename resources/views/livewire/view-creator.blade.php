<div>
    @if (!$creator->public && !$isFriend)
        <x-private-creator />
    @else
        <div class="max-w-6xl mx-auto p-6">
            <div class="grid grid-cols-1 md:grid-cols-6 lg:grid-cols-4 gap-6">
                <div class="md:col-span-2 lg:col-span-1 mb-8">
                    <div class="flex items-center justify-center">
                        @if ($creator->avatar)
                            <div class="avatar px-6">
                                <x-avatar
                                    :image="asset($creator->avatar)"
                                    :alt="$creator->name . 'Profile Picture'"
                                    :title="$creator->name . 'Profile Picture'"
                                />
                            </div>
                        @else
                            <x-initials :initials="$creator->getInitials()" />
                        @endif
                    </div>
                    <h2 class="text-xl text-center font-semibold mt-4">{{ $creator->name }}</h2>
                    <p class="text-xs text-center mt-2">
                        <span class="text-gray-500">Joined on</span>
                        <span class="text-gray-700">{{ $creator->created_at->format('F j, Y') }}</span>
                    </p>
                    <p class="text-center text-gray-600 mt-2 font-[Jost]">{{ $creator->bio }}</p>
                    <p class="text-center mt-4">
                        <span class="badge badge-sm badge-primary">{{ $creator->getFollowersCount() }} Followers</span>
                    </p>

                    @if (auth()->check() && auth()->user()->id !== $creator->id)
                        <div class="flex flex-col gap-2 mt-6">
                            @if ($isFollowing)
                                <x-button
                                    id="x-unfollow-button"
                                    primary
                                    outline
                                    block
                                    wire:click.prevent="unfollow"
                                >
                                    <x-slot:icon>
                                        <x-icons.unfollow />
                                    </x-slot:icon>
                                    Unfollow
                                </x-button>
                            @else
                                <x-button
                                    id="x-follow-button"
                                    primary
                                    block
                                    wire:click.prevent="follow"
                                >
                                    <x-slot:icon>
                                        <x-icons.follow />
                                    </x-slot:icon>
                                    Follow
                                </x-button>
                            @endif
                            @if ($isFriend)
                                <x-button
                                    id="x-remove-friend-button"
                                    secondary
                                    outline
                                    block
                                    wire:click.prevent="removeFriend"
                                >
                                    <x-slot:icon>
                                        <x-icons.remove-friend />
                                    </x-slot:icon>
                                    Remove Friend
                                </x-button>
                            @elseif($isFriendRequestSent)
                                <x-button
                                    id="x-cancel-friend-request-button"
                                    secondary
                                    outline
                                    block
                                    wire:click.prevent="cancelFriendRequest"
                                >
                                    <x-slot:icon>
                                        <x-icons.cancel-friend-request />
                                    </x-slot:icon>
                                    Cancel Friend Request
                                </x-button>
                            @else
                                <x-button
                                    id="x-send-friend-request-button"
                                    secondary
                                    block
                                    wire:click.prevent="sendFriendRequest"
                                >
                                    <x-slot:icon>
                                        <x-icons.add-friend />
                                    </x-slot:icon>

                                    Add Friend
                                </x-button>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="md:col-span-4 lg:col-span-3">
                    <div class="flex flex-col gap-6">
                        <h2 class="text-2xl font-semibold">Recipes by {{ $creator->name }}</h2>

                        @if (session('success'))
                            <x-alert success>
                                {{ session('success') }}
                            </x-alert>
                        @endif

                        <x-recipe-filters :results-count="$recipes->count()" />
                    </div>

                    @if ($recipes && $recipes->isNotEmpty())
                        <x-recipe-grid
                            :recipes="$recipes"
                            md
                        />
                    @else
                        <x-recipe-empty />
                    @endif
                </div>
            </div>
        </div>
    @endif

    @section('page-title', $pageTitle)
</div>
