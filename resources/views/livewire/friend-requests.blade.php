<div class="max-w-6xl mx-auto p-6">
    <div class="flex flex-col gap-6">
        <div class="flex flex-col-reverse sm:flex-row gap-4 justify-between items-center">
            <h1 class="text-2xl sm:text-3xl font-bold">
                Friend Requests
            </h1>
            <x-button
                primary
                wire:click.prevent="showFriends"
            >
                <x-slot:icon>
                    <x-icons.left-arrow />
                </x-slot:icon>
                View Friends
            </x-button>
        </div>

        <div class="flex flex-col gap-3">
            <p>
                You are currently viewing your friend requests. You can accept or reject them.
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

        <div
            role="tablist"
            class="tabs tabs-border"
        >
            <a
                role="tab"
                class="tab flex items-center gap-2 {{ !$this->areSentRequestsShown ? 'tab-active' : '' }}"
                wire:click.prevent="showReceivedRequests"
            >
                <x-icons.received-requests />
                Received
                @if ($receivedRequestsCount > 0)
                    <span class="badge badge-primary badge-sm">
                        {{ $receivedRequestsCount }}
                    </span>
                @endif
            </a>
            <a
                role="tab"
                class="tab flex items-center gap-2 {{ $this->areSentRequestsShown ? 'tab-active' : '' }}"
                wire:click.prevent="showSentRequests"
            >
                <x-icons.sent-requests />
                Sent
                @if ($sentRequestsCount > 0)
                    <span class="badge badge-primary badge-sm">
                        {{ $sentRequestsCount }}
                    </span>
                @endif
            </a>
        </div>

        <x-user-filters :results-count="$results->count()" />
    </div>

    @if ($results && $results->isNotEmpty())
        <x-user-grid
            :results="$results"
            variant="{{ $this->areSentRequestsShown ? 'friend-request-sent' : 'friend-request-received' }}"
        />
    @else
        <x-user-empty
            title="No Friend Requests Found"
            subtitle="Friend requests you send and receive will appear here."
        />
    @endif
</div>
