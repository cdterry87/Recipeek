@props([
    'title' => null,
    'image' => null,
    'description' => null,
    'imageFull' => false,
    'imageSide' => false,
    'category' => null,
    'cuisine' => null,
    'method' => null,
    'occasion' => null,
    'difficulty' => null,
    'time' => null,
    'link' => null,
])

@php
    $classes = array_filter([
        'recipe-card',
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
        'title' => 'View ' . $title,
        'aria-label' => 'View ' . $title,
    ]) }}>
    @if ($link)
        <a
            href="{{ $link }}"
            class="absolute inset-0 z-40 rounded"
        ></a>
    @endif
    @if ($image)
        <figure class="overflow-hidden">
            <img
                src="{{ $image }}"
                alt="{{ $title }}"
                class="h-56 w-full object-cover"
            />
        </figure>
    @endif
    <div class="card-body font-[Jost] relative z-20">
        @if ($title)
            <h2 class="card-title">{{ Str::limit($title, 20) }}</h2>
        @endif
        @if ($description)
            <div class="text-gray-600">
                {{ $description }}
            </div>
        @endif
        @if ($time || $difficulty || $category)
            <div class="card-actions h-full items-end">
                <div class="flex flex-wrap items-center gap-1">
                    @if ($category)
                        <span class="badge badge-outline badge-sm">{{ $category }}</span>
                    @endif
                    @if ($cuisine)
                        <span class="badge badge-outline badge-sm">{{ $cuisine }}</span>
                    @endif
                    @if ($method)
                        <span class="badge badge-outline badge-sm">{{ $method }}</span>
                    @endif
                    @if ($difficulty)
                        <span class="badge badge-outline badge-sm">{{ $difficulty }}</span>
                    @endif
                    @if ($occasion)
                        <span class="badge badge-outline badge-sm">{{ $occasion }}</span>
                    @endif
                    @if ($time)
                        <span class="badge badge-outline badge-sm">{{ $time }}</span>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
