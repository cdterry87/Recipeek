@props([
    'label',
    'id',
    'name',
    'value' => '',
    'required' => false,
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
    'blankLabel' => false,
    'options' => [],
])

@php
    $classes = array_filter([
        'select',
        'select-bordered',
        $primary ? 'select-primary' : null,
        $secondary ? 'select-secondary' : null,
        $accent ? 'select-accent' : null,
        $neutral ? 'select-neutral' : null,
        $ghost ? 'select-ghost' : null,
        $info ? 'select-info' : null,
        $success ? 'select-success' : null,
        $warning ? 'select-warning' : null,
        $error ? 'select-error' : null,
        $block ? 'w-full' : null,
        $xs ? 'select-xs' : null,
        $sm ? 'select-sm' : null,
        $md ? 'select-md' : null,
        $lg ? 'select-lg' : null,
        $xl ? 'select-xl' : null,
    ]);
@endphp

<fieldset class="fieldset">
    <legend class="fieldset-legend {{ $hiddenLabel ? 'sr-only' : '' }}">
        {{ $label }}
        @if ($required)
            <span class="text-error">*</span>
        @endif
    </legend>
    <select
        {{ $attributes->merge([
            'id' => $id,
            'name' => $name,
            'required' => $required,
            'class' => implode(' ', $classes),
            'aria-required' => $required ? 'true' : 'false',
        ]) }}
    >
        @if ($blankLabel)
            <option value="">{{ $blankLabel }}</option>
        @endif
        @if ($options)
            @foreach ($options as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        @endif
    </select>
    @error($id)
        <p class="fieldset-label text-error">{{ $message }}</p>
    @enderror
</fieldset>
