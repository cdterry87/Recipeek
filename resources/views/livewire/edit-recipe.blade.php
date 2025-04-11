<div class="max-w-4xl mx-auto p-6 my-8 flex flex-col gap-16">
    <div class="flex flex-col-reverse sm:flex-row gap-4 justify-between items-center">
        <h1 class="text-2xl sm:text-3xl font-bold">Edit Recipe</h1>
        <a
            href="{{ route('view-recipe', [
                'recipe' => $slug,
            ]) }}"
            class="btn btn-primary btn-sm sm:btn-md"
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
                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                />
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                />
            </svg>
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
