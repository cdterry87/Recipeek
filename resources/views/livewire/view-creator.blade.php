<div>
    @if (!$creator->public && !$isFriend)
        <x-creator-empty />
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
                    <p class="text-center text-gray-600 mt-2 font-[Jost]">{{ $creator->bio }}</p>

                    @if (auth()->check() && auth()->user()->id !== $creator->id)
                        <div class="flex flex-col gap-2 mt-6">
                            @if ($isFollowing)
                                <x-button
                                    primary
                                    outline
                                    block
                                    wire:click.prevent="unfollow"
                                >
                                    <x-slot:icon>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="size-6"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                            />
                                        </svg>
                                    </x-slot:icon>
                                    Unfollow
                                </x-button>
                            @else
                                <x-button
                                    primary
                                    block
                                    wire:click.prevent="follow"
                                >
                                    <x-slot:icon>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="size-6"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                            />
                                        </svg>
                                    </x-slot:icon>
                                    Follow
                                </x-button>
                            @endif
                            @if ($isFriend)
                                <x-button
                                    secondary
                                    outline
                                    block
                                    wire:click.prevent="removeFriend"
                                >
                                    <x-slot:icon>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="size-6"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM4 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 10.374 21c-2.331 0-4.512-.645-6.374-1.766Z"
                                            />
                                        </svg>
                                    </x-slot:icon>

                                    Remove Friend
                                </x-button>
                            @else
                                <x-button
                                    secondary
                                    block
                                    wire:click.prevent="addFriend"
                                >
                                    <x-slot:icon>
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="size-6"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"
                                            />
                                        </svg>
                                    </x-slot:icon>

                                    Add Friend
                                </x-button>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="md:col-span-4 lg:col-span-3">
                    @if (session('message'))
                        <x-alert
                            success
                            class="mb-4"
                        >
                            {{ session('message') }}
                        </x-alert>
                    @endif

                    <h2 class="text-2xl font-semibold mb-4">Recipes by {{ $creator->name }}</h2>

                    <x-filters :results-count="$recipes->count()" />

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
</div>
