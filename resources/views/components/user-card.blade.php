@props([
    'name' => null,
    'image' => null,
    'imageFull' => false,
    'imageSide' => false,
    'link' => null,
])

@php
    $classes = array_filter([
        'card',
        'shadow-md',
        'w-full',
        'card-sm',
        'border-3 border-white',
        'hover:border-slate-200',
        'transition ease-in-out duration-300',
        $imageSide ? 'card-side' : null,
        $imageFull ? 'image-full' : null,
        $link ? 'relative hover:shadow-lg transition-all duration-200 cursor-pointer overflow-hidden rounded-lg' : null,
    ]);
@endphp

<div
    {{ $attributes->merge([
        'class' => implode(' ', $classes),
        'title' => 'View ' . $name,
        'aria-label' => 'View ' . $name,
    ]) }}>
    @if ($link)
        <a
            href="{{ $link }}"
            class="absolute inset-0 z-10 rounded"
        ></a>
    @endif
    @if ($image)
        <figure class="overflow-hidden rounded-t">
            <img
                src="{{ $image }}"
                alt="{{ $name }}"
                class="h-56 w-full object-cover"
            />
        </figure>
    @endif
    <div class="card-body font-[Jost] relative z-20">
        @if ($name)
            <h2 class="card-title">{{ Str::limit($name, 20) }}</h2>
        @endif
    </div>
</div>
