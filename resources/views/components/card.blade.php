@props([
    'title' => null,
    'image' => null,
    'imageFull' => false,
    'imageSide' => false,
    'actions' => null,
])

@php
    $classes = array_filter([
        'card',
        'shadow-md',
        'w-full',
        'card-sm',
        $imageSide ? 'card-side' : null,
        $imageFull ? 'image-full' : null,
    ]);
@endphp

<div {{ $attributes->merge([
    'class' => implode(' ', $classes),
]) }}>
    @if ($image)
        <figure>
            <img
                src="{{ $image }}"
                alt="{{ $title }}"
                class="h-64 w-full object-cover"
            />
        </figure>
    @endif
    <div class="card-body font-[Jost]">
        @if ($title)
            <h2 class="card-title">{{ $title }}</h2>
        @endif
        <div class="text-gray-600">
            {{ $slot }}
        </div>
        @if ($actions)
            <div class="w-full">
                {{ $actions }}
            </div>
        @endif
    </div>
</div>
