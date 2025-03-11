@props(['initials', 'sm' => false])

@php
    $classes = array_filter([
        'select-none font-bold rounded-full',
        'flex items-center justify-center',
        'bg-slate-800 text-white',
        'transition duration-300 ease-in-out',
        $sm
            ? 'h-10 w-10 hover:bg-rose-600 cursor-pointer'
            : 'cursor-default h-56 w-56 text-6xl border-4 border-white shadow-md hover:brightness-120',
    ]);
@endphp

<div
    {{ $attributes->merge([
        'tabindex' => '0',
        'role' => 'button',
        'class' => implode(' ', $classes),
    ]) }}>
    {{ $initials }}
</div>
