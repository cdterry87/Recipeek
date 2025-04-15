<div class="max-w-6xl mx-auto p-6">
    <div class="flex flex-col gap-6">
        <div class="flex flex-col-reverse sm:flex-row gap-4 justify-between items-center">
            <h1 class="text-2xl sm:text-3xl font-bold">Saved Recipes</h1>

            @if ($recipes && $recipes->isNotEmpty())
                <a
                    href="#"
                    class="btn btn-primary btn-sm sm:btn-md"
                    wire:click.prevent="randomRecipe"
                    title="View a random recipe you saved!"
                >
                    <x-icons.random />
                    Random Recipe
                </a>
            @endif
        </div>

        <x-recipe-filters :results-count="$recipes->count()" />

        @if ($recipes && $recipes->isNotEmpty())
            <x-recipe-grid :recipes="$recipes" />
        @else
            <x-recipe-empty />
        @endif
    </div>
</div>
