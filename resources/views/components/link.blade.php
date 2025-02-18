@props([
    'primary' => false,
    'secondary' => false,
    'accent' => false,
    'neutral' => false,
    'info' => false,
    'success' => false,
    'warning' => false,
    'error' => false,
    'uppercase' => false,
])

@php
    $classes = array_filter([
        'link',
        $primary ? 'link-primary' : null,
        $secondary ? 'link-secondary' : null,
        $accent ? 'link-accent' : null,
        $neutral ? 'link-neutral' : null,
        $info ? 'link-info' : null,
        $success ? 'link-success' : null,
        $warning ? 'link-warning' : null,
        $error ? 'link-error' : null,
        $uppercase ? 'uppercase' : null,
    ]);
@endphp

<a {{ $attributes->merge([
    'class' => implode(' ', $classes),
    'href' => '#',
]) }}>
    {{ $slot }}
</a>
