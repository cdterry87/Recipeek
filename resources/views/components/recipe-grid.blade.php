@props(['recipes', 'md' => false, 'route' => 'view-recipe'])

@php
    $classes = array_filter([
        'grid grid-cols-1 sm:grid-cols-2 gap-6',
        'grid grid-cols-1 sm:grid-cols-2 gap-6',
        $md ? 'lg:grid-cols-3' : 'md:grid-cols-3 lg:grid-cols-4',
    ]);
@endphp


<div>
    <div {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
        @foreach ($recipes as $recipe)
            <x-recipe-card
                :title="$recipe->title"
                :image="asset($recipe->image)"
                :description="$recipe->description"
                :link="route($route, $recipe->slug)"
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
