@props(['recipes', 'md' => false, 'route' => 'view-recipe'])

@php
    $classes = array_filter([
        'recipe-grid',
        'grid grid-cols-1 sm:grid-cols-2 gap-6',
        $md ? 'lg:grid-cols-3' : 'md:grid-cols-2 xl:grid-cols-4',
    ]);
@endphp


<div>
    <div {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
        @foreach ($recipes as $recipe)
            @php
                $routeParams = $recipe->slug;
                if ($route === 'edit-recipe') {
                    $routeParams = $recipe->uuid;
                }
            @endphp

            <x-recipe-card
                :title="$recipe->title"
                :image="asset($recipe->image)"
                :description="$recipe->description"
                :link="route($route, $routeParams)"
                :category="$recipe->category"
                :cuisine="$recipe->cuisine"
                :time="$recipe->getFormattedTime()"
                wire:key="recipe-{{ $recipe->id }}"
            />
        @endforeach
    </div>

    @if (
        $recipes instanceof \Illuminate\Pagination\Paginator ||
            $recipes instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="mt-6">
            {{ $recipes->links() }}
        </div>
    @endif
</div>
