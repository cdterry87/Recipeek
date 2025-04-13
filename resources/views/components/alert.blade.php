@props(['info' => false, 'success' => false, 'warning' => false, 'error' => false])

@php
    $classes = array_filter([
        'alert alert-soft',
        $info ? 'alert-info' : null,
        $success ? 'alert-success' : null,
        $warning ? 'alert-warning' : null,
        $error ? 'alert-error' : null,
    ]);
@endphp

<div
    role="alert"
    {{ $attributes->merge(['class' => implode(' ', $classes)]) }}
>
    @if ($error)
        <x-icons.error />
    @endif
    @if ($info)
        <x-icons.info />
    @endif
    @if ($success)
        <x-icons.success />
    @endif
    @if ($warning)
        <x-icons.warning />
    @endif
    <span>{{ $slot }}</span>
</div>
