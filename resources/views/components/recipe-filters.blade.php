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
            @if (
                $this->search ||
                    $this->category ||
                    $this->cuisine ||
                    $this->difficulty ||
                    $this->method ||
                    $this->occasion ||
                    $this->time)
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
            <button
                class="btn btn-square btn-ghost"
                title="Toggle Filters"
                aria-label="Toggle Filters"
                @click.prevent="areFiltersShown = !areFiltersShown"
            >
                <x-icons.filter />
            </button>
            <div class="w-full lg:w-auto">
                <x-search
                    placeholder="Search recipes..."
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
                    :options="App\Enums\RecipeSortBy::dropdown()"
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
    <div
        x-show="areFiltersShown"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        class="w-full flex flex-col gap-1"
    >
        <h2 class="font-bold text-xs text-gray-700">Filters</h2>
        <div class="grid grid-cols-1 gap-1 md:gap-3 md:grid-cols-3">
            <x-select
                label="Category"
                id="category"
                name="category"
                wire:model.live="category"
                blank-label="All Categories"
                :options="App\Enums\RecipeCategory::dropdown()"
                hidden-label
                block
            />
            <x-select
                label="Cuisine"
                id="cuisine"
                name="cuisine"
                wire:model.live="cuisine"
                blank-label="All Cuisines"
                :options="App\Enums\RecipeCuisine::dropdown()"
                hidden-label
                block
            />
            <x-select
                label="Difficulty"
                id="difficulty"
                name="difficulty"
                wire:model.live="difficulty"
                blank-label="All Difficulties"
                :options="App\Enums\RecipeDifficulty::dropdown()"
                hidden-label
                block
            />
            <x-select
                label="Method"
                id="method"
                name="method"
                wire:model.live="method"
                blank-label="All Methods"
                :options="App\Enums\RecipeMethod::dropdown()"
                hidden-label
                block
            />
            <x-select
                label="Occasion"
                id="occasion"
                name="occasion"
                wire:model.live="occasion"
                blank-label="All Occasions"
                :options="App\Enums\RecipeOccasion::dropdown()"
                hidden-label
                block
            />
            <x-select
                label="Time"
                id="time"
                name="time"
                wire:model.live="time"
                blank-label="All Times"
                :options="App\Enums\RecipeTime::dropdown()"
                hidden-label
                block
            />
        </div>
    </div>
</div>
