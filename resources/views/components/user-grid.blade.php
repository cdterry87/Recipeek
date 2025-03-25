@props(['users', 'route' => 'view-creator'])

@php
    $classes = array_filter(['grid grid-cols-1 sm:grid-cols-2 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4']);
@endphp


<div>
    <div {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
        @foreach ($users as $user)
            <x-user-card
                :name="$user->user->name"
                :image="asset($user->user->avatar)"
                wire:key="user-{{ $user->user->id }}"
            />
        @endforeach
    </div>

    @if ($users instanceof \Illuminate\Pagination\Paginator || $users instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="mt-6">
            {{ $users->links() }}
        </div>
    @endif
</div>
