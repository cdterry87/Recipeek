<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Create a New Recipe</h2>

    <form
        wire:submit.prevent="saveRecipe"
        class="space-y-4"
    >

        <div class="form-control">
            <label class="label">Title</label>
            <input
                type="text"
                wire:model="title"
                class="input input-bordered"
                placeholder="Recipe title"
            >
            @error('title')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-control">
            <label class="label">Description</label>
            <input
                type="text"
                wire:model="description"
                class="input input-bordered"
                placeholder="Short description"
            >
            @error('description')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="form-control">
                <label class="label">Category</label>
                <select
                    wire:model="category"
                    class="select select-bordered"
                >
                    <option value="">Select Category</option>
                    <option value="breakfast">Breakfast</option>
                    <option value="lunch">Lunch</option>
                    <option value="dinner">Dinner</option>
                    <option value="snack">Snack</option>
                </select>
                @error('category')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-control">
                <label class="label">Difficulty</label>
                <select
                    wire:model="difficulty"
                    class="select select-bordered"
                >
                    <option value="">Select Difficulty</option>
                    <option value="easy">Easy</option>
                    <option value="medium">Medium</option>
                    <option value="hard">Hard</option>
                </select>
                @error('difficulty')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4">
            <div class="form-control">
                <label class="label">Hours</label>
                <input
                    type="number"
                    wire:model="hours"
                    class="input input-bordered"
                    min="0"
                    max="23"
                >
                @error('hours')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-control">
                <label class="label">Minutes</label>
                <input
                    type="number"
                    wire:model="minutes"
                    class="input input-bordered"
                    min="0"
                    max="59"
                >
                @error('minutes')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-control">
                <label class="label">Servings</label>
                <input
                    type="number"
                    wire:model="servings"
                    class="input input-bordered"
                    min="1"
                    max="50"
                >
                @error('servings')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-control">
            <label class="label">Calories</label>
            <input
                type="number"
                wire:model="calories"
                class="input input-bordered"
                min="0"
                max="5000"
            >
            @error('calories')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-control">
            <label class="label">Recipe Image</label>
            <input
                type="file"
                wire:model="image"
                class="file-input file-input-bordered w-full"
            >
            @error('image')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-control">
            <label class="label">Video URL</label>
            <input
                type="url"
                wire:model="video"
                class="input input-bordered"
                placeholder="https://example.com/video"
            >
            @error('video')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-control">
            <label class="cursor-pointer flex items-center">
                <input
                    type="checkbox"
                    wire:model="private"
                    class="checkbox"
                >
                <span class="ml-2">Make this recipe private</span>
            </label>
            @error('private')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button
            type="submit"
            class="btn btn-primary w-full"
        >Save Recipe</button>

    </form>
</div>
