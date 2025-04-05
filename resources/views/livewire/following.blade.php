<div class="max-w-6xl mx-auto p-6">
    <div class="flex flex-col gap-6">
        <h1 class="text-2xl sm:text-3xl font-bold">Following</h1>

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
            variant="following"
        />
    @else
        <x-user-empty
            title="No Creators Found"
            subtitle="Creators you follow will appear here. Search recipes to find new creators to follow!"
        />
    @endif
</div>
