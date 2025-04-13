@props(['resultsCount' => 0])

<div
    x-data="{ areFiltersShown: false, areSortingOptionsShown: false }"
    class="flex flex-col gap-4 mb-6"
>
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div class="flex flex-row justify-between items-center gap-3">
            <span class="text-xl font-semibold font-[Jost] text-gray-400">
                {{ $resultsCount }} {{ Str::plural('Result', $resultsCount) }}
            </span>
            @if ($this->search)
                <button
                    class="btn btn-outline btn-error btn-sm sm:btn-md"
                    wire:click.prevent="resetFilters"
                >
                    <x-icons.clear-filters />
                    Clear Filters
                </button>
            @endif
        </div>
        <div class="flex flex-row items-center gap-3">
            <button
                class="btn btn-square btn-ghost"
                title="Toggle Sorting"
                aria-label="Toggle Sorting"
                @click.prevent="areSortingOptionsShown = !areSortingOptionsShown"
            >
                <x-icons.sort />
            </button>
            <div class="w-full lg:w-auto">
                <x-search
                    placeholder="Search..."
                    class="w-full lg:w-64"
                    wire:model.live.debounce.600ms="search"
                />
            </div>
        </div>
    </div>
    <div>
        <div
            x-show="areSortingOptionsShown"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            class="w-full flex flex-col gap-1"
        >
            <h2 class="font-bold text-xs text-gray-700">Sorting</h2>
            <div class="w-full grid grid-cols-1 gap-1 md:gap-3 md:grid-cols-3">
                <x-select
                    label="Results Per Page"
                    id="results_per_page"
                    name="results_per_page"
                    wire:model.live="results_per_page"
                    :options="App\Enums\ResultsPerPage::dropdown()"
                    hidden-label
                    block
                />
                <x-select
                    label="Sort By"
                    id="sort_by"
                    name="sort_by"
                    wire:model.live="sort_by"
                    :options="App\Enums\UserSortBy::dropdown()"
                    hidden-label
                    block
                />
                <x-select
                    label="Sort Direction"
                    id="sort_direction"
                    name="sort_direction"
                    wire:model.live="sort_direction"
                    :options="App\Enums\SortDirection::dropdown()"
                    hidden-label
                    block
                />
            </div>
        </div>
    </div>
</div>
