<div class="max-w-6xl mx-auto p-6">
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

    <x-filters :results-count="$recipes->count()" />

    @if ($recipes && $recipes->isNotEmpty())
        <x-recipe-grid :recipes="$recipes" />
    @else
        <x-recipe-empty />
    @endif
</div>
