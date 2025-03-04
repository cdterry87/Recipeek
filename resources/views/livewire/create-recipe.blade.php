<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-center mb-6">Create New Recipe</h2>

    @if (session()->has('message'))
        <div class="alert alert-success mb-6">
            <span>{{ session('message') }}</span>
        </div>
    @endif

    <form wire:submit.prevent="saveRecipe">
        <div class="space-y-6">
            <!-- Recipe Details Section -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label">Title</label>
                    <input
                        type="text"
                        wire:model="title"
                        class="input input-bordered w-full"
                        placeholder="Recipe Title"
                        required
                    />
                </div>
                <div class="form-control">
                    <label class="label">Category</label>
                    <input
                        type="text"
                        wire:model="category"
                        class="input input-bordered w-full"
                        placeholder="Category"
                    />
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label">Cuisine</label>
                    <input
                        type="text"
                        wire:model="cuisine"
                        class="input input-bordered w-full"
                        placeholder="Cuisine"
                    />
                </div>
                <div class="form-control">
                    <label class="label">Difficulty</label>
                    <input
                        type="text"
                        wire:model="difficulty"
                        class="input input-bordered w-full"
                        placeholder="Difficulty"
                    />
                </div>
            </div>

            <!-- Ingredients Section -->
            <div class="space-y-2">
                <h3 class="text-xl font-semibold">Ingredients</h3>
                <div class="space-y-2">
                    @foreach ($ingredients as $index => $ingredient)
                        <div class="flex items-center space-x-4">
                            <input
                                type="text"
                                wire:model="ingredients.{{ $index }}.ingredient"
                                class="input input-bordered w-full"
                                placeholder="Ingredient"
                            />
                            <input
                                type="text"
                                wire:model="ingredients.{{ $index }}.quantity"
                                class="input input-bordered w-full"
                                placeholder="Quantity"
                            />
                            <input
                                type="text"
                                wire:model="ingredients.{{ $index }}.unit"
                                class="input input-bordered w-full"
                                placeholder="Unit"
                            />
                            <button
                                type="button"
                                wire:click="removeIngredient({{ $index }})"
                                class="btn btn-error"
                            >Remove</button>
                        </div>
                    @endforeach
                    <div class="flex items-center space-x-4">
                        <input
                            type="text"
                            wire:model="newIngredient.ingredient"
                            class="input input-bordered w-full"
                            placeholder="New Ingredient"
                        />
                        <input
                            type="text"
                            wire:model="newIngredient.quantity"
                            class="input input-bordered w-full"
                            placeholder="Quantity"
                        />
                        <input
                            type="text"
                            wire:model="newIngredient.unit"
                            class="input input-bordered w-full"
                            placeholder="Unit"
                        />
                        <button
                            type="button"
                            wire:click="addIngredient"
                            class="btn btn-primary"
                        >Add Ingredient</button>
                    </div>
                </div>
            </div>

            <!-- Instructions Section -->
            <div class="space-y-2">
                <h3 class="text-xl font-semibold">Instructions</h3>
                <div class="space-y-2">
                    @foreach ($instructions as $index => $instruction)
                        <div class="flex items-center space-x-4">
                            <input
                                type="text"
                                wire:model="instructions.{{ $index }}.instruction"
                                class="input input-bordered w-full"
                                placeholder="Instruction"
                            />
                            <input
                                type="number"
                                wire:model="instructions.{{ $index }}.order"
                                class="input input-bordered w-full"
                                placeholder="Order"
                            />
                            <button
                                type="button"
                                wire:click="removeInstruction({{ $index }})"
                                class="btn btn-error"
                            >Remove</button>
                        </div>
                    @endforeach
                    <div class="flex items-center space-x-4">
                        <input
                            type="text"
                            wire:model="newInstruction.instruction"
                            class="input input-bordered w-full"
                            placeholder="New Instruction"
                        />
                        <input
                            type="number"
                            wire:model="newInstruction.order"
                            class="input input-bordered w-full"
                            placeholder="Order"
                        />
                        <button
                            type="button"
                            wire:click="addInstruction"
                            class="btn btn-primary"
                        >Add Instruction</button>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button
                    type="submit"
                    class="btn btn-success w-full"
                >Save Recipe</button>
            </div>
        </div>
    </form>
</div>
