@props(['image', 'alt', 'title' => null, 'sm' => false])

@php
    $classes = array_filter([
        'cursor-pointer',
        'rounded-full',
        'object-cover',
        'shadow-md',
        'hover:brightness-120',
        'transition',
        'duration-200',
        'ease-in-out',
        $sm ? 'h-10 w-10 border-2 border-rose-600' : 'h-56 w-56 border-4 border-white',
    ]);
@endphp

<div>
    <img
        {{ $attributes->merge([
            'tabindex' => '0',
            'role' => 'button',
            'src' => $image,
            'alt' => $alt,
            'title' => $title ? $title : $alt,
            'class' => implode(' ', $classes),
        ]) }}>
</div>
