@props(['title', 'image'])

<div>
    <a
        href="#"
        title="View {{ $title }}"
    >
        <img
            src="{{ asset($image) }}"
            alt="Recipe Card"
            class="w-full h-96 object-cover rounded-2xl hover:scale-105 transition-all duration-300"
        >
        <div class="mt-2 text-xl text-center font-bold text-gray-800 font-jost uppercase">
            {{ $title }}
        </div>
    </a>
</div>
