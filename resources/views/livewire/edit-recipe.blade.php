<div class="max-w-4xl mx-auto p-6 my-8 flex flex-col gap-16">
    <div class="flex flex-col-reverse sm:flex-row gap-4 justify-between items-center">
        <h1 class="text-2xl sm:text-3xl font-bold">Edit Recipe</h1>
        <a
            href="{{ route('view-recipe', [
                'recipe' => $slug,
            ]) }}"
            class="btn btn-primary btn-sm sm:btn-md"
        >
            <x-icons.view />
            View Recipe
        </a>
    </div>

    @if (session('edit-recipe-message'))
        <x-alert
            success
            class="mb-2"
        >
            {{ session('edit-recipe-message') }}
        </x-alert>
    @endif

    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-8">
        <div class="w-full mb-6 flex flex-col gap-4">
            <h2 class="font-bold text-3xl font-[Jost]">
                Recipe Details
            </h2>
            <p class="text-sm italic">
                Edit your recipe by filling out the following details. Add ingredients and instructions to complete your
                recipe.
            </p>
        </div>

        <div class="w-full">
            <x-recipe-form
                :image="$image"
                :image-path="$imagePath"
            />
        </div>
    </div>

    <hr class="w-full md:w-1/2 mx-auto border-2 border-rose-600 my-8">

    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-8">
        <div class="w-full mb-6 flex flex-col gap-4">
            <h2 class="font-bold text-3xl font-[Jost]">
                Add Ingredients
            </h2>
            <p class="text-sm italic">
                Add ingredients to your recipe with their quantity and unit of measure. You can add as many ingredients
                as you like.
            </p>
        </div>

        <livewire:recipe-ingredients-form :recipe-id="$recipeId" />
    </div>

    <hr class="w-full md:w-1/2 mx-auto border-2 border-rose-600 my-8">

    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-8">
        <div class="w-full mb-6 flex flex-col gap-4">
            <h2 class="font-bold text-3xl font-[Jost]">
                Add Instructions
            </h2>
            <p class="text-sm italic">
                Add instructions to your recipe. You can add as many instructions as you like and specify the order of
                each step.
            </p>
        </div>

        <livewire:recipe-instructions-form :recipe-id="$recipeId" />
    </div>

    <hr class="w-full md:w-1/2 mx-auto border-2 border-rose-600 my-8">

    <div class="flex items-center justify-center">
        <button
            class="btn btn-error btn-sm sm:btn-md"
            onclick="recipe_delete__modal.showModal()"
        >
            <x-icons.delete />
            Delete Recipe
        </button>
        <dialog
            id="recipe_delete__modal"
            class="modal"
        >
            <div class="modal-box">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                </form>
                <h3 class="text-lg font-bold">Delete this Recipe?</h3>
                <p class="py-4">Deleting this recipe is permanent and cannot be undone.</p>
                <div class="modal-action">
                    <form method="dialog">
                        <button class="btn btn-secondary">Cancel</button>
                        <button
                            class="btn btn-error"
                            wire:click.prevent="deleteRecipe"
                        >Confirm Delete</button>
                    </form>
                </div>
            </div>
            <form
                method="dialog"
                class="modal-backdrop"
            >
                <button>close</button>
            </form>
        </dialog>
    </div>
</div>
