<div class="max-w-6xl mx-auto p-6">
    @if (!$creator->public)
        <div class="h-[75vh]">
            <div class="flex flex-col gap-8 items-center justify-center h-full">
                <div>
                    <svg
                        width="0"
                        height="0"
                    >
                        <defs>
                            <clipPath
                                id="privateBlobClip"
                                clipPathUnits="objectBoundingBox"
                            >
                                <path
                                    d="M0.865 0.321C0.939 0.452 1 0.596 0.971 0.734C0.943 0.872 0.825 0.995 0.683 1C0.54 0.999 0.389 0.89 0.26 0.812C0.132 0.734 0.026 0.688 0 0.555C-0.026 0.423 0.045 0.216 0.139 0.1C0.233 -0.015 0.349 -0.042 0.495 0.018C0.641 0.078 0.792 0.189 0.865 0.321Z"
                                />
                            </clipPath>
                        </defs>
                    </svg>
                    <div class="flex items-center justify-center relative">
                        <img
                            src="{{ asset('images/private.jpg') }}"
                            alt="Private Profile"
                            class="private-blob-mask rounded-full"
                        >
                    </div>
                </div>

                <div class="text-center">
                    <h2 class="text-2xl font-semibold mb-4">Sorry, this creator's profile is private.</h2>
                    <p class="text-gray-600">
                        You will not be able to view their recipes or details unless you are a friend or they have made
                        their profile public.
                    </p>
                </div>

                <div>
                    <a
                        href="{{ route('home') }}"
                        class="btn btn-primary"
                    >
                        Go Back
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Sidebar - User Details -->
            <div class="md:col-span-1 mb-8">
                <div class="flex items-center justify-center">
                    <div class="avatar px-6">
                        <div class="w-56 md:w-full rounded-full border-4 border-white shadow-md">
                            <img
                                src="{{ asset($creator->avatar) }}"
                                alt="{{ $creator->name }}"
                                title="{{ $creator->name }} Avatar"
                            >
                        </div>
                    </div>
                </div>
                <h2 class="text-xl text-center font-semibold mt-4">{{ $creator->name }}</h2>
                <p class="text-center text-gray-600 mt-2 font-[Jost]">{{ $creator->bio }}</p>
                <div class="flex flex-col gap-2 mt-6">
                    <x-button
                        primary
                        block
                        wire:click.prevent="follow"
                    >
                        Follow
                    </x-button>
                    <x-button
                        secondary
                        block
                        wire:click.prevent="addFriend"
                    >
                        Add Friend
                    </x-button>
                </div>
            </div>

            <!-- User's Recipes -->
            <div class="md:col-span-3">
                <h2 class="text-2xl font-semibold mb-4">Recipes by {{ $creator->name }}</h2>

                <x-filters :results-count="$recipes->count()" />

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($recipes as $recipe)
                        <x-card
                            :title="$recipe->title"
                            :image="asset($recipe->image)"
                            :description="$recipe->description"
                            :link="route('view-recipe', $recipe->slug)"
                            :category="$recipe->category"
                            :cuisine="$recipe->cuisine"
                            :time="$recipe->getFormattedTime()"
                            wire:key="recipe-{{ $recipe->id }}"
                        />
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $recipes->links() }}
                </div>
            </div>
        </div>
    @endif
</div>
