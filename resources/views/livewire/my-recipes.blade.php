<div class="max-w-6xl mx-auto p-6">
    <!-- Page Header -->
    <div class="flex flex-row gap-4 justify-between items-center mb-6">
        <h1 class="text-2xl sm:text-3xl font-bold">My Recipes</h1>
        <a
            href="{{ route('create-recipe') }}"
            class="btn btn-primary btn-sm sm:btn-md"
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
                    d="M12 4.5v15m7.5-7.5h-15"
                />
            </svg>
            New Recipe
        </a>
    </div>

    <!-- Search & Filters Section -->
    <x-filters :results-count="$recipes->count()" />

    <!-- Recipes Grid -->
    @if ($recipes && $recipes->isNotEmpty())
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-y-8 gap-x-6">
            @foreach ($recipes as $recipe)
                <x-card
                    :title="$recipe->title"
                    :image="$recipe->image"
                    :description="$recipe->description"
                    :link="'recipes/' . $recipe->slug"
                    :category="$recipe->category"
                    :cuisine="$recipe->cuisine"
                    :time="$recipe->getFormattedTime()"
                    wire:key="recipe-{{ $recipe->id }}"
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
