@props([
    'label',
    'id',
    'name',
    'value' => '',
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
    'rows' => 5,
])

@php
    $classes = array_filter([
        'textarea',
        $primary ? 'textarea-primary' : null,
        $secondary ? 'textarea-secondary' : null,
        $accent ? 'textarea-accent' : null,
        $neutral ? 'textarea-neutral' : null,
        $ghost ? 'textarea-ghost' : null,
        $info ? 'textarea-info' : null,
        $success ? 'textarea-success' : null,
        $warning ? 'textarea-warning' : null,
        $error ? 'textarea-error' : null,
        $block ? 'w-full' : null,
        $xs ? 'textarea-xs' : null,
        $sm ? 'textarea-sm' : null,
        $md ? 'textarea-md' : null,
        $lg ? 'textarea-lg' : null,
        $xl ? 'textarea-xl' : null,
    ]);
@endphp

<fieldset class="fieldset">
    <legend class="fieldset-legend {{ $hiddenLabel ? 'sr-only' : '' }}">
        {{ $label }}
        @if ($required)
            <span class="text-error">*</span>
        @endif
    </legend>
    <textarea
        {{ $attributes->merge([
            'id' => $id,
            'name' => $name,
            'required' => $required,
            'class' => implode(' ', $classes),
            'placeholder' => $placeholder,
            'aria-required' => $required ? 'true' : 'false',
            'rows' => $rows,
        ]) }}
    >{{ $value }}</textarea>
    @error($id)
        <p class="fieldset-label text-error">{{ $message }}</p>
    @enderror
</fieldset>
