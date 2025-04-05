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
                            d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"
                        />
                    </svg>
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
                        d="M9 3.75H6.912a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H15M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859M12 3v8.25m0 0-3-3m3 3 3-3"
                    />
                </svg>
                Received
            </a>
            <a
                role="tab"
                class="tab flex items-center gap-2 {{ $this->areSentRequestsShown ? 'tab-active' : '' }}"
                wire:click.prevent="showSentRequests"
            >
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
                        d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5"
                    />
                </svg>
                Sent
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
