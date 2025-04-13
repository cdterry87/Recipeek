@props(['placeholder' => 'Search...'])

<label class="input w-full">
    <x-icons.search />
    <input
        {{ $attributes->merge([
            'type' => 'search',
            'class' => 'grow',
            'placeholder' => $placeholder,
        ]) }}
    />
</label>
