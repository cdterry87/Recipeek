<div class="max-w-6xl mx-auto p-6">
    <div class="flex flex-row gap-4 justify-between items-center mb-6">
        <h1 class="text-2xl sm:text-3xl font-bold">Discover Recipes</h1>
    </div>

    <x-recipe-filters :results-count="$recipes->count()" />

    @if ($recipes && $recipes->isNotEmpty())
        <x-recipe-grid :recipes="$recipes" />
    @else
        <x-recipe-empty />
    @endif
</div>
