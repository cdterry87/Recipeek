<div class="max-w-6xl mx-auto p-6">
    <div class="flex flex-col gap-6">
        <div class="flex flex-col-reverse sm:flex-row gap-4 justify-between items-center">
            <h1 class="text-2xl sm:text-3xl font-bold">My Recipes</h1>
            <a
                href="{{ route('create-recipe') }}"
                class="btn btn-primary btn-sm sm:btn-md"
            >
                <x-icons.plus />
                New Recipe
            </a>
        </div>

        @if (session('recipe-message'))
            <x-alert
                success
                class="mb-2"
            >
                {{ session('recipe-message') }}
            </x-alert>
        @endif

        <x-recipe-filters :results-count="$recipes->count()" />
    </div>

    @if ($recipes && $recipes->isNotEmpty())
        <x-recipe-grid
            :recipes="$recipes"
            route="edit-recipe"
        />
    @else
        <x-recipe-empty />
    @endif
</div>
