<div class="mx-auto">
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

    <section class="container mx-auto px-6 py-8 lg:px-16 font-[Jost]">
        <div class="flex flex-col gap-8">
            <div class="flex flex-col items-center gap-6 md:flex-row md:justify-between text-gray-500">
                <div>
                    <div class="text-2xl font-bold text-gray-900">
                        by
                        @if ($recipe->user->public)
                            <a
                                href="{{ route('view-creator', $recipe->user->slug) }}"
                                class="text-primary hover:brightness-90 transition duration-200 ease-in-out"
                                title="View {{ ucwords($recipe->user->name) }}'s profile"
                                aria-label="View {{ ucwords($recipe->user->name) }}'s profile"
                            >
                                {{ ucwords($recipe->user->name) }}
                            </a>
                        @else
                            {{ ucwords($recipe->user->name) }}
                        @endif
                    </div>
                    <div>on {{ $recipe->created_at->format('M n, Y') }}</div>
                </div>
                <div class="flex flex-col items-center gap-1">
                    <div class="rating">
                        <div
                            class="mask mask-star"
                            aria-label="1 star"
                        ></div>
                        <div
                            class="mask mask-star"
                            aria-label="2 star"
                        ></div>
                        <div
                            class="mask mask-star"
                            aria-label="3 star"
                            aria-current="true"
                        ></div>
                        <div
                            class="mask mask-star"
                            aria-label="4 star"
                        ></div>
                        <div
                            class="mask mask-star"
                            aria-label="5 star"
                        ></div>
                    </div>
                    <span class="text-sm">
                        <strong>(3.0)</strong>
                        <span>0 ratings</span>
                    </span>
                </div>
            </div>

            {{-- @todo - Add rating / save buttons --}}

            <div class="flex flex-wrap gap-3 text-gray-600">
                @if ($recipe->category)
                    <span class="badge badge-outline">Category: {{ $recipe->category }}</span>
                @endif
                @if ($recipe->cuisine)
                    <span class="badge badge-outline">Cuisine: {{ $recipe->cuisine }}</span>
                @endif
                @if ($recipe->difficulty)
                    <span class="badge badge-outline">Difficulty: {{ $recipe->difficulty }}</span>
                @endif
                @if ($recipe->method)
                    <span class="badge badge-outline">Method: {{ $recipe->method }}</span>
                @endif
                @if ($recipe->occasion)
                    <span class="badge badge-outline">Occasion: {{ $recipe->occasion }}</span>
                @endif
                <span class="badge badge-outline">Cook Time: {{ $recipe->getFormattedTime() }}</span>
                @if ($recipe->calories)
                    <span class="badge badge-outline">Calories: {{ $recipe->calories }}</span>
                @endif
                @if ($recipe->servings)
                    <span class="badge badge-outline">Servings: {{ $recipe->servings }}</span>
                @endif
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="col-span-1">
                    <div>
                        <h2 class="text-2xl font-semibold mb-4">Ingredients</h2>
                        <ul class="list-none text-gray-700 space-y-2">
                            @foreach ($recipe->ingredients as $ingredient)
                                <li>
                                    <strong>{{ $ingredient->quantity }} {{ $ingredient->unit }}</strong>
                                    {{ $ingredient->ingredient }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-span-2 flex flex-col gap-6">
                    <div>
                        <h2 class="text-2xl font-semibold mb-4">Instructions</h2>
                        <ol class="list-decimal pl-5 text-gray-700 space-y-2">
                            @foreach ($recipe->instructions as $step)
                                <li>{{ $step->instruction }}</li>
                                <hr class="border border-gray-200 my-6">
                            @endforeach
                        </ol>
                    </div>

                    @if ($recipe->video)
                        <div>
                            <h2 class="text-2xl font-semibold mb-4">Video Instructions</h2>
                            <div class="video-embed">
                                {!! $recipe->video !!}
                            </div>
                        </div>
                    @endif

                    @if ($recipe->notes)
                        <div>
                            <h2 class="text-2xl font-semibold mb-4">Notes</h2>
                            <p class="text-gray-700">{!! nl2br($recipe->notes) !!}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</div>
