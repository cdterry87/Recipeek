<div class="w-full flex flex-col gap-6">
    <form
        class="flex flex-col gap-2"
        wire:submit.prevent="saveIngredient"
    >
        @if (session('recipe-ingredients-message'))
            <x-alert
                success
                class="mb-2"
            >
                {{ session('recipe-ingredients-message') }}
            </x-alert>
        @endif

        <x-input-text
            label="Ingredient"
            id="ingredient"
            name="ingredient"
            placeholder="Name of the ingredient"
            wire:model="ingredient"
            required
            block
            maxlength="80"
        />

        <div class="grid grid-cols-2 gap-6">
            <x-input-text
                label="Quantity"
                id="quantity"
                name="quantity"
                placeholder="Quantity of the ingredient"
                wire:model="quantity"
                block
                maxlength="20"
            />
            <x-input-text
                label="Unit of Measure"
                id="unit"
                name="unit"
                placeholder="Unit of measure"
                wire:model="unit"
                block
                maxlength="20"
            />
        </div>

        <div>
            <x-button
                primary
                block
                class="mt-4"
            >
                Save Ingredient
            </x-button>
        </div>
    </form>

    <hr>

    <h3 class="font-bold text-lg">Ingredients</h3>

    @if ($ingredients->isEmpty())
        <p class="text-gray-500 italic text-sm">No ingredients added yet.</p>
    @else
        <ul class="space-y-3">
            @foreach ($ingredients as $ingredient)
                <li class="flex items-start justify-between gap-4">
                    <span>
                        <strong>{{ $ingredient->quantity }} {{ $ingredient->unit }}</strong>
                        {{ $ingredient->ingredient }}
                    </span>
                    <button
                        wire:click.prevent="removeIngredient({{ $ingredient->id }})"
                        class="btn btn-ghost btn-circle text-error hover:brightness-120 cursor-pointer"
                        title="Remove Ingredient"
                        alt="Remove Ingredient"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="size-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                            />
                        </svg>
                    </button>
                </li>
            @endforeach
        </ul>
    @endif
</div>
