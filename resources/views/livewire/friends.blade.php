<div class="max-w-6xl mx-auto p-6">
    <div class="flex flex-col gap-6">
        <div class="flex flex-col-reverse sm:flex-row gap-4 justify-between items-center">
            <h1 class="text-2xl sm:text-3xl font-bold">
                Friends
            </h1>
            <x-button
                secondary
                outline
                :badge="$friendRequestsCount"
                wire:click.prevent="showFriendRequests"
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
                            d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"
                        />
                    </svg>
                </x-slot:icon>
                Friend Requests
            </x-button>
        </div>

        <div class="flex flex-col gap-3">
            <p>
                Friends are users you have added to your friends list. You can see their public recipes and they can
                see yours.
            </p>
            <p>
                If your profile is set to public, anyone can see your profile and public recipes. Only your friends can
                see your profile and public recipes if your profile is set to private. You may change this setting any
                time in <a
                    href="{{ route('user-profile') }}"
                    class="text-primary font-bold underline"
                    alt="Edit My Profile"
                    title="Edit My Profile"
                >your profile</a>.
            </p>
        </div>

        @if (session('error'))
            <x-alert error>
                {{ session('error') }}
            </x-alert>
        @endif

        @if (session('success'))
            <x-alert success>
                {{ session('success') }}
            </x-alert>
        @endif

        <x-user-filters :results-count="$results->count()" />
    </div>

    @if ($results && $results->isNotEmpty())
        <x-user-grid
            :results="$results"
            variant="friends"
        />
    @else
        <x-user-empty
            title="No Friends Found"
            subtitle="Your friends will appear here. Get out there and make some friends and make some food!"
        />
    @endif
</div>
