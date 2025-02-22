@props([
    'label',
    'id',
    'name',
    'value' => '',
    'required' => false,
    'autocomplete' => 'off',
    'type' => 'text',
    'placeholder' => '',
    'primary' => false,
    'secondary' => false,
    'accent' => false,
    'neutral' => false,
    'info' => false,
    'success' => false,
    'warning' => false,
    'error' => false,
    'ghost' => false,
    'block' => false,
    'xs' => false,
    'sm' => false,
    'md' => false,
    'lg' => false,
    'xl' => false,
    'hiddenLabel' => false,
])

@php
    $classes = array_filter([
        'input',
        $primary ? 'input-primary' : null,
        $secondary ? 'input-secondary' : null,
        $accent ? 'input-accent' : null,
        $neutral ? 'input-neutral' : null,
        $ghost ? 'input-ghost' : null,
        $info ? 'input-info' : null,
        $success ? 'input-success' : null,
        $warning ? 'input-warning' : null,
        $error ? 'input-error' : null,
        $block ? 'w-full' : null,
        $xs ? 'input-xs' : null,
        $sm ? 'input-sm' : null,
        $md ? 'input-md' : null,
        $lg ? 'input-lg' : null,
        $xl ? 'input-xl' : null,
    ]);
@endphp

<fieldset class="fieldset">
    <legend class="fieldset-legend {{ $hiddenLabel ?? 'hidden' }}">{{ $label }}</legend>
    <input
        {{ $attributes->merge([
            'id' => $id,
            'name' => $name,
            'value' => $value,
            'required' => $required,
            'autocomplete' => $autocomplete,
            'type' => $type,
            'class' => implode(' ', $classes),
            'placeholder' => $placeholder,
            'aria-required' => $required ? 'true' : 'false',
        ]) }}
    />
    @error($id)
        <p class="fieldset-label">{{ $message }}</p>
    @enderror
</fieldset>
