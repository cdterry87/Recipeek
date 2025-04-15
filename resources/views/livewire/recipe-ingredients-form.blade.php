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
        <p
            id="no-ingredients"
            class="text-gray-500 italic text-sm"
        >
            No ingredients added yet.
        </p>
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
                        <x-icons.delete />
                    </button>
                </li>
            @endforeach
        </ul>
    @endif
</div>
