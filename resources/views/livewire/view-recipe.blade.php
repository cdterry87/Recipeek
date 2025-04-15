<div>
    @if (!$recipe->public)
        <x-private-recipe />
    @else
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

            <section class="max-w-6xl mx-auto px-6 py-12 font-[Jost]">
                <div class="flex flex-col gap-12">
                    @if (session('message'))
                        <x-alert success>
                            {{ session('message') }}
                        </x-alert>
                    @endif

                    <div class="flex flex-col items-center gap-6 md:flex-row md:justify-between text-gray-500">
                        <div class="flex flex-col md:flex-row items-center gap-6 md:gap-16 text-center md:text-left">
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
                                <div class="text-sm">
                                    on {{ $recipe->created_at->format('M n, Y') }}
                                </div>
                            </div>

                            <livewire:recipe-rating :recipe="$recipe" />
                        </div>
                        <div class="flex items-center gap-2">
                            @if ($recipe->isOwnedByUser())
                                <x-button
                                    primary
                                    wire:click.prevent="edit"
                                    title="Edit Recipe"
                                    id="edit-button"
                                >
                                    Edit
                                </x-button>
                            @else
                                @if ($recipe->isSavedByUser())
                                    <x-button
                                        primary
                                        outline
                                        wire:click.prevent="unsave"
                                        title="Unsave Recipe"
                                        id="x-unsave-button"
                                    >
                                        Unsave
                                    </x-button>
                                @else
                                    <x-button
                                        primary
                                        wire:click.prevent="save"
                                        title="Save Recipe"
                                        id="x-save-button"
                                    >
                                        Save
                                    </x-button>
                                @endif
                            @endif
                            <x-button
                                secondary
                                wire:click.prevent="printRecipe"
                                title="Print Recipe"
                                id="print-button"
                            >
                                Print
                            </x-button>
                            <x-button
                                tertiary
                                title="Share Recipe"
                                id="share-button"
                                onclick="share__modal.showModal()"
                            >
                                Share
                            </x-button>

                            <x-share-modal :recipe="$recipe" />
                        </div>
                    </div>

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
    @endif

    @section('page-title', $pageTitle)
</div>
