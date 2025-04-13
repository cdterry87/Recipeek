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
                    <x-icons.friends />
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
