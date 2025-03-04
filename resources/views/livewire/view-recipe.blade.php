<div class="mx-auto">
    <!-- Cover Image -->
    <div class="relative w-full h-80">
        <img
            src="{{ asset($recipe->image) }}"
            alt="{{ $recipe->title }}"
            class="w-full h-full object-cover"
        >
        <div
            class="absolute inset-0 bg-black/50 items-center justify-center flex flex-col gap-6 w-full px-6 text-center">
            <h1 class="text-white text-4xl font-bold">{{ $recipe->title }}</h1>
            <h2 class="font-semibold text-lg text-white">{{ $recipe->description }}</h2>
        </div>
    </div>

    <section class="container mx-auto px-6 py-8 lg:px-16">

        {{-- @todo - Add rating / save buttons --}}

        <div class="flex flex-col gap-8">
            <div class="flex flex-wrap gap-4 text-gray-600">
                <span class="badge badge-outline">Category: {{ $recipe->category }}</span>
                <span class="badge badge-outline">Cuisine: {{ $recipe->cuisine }}</span>
                <span class="badge badge-outline">Difficulty: {{ $recipe->difficulty }}</span>
                <span class="badge badge-outline">Method: {{ $recipe->method }}</span>
                <span class="badge badge-outline">Occasion: {{ $recipe->occasion }}</span>
                <span class="badge badge-outline">Cook Time: {{ $recipe->getFormattedTime() }}</span>
                <span class="badge badge-outline">Calories: {{ $recipe->calories }} calories</span>
                <span class="badge badge-outline">Servings: {{ $recipe->servings }}</span>
            </div>

            <div>
                <h2 class="text-2xl font-semibold mb-4">Ingredients</h2>
                <ul class="list-disc pl-5 text-gray-700 font-[Jost]">
                    @foreach ($recipe->ingredients as $ingredient)
                        <li>{{ $ingredient->quantity }} {{ $ingredient->unit }} - {{ $ingredient->ingredient }}</li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h2 class="text-2xl font-semibold mb-4">Instructions</h2>
                <ol class="list-decimal pl-5 text-gray-700 font-[Jost]">
                    @foreach ($recipe->instructions as $step)
                        <li class="mb-2">{{ $step->instruction }}</li>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>
</div>
