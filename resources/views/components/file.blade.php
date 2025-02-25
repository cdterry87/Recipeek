@props([
    'label',
    'id',
    'name',
    'required' => false,
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
        'file-input',
        $primary ? 'file-input-primary' : null,
        $secondary ? 'file-input-secondary' : null,
        $accent ? 'file-input-accent' : null,
        $neutral ? 'file-input-neutral' : null,
        $ghost ? 'file-input-ghost' : null,
        $info ? 'file-input-info' : null,
        $success ? 'file-input-success' : null,
        $warning ? 'file-input-warning' : null,
        $error ? 'file-input-error' : null,
        $block ? 'w-full' : null,
        $xs ? 'file-input-xs' : null,
        $sm ? 'file-input-sm' : null,
        $md ? 'file-input-md' : null,
        $lg ? 'file-input-lg' : null,
        $xl ? 'file-input-xl' : null,
    ]);
@endphp

<fieldset class="fieldset">
    <legend class="fieldset-legend {{ $hiddenLabel ?? 'hidden' }}">
        {{ $label }}
        @if ($required)
            <span class="text-error">*</span>
        @endif
    </legend>
    <input
        {{ $attributes->merge([
            'id' => $id,
            'name' => $name,
            'required' => $required,
            'class' => implode(' ', $classes),
            'placeholder' => $placeholder,
            'aria-required' => $required ? 'true' : 'false',
            'type' => 'file',
        ]) }}
    />
    @error($id)
        <p class="fieldset-label text-error">{{ $message }}</p>
    @enderror
</fieldset>
