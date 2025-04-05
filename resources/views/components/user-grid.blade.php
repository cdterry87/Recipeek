@props(['results', 'variant' => null, 'route' => 'view-creator'])

@php
    $classes = array_filter(['grid grid-cols-1 sm:grid-cols-2 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4']);
@endphp

<div>
    <div {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
        @foreach ($results as $user)
            <x-user-card
                :user="$user"
                :variant="$variant"
                wire:key="user-{{ $user->id }}"
            />
        @endforeach
    </div>

    @if (
        $results instanceof \Illuminate\Pagination\Paginator ||
            $results instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="mt-6">
            {{ $results->links() }}
        </div>
    @endif
</div>
