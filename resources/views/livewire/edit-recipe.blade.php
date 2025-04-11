<div class="max-w-4xl mx-auto p-6 my-8 flex flex-col gap-16">
    <h1 class="font-bold text-4xl">
        Edit Recipe
    </h1>

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

        <div class="w-full">
            <x-recipe-ingredients-form />
        </div>
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

        <div class="w-full">
            <x-recipe-instructions-form />
        </div>
    </div>
</div>
