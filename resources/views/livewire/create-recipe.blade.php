<div class="max-w-4xl mx-auto p-6 my-8 flex flex-col gap-16">
    <h1 class="font-bold text-4xl">
        Create a Recipe
    </h1>

    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-8">
        <div class="w-full mb-6 flex flex-col gap-4">
            <h2 class="font-bold text-3xl font-[Jost]">
                Recipe Details
            </h2>
            <p class="text-sm italic">
                Create your recipe by filling out the following details. Make sure to provide a clear title,
                description, and image.
                <strong>Your recipe will not be visible to others unless you enable the public option.</strong>
            </p>
            <p class="text-sm italic">
                After creating your recipe, you will be able to <strong>add ingredients and instructions</strong>. You
                can always edit your recipe at a later time.
            </p>
        </div>

        <div class="w-full">
            <x-recipe-form :image="$image" />
        </div>
    </div>
</div>
