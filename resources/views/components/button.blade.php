@props([
    'primary' => false,
    'secondary' => false,
    'accent' => false,
    'neutral' => false,
    'info' => false,
    'success' => false,
    'warning' => false,
    'error' => false,
    'ghost' => false,
    'link' => false,
    'outline' => false,
    'active' => false,
    'disabled' => false,
    'square' => false,
    'circle' => false,
    'block' => false,
    'loading' => false,
    'uppercase' => false,
    'rounded' => false,
    'xs' => false,
    'sm' => false,
    'md' => false,
    'lg' => false,
    'xl' => false,
    'wide' => false,
])

@php
    $classes = array_filter([
        'btn',
        $primary ? 'btn-primary' : null,
        $secondary ? 'btn-secondary' : null,
        $accent ? 'btn-accent' : null,
        $neutral ? 'btn-neutral' : null,
        $info ? 'btn-info' : null,
        $success ? 'btn-success' : null,
        $warning ? 'btn-warning' : null,
        $error ? 'btn-error' : null,
        $ghost ? 'btn-ghost' : null,
        $link ? 'btn-link' : null,
        $active ? 'btn-active' : null,
        $disabled ? 'btn-disabled' : null,
        $square ? 'btn-square' : null,
        $circle ? 'btn-circle' : null,
        $uppercase ? 'uppercase' : null,
        $outline ? 'btn-outline' : null,
        $block ? 'btn-block' : null,
        $rounded ? 'btn-rounded' : null,
        $xs ? 'btn-xs' : null,
        $sm ? 'btn-sm' : null,
        $md ? 'btn-md' : null,
        $lg ? 'btn-lg' : null,
        $xl ? 'btn-xl' : null,
        $wide ? 'btn-wide' : null,
    ]);
@endphp

<button {{ $attributes->merge([
    'class' => implode(' ', $classes),
]) }}>
    <span class="flex items-center gap-2">
        @if ($loading)
            <span class="loading loading-spinner"></span>
        @endif
        <span>
            {{ $slot }}
        </span>
    </span>
</button>
