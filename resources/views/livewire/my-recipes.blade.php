<div class="max-w-6xl mx-auto p-6">
    <!-- Page Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">My Recipes</h1>
        <button class="btn btn-primary">
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
                    d="M12 4.5v15m7.5-7.5h-15"
                />
            </svg>

            Create Recipe
        </button>
    </div>

    <!-- Search & Filters Section -->
    <div class="flex flex-wrap gap-4 items-center mb-6">
        <!-- Search Input -->
        <x-search
            placeholder="Search my recipes..."
            class="w-full md:w-1/2"
        />

        <!-- Filter Dropdowns -->
        <div class="dropdown">
            <label
                tabindex="0"
                class="btn btn-outline"
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
                        d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"
                    />
                </svg>

                Category
            </label>
            <ul
                tabindex="0"
                class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52"
            >
                <li><a href="#">Breakfast</a></li>
                <li><a href="#">Lunch</a></li>
                <li><a href="#">Dinner</a></li>
                <li><a href="#">Desserts</a></li>
                <li><a href="#">Drinks</a></li>
            </ul>
        </div>

        <div class="dropdown">
            <label
                tabindex="0"
                class="btn btn-outline"
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
                        d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941"
                    />
                </svg>

                Difficulty
            </label>
            <ul
                tabindex="0"
                class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52"
            >
                <li><a href="#">Easy</a></li>
                <li><a href="#">Medium</a></li>
                <li><a href="#">Hard</a></li>
            </ul>
        </div>

        <div class="dropdown">
            <label
                tabindex="0"
                class="btn btn-outline"
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
                        d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                    />
                </svg>

                Cooking Time
            </label>
            <ul
                tabindex="0"
                class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52"
            >
                <li><a href="#">Under 30 mins</a></li>
                <li><a href="#">30-60 mins</a></li>
                <li><a href="#">Over 1 hour</a></li>
            </ul>
        </div>
    </div>

    <!-- Recipes Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <!-- Recipe Card -->
        <div class="card w-full bg-base-100 shadow-xl">
            <figure>
                <img
                    src="https://via.placeholder.com/300"
                    alt="Recipe Image"
                    class="h-40 w-full object-cover"
                >
            </figure>
            <div class="card-body">
                <h2 class="card-title">Recipe Name</h2>
                <p class="text-gray-500 text-sm">Short description of the recipe.</p>
                <div class="card-actions justify-between mt-2">
                    <span class="badge badge-outline">30 mins</span>
                    <button class="btn btn-sm btn-primary">View</button>
                </div>
            </div>
        </div>

        <!-- Duplicate the above card for more recipes -->
        <div class="card w-full bg-base-100 shadow-xl">
            <figure>
                <img
                    src="https://via.placeholder.com/300"
                    alt="Recipe Image"
                    class="h-40 w-full object-cover"
                >
            </figure>
            <div class="card-body">
                <h2 class="card-title">Recipe Name</h2>
                <p class="text-gray-500 text-sm">Short description of the recipe.</p>
                <div class="card-actions justify-between mt-2">
                    <span class="badge badge-outline">45 mins</span>
                    <button class="btn btn-sm btn-primary">View</button>
                </div>
            </div>
        </div>

        <!-- Repeat recipe cards dynamically from backend -->
    </div>

    <!-- No Recipes Message -->
    <div
        class="text-center text-gray-500 mt-8"
        id="no-recipes"
    >
        <p>No recipes found. Try adjusting your filters or create a new recipe.</p>
    </div>
</div>
