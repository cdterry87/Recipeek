@props([
    'title' => null,
    'image' => null,
    'imageFull' => false,
    'imageSide' => false,
    'xs' => false,
    'sm' => false,
    'md' => false,
    'lg' => false,
    'xl' => false,
    'actions' => null,
])

@php
    $classes = array_filter([
        'card',
        'shadow-md',
        $imageSide ? 'card-side' : null,
        $imageFull ? 'image-full' : null,
        $xs ? 'card-xs' : null,
        $sm ? 'card-sm' : null,
        $md ? 'card-md' : null,
        $lg ? 'card-lg' : null,
        $xl ? 'card-xl' : null,
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
            />
        </figure>
    @endif
    <div class="card-body">
        @if ($title)
            <h2 class="card-title">{{ $title }}</h2>
        @endif
        <div>
            {{ $slot }}
        </div>
        @if ($actions)
            <div class="justify-end card-actions">
                {{ $actions }}
            </div>
        @endif
    </div>
</div>
