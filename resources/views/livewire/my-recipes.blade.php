<div class="max-w-6xl mx-auto p-6">
    <!-- Page Header -->
    <div class="flex flex-row gap-4 justify-between items-center mb-6">
        <h1 class="text-2xl sm:text-3xl font-bold">My Recipes</h1>
        <button class="btn btn-primary btn-sm sm:btn-md">
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
                    d="M12 4.5v15m7.5-7.5h-15"
                />
            </svg>

            New Recipe
        </button>
    </div>

    <!-- Search & Filters Section -->
    <div class="flex flex-col gap-2 lg:flex-row items-center lg:justify-between mb-6">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center w-full">
            <select
                wire:model.live="category"
                class="select select-bordered w-full sm:w-1/3 lg:w-40"
            >
                <option value="">All Categories</option>
                <option value="Breakfast">Breakfast</option>
                <option value="Lunch">Lunch</option>
                <option value="Dinner">Dinner</option>
                <option value="Snack">Snack</option>
                <option value="Dessert">Dessert</option>
                <option value="Drink">Drink</option>
            </select>
            <select
                wire:model.live="difficulty"
                class="select select-bordered w-full sm:w-1/3 lg:w-40"
            >
                <option value="">All Difficulties</option>
                <option value="Easy">Easy</option>
                <option value="Normal">Normal</option>
                <option value="Hard">Hard</option>
                <option value="Expert">Expert</option>
            </select>
            <select
                wire:model.live="time"
                class="select select-bordered w-full sm:w-1/3 lg:w-40"
            >
                <option value="">All Times</option>
                <option value="F">Fast</option>
                <option value="N">Normal</option>
                <option value="TI">Time-Intensive</option>
            </select>
        </div>

        <div class="w-full lg:w-auto">
            <x-search
                placeholder="Search my recipes..."
                class="w-full lg:w-64"
                wire:model.live.debounce.600ms="search"
            />
        </div>
    </div>

    <!-- Recipes Grid -->
    @if ($recipes && $recipes->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-8 gap-x-6">
            @foreach ($recipes as $recipe)
                <x-card
                    :title="$recipe->title"
                    :image="$recipe->image"
                    :description="$recipe->description"
                    :link="'recipes/' . $recipe->id"
                    :category="$recipe->category"
                    :difficulty="$recipe->difficulty"
                    :time="$recipe->getFormattedTime()"
                />
            @endforeach
        </div>
        <div class="mt-6">
            {{ $recipes->links() }}
        </div>
    @else
        <div
            class="text-center text-gray-600 mt-8 h-[40vh] flex flex-col items-center justify-center gap-6 my-16"
            id="no-recipes"
        >
            <h3 class="font-bold text-2xl sm:text-3xl">
                No Recipes Found.
            </h3>
            <p class="text-sm sm:text-base text-gray-400 font-[Jost]">Try adjusting your filters or create a new recipe.
            </p>
        </div>
    @endif
</div>
