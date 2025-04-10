@props(['image' => null, 'imagePath' => null])

<form
    class="flex flex-col gap-2"
    wire:submit.prevent="saveRecipe"
>
    @if (session('message'))
        <x-alert
            success
            class="mb-2"
        >
            {{ session('message') }}
        </x-alert>
    @endif

    <div class="flex items-center gap-4">
        @if ($image && $image->temporaryUrl())
            <div class="flex items-start flex-col gap-2">
                <img
                    src="{{ $image->temporaryUrl() }}"
                    class="h-24 w-24 rounded-full object-cover shadow-md border-2 border-rose-600"
                    alt="Recipe Image Preview"
                >
                <div class="text-xs font-semibold italic">Recipe Image Preview</div>
            </div>
        @endif
        @if ($imagePath)
            <div class="flex items-center justify-center flex-col gap-2">
                <img
                    src="{{ asset($imagePath) }}"
                    class="h-24 w-24 rounded-full object-cover shadow-md border-2 border-rose-600"
                    alt="Recipe Image"
                >
                <div class="text-xs font-semibold italic">Current Recipe Image</div>
            </div>
            <div class="flex items-center justify-center">
                <x-button
                    secondary
                    xs
                    wire:click.prevent="removeImage"
                >
                    Remove Image
                </x-button>
            </div>
        @endif
    </div>

    <x-input-text
        label="Title"
        id="title"
        name="title"
        placeholder="Give your recipe a title"
        wire:model="title"
        required
        block
        maxlength="60"
    />

    <x-textarea
        label="Description"
        id="description"
        name="description"
        placeholder="Describe your recipe"
        wire:model="description"
        maxlength="255"
        block
    ></x-textarea>

    <x-file
        label="Image"
        id="image"
        name="image"
        placeholder="Upload an image of your recipe"
        wire:model="image"
        block
    />

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 sm:gap-x-8">
        <x-select
            label="Category"
            id="category"
            name="category"
            wire:model.live="category"
            blank-label="All Categories"
            :options="App\Enums\RecipeCategory::dropdown()"
            block
            required
        />
        <x-select
            label="Cuisine"
            id="cuisine"
            name="cuisine"
            wire:model.live="cuisine"
            blank-label="All Cuisines"
            :options="App\Enums\RecipeCuisine::dropdown()"
            block
            required
        />
        <x-select
            label="Difficulty"
            id="difficulty"
            name="difficulty"
            wire:model.live="difficulty"
            blank-label="All Difficulties"
            :options="App\Enums\RecipeDifficulty::dropdown()"
            block
            required
        />
        <x-select
            label="Method"
            id="method"
            name="method"
            wire:model.live="method"
            blank-label="All Methods"
            :options="App\Enums\RecipeMethod::dropdown()"
            block
        />
        <x-select
            label="Occasion"
            id="occasion"
            name="occasion"
            wire:model.live="occasion"
            blank-label="All Occasions"
            :options="App\Enums\RecipeOccasion::dropdown()"
            block
        />
        <x-input-text
            label="Calories"
            id="calories"
            name="calories"
            wire:model="calories"
            block
            min="0"
            max="99999"
            type="number"
        />
        <x-input-text
            label="Servings"
            id="servings"
            name="servings"
            wire:model="servings"
            block
            min="0"
            max="999"
            type="number"
        />
        <div class="grid grid-cols-2 gap-2 sm:gap-x-8">
            <x-input-text
                label="Hours"
                id="hours"
                name="hours"
                wire:model="hours"
                block
                min="0"
                max="99"
                type="number"
                required
            />
            <x-input-text
                label="Minutes"
                id="minutes"
                name="minutes"
                wire:model="minutes"
                block
                min="0"
                max="59"
                type="number"
                required
            />
        </div>
    </div>

    <x-textarea
        label="Video Embed Code"
        id="video"
        name="video"
        placeholder="If you have a video of your recipe, paste the embed code here"
        wire:model="video"
        block
    ></x-textarea>

    <x-textarea
        label="Notes"
        id="notes"
        name="notes"
        placeholder="Add any notes or special instructions about your recipe"
        wire:model="notes"
        block
    ></x-textarea>

    <x-toggle
        label="Public Recipe - Enable to allow others to view your recipe"
        id="public"
        name="public"
        wire:model="public"
        primary
    />

    <div>
        <x-button
            primary
            block
            class="mt-4"
        >
            Save Recipe
        </x-button>
    </div>
</form>
