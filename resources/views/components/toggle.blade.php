@props([
    'label',
    'id',
    'name',
    'checked' => null,
    'primary' => false,
    'secondary' => false,
    'accent' => false,
    'neutral' => false,
    'info' => false,
    'success' => false,
    'warning' => false,
    'error' => false,
    'xs' => false,
    'sm' => false,
    'md' => false,
    'lg' => false,
    'xl' => false,
    'hiddenLabel' => false,
])

@php
    $classes = array_filter([
        'toggle',
        $primary ? 'toggle-primary' : null,
        $secondary ? 'toggle-secondary' : null,
        $accent ? 'toggle-accent' : null,
        $neutral ? 'toggle-neutral' : null,
        $info ? 'toggle-info' : null,
        $success ? 'toggle-success' : null,
        $warning ? 'toggle-warning' : null,
        $error ? 'toggle-error' : null,
        $xs ? 'toggle-xs' : null,
        $sm ? 'toggle-sm' : null,
        $md ? 'toggle-md' : null,
        $lg ? 'toggle-lg' : null,
        $xl ? 'toggle-xl' : null,
    ]);
@endphp

<div>
    <label class="fieldset-label">
        <input
            {{ $attributes->merge([
                'id' => $id,
                'name' => $name,
                'type' => 'checkbox',
                'class' => implode(' ', $classes),
            ]) }}
        />
        <span class="fieldset-legend text-xs {{ $hiddenLabel ? 'sr-only' : '' }}">
            {{ $label }}
        </span>
    </label>
    @error($id)
        <p class="fieldset-label text-error">{{ $message }}</p>
    @enderror
</div>
