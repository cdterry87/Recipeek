<x-layouts.site>
    <!-- Hero Section with Video Background -->
    <section class="relative w-full h-[80vh] overflow-hidden">
        <video
            autoplay
            loop
            muted
            class="absolute inset-0 w-full h-full object-cover"
        >
            <source
                src="{{ asset('videos/video.mp4') }}"
                type="video/mp4"
            >
            Your browser does not support the video tag.
        </video>
        <div
            class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-center items-center text-white text-center">
            <h1 class="text-4xl md:text-6xl font-bold">Discover Amazing Recipes</h1>
            <p class="my-8 text-lg">Explore the best dishes created by people like you.</p>
            <input
                type="text"
                placeholder="Search for something delicious!"
                class="border px-4 py-2 rounded-full text-black w-2/3 md:w-1/3"
            >
            <a
                href="#"
                class="mt-6 bg-rose-500 px-6 py-3 rounded-full text-lg hover:bg-rose-600"
            >
                Discover Recipes
            </a>
        </div>
    </section>

    <section class="container mx-auto py-12 px-4">
        <h2 class="text-3xl text-center font-bold mb-2 text-gray-800 font-jost uppercase">
            So, How Does This Work?
        </h2>
        <p class="text-center text-gray-600 font-jost w-full md:w-1/2 mx-auto leading-7">
            It's simple! You can create your own recipes or find recipes created by other people in the community. Save
            recipes to your recipe book, share with friends, and once you've tried a recipe make sure to rate it so
            others can see how delicious it is!
        </p>
    </section>

    <section class="container mx-auto py-12 px-4">
        <h2 class="text-3xl text-center font-bold mb-2 text-gray-800 font-jost uppercase">Trending Recipes</h2>
        <p class="text-center text-gray-600 font-jost">
            Discover the most popular recipes created and rated by our community.
        </p>
        <hr class="w-full md:w-1/2 mx-auto border-2 border-rose-500 my-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <x-recipe-card
                title="Rice & Eggs"
                image="images/demo1.jpg"
            />
            <x-recipe-card
                title="Salmon Curry"
                image="images/demo2.jpg"
            />
            <x-recipe-card
                title="Chicken & Veggies"
                image="images/demo3.jpg"
            />
            <x-recipe-card
                title="Fancy Ramen"
                image="images/demo4.jpg"
            />
        </div>
    </section>

    <section class="bg-rose-50 h-80 flex items-center justify-center blob-scatter blob-scatter-2">
        <div class="container mx-auto py-12 px-4">
            <h2 class="text-3xl text-center font-bold mb-2 text-gray-800 font-jost uppercase">
                Subscribe to Our Newsletter
            </h2>
            <p class="text-center text-gray-600 mb-6 font-jost">
                Get the latest recipes, cooking tips, and exclusive offers delivered straight to your inbox.
            </p>
            <div
                x-data="{ isSubmitted: false }"
                class="mt-8"
            >
                <form
                    method="POST"
                    x-show="!isSubmitted"
                    class="flex flex-col gap-4 md:flex-row md:gap-0 justify-center"
                >
                    <input
                        type="email"
                        placeholder="Enter your email"
                        class="border px-4 py-2 rounded-full text-black w-full md:w-1/2"
                        required
                        pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                    >
                    <button
                        type="submit"
                        class="bg-rose-500 text-white px-6 py-1 rounded-full md:rounded-none md:rounded-r-full text-lg hover:bg-rose-600 md:-ml-32"
                        @click.prevent="isSubmitted = true"
                    >
                        Subscribe
                    </button>
                </form>
                <div
                    x-show="isSubmitted"
                    x-transition:enter="transition-opacity duration-500"
                    x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100"
                    class="text-2xl font-bold text-center text-rose-800 font-jost"
                >
                    Thank you for subscribing!
                </div>
            </div>

        </div>
    </section>

    {{-- <section class="container mx-auto py-12 px-4">
        <h2 class="text-3xl text-center font-bold mb-2 text-gray-800 font-jost uppercase">What's for Dinner Tonight?
        </h2>
        <p class="text-center text-gray-600 mb-6 font-jost">
            Need inspiration for your next meal? We've got you covered.
        </p>
        <hr class="w-full md:w-1/2 mx-auto border-2 border-rose-500 my-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <x-recipe-card
                title="Rice & Eggs"
                image="images/demo1.jpg"
            />
            <x-recipe-card
                title="Salmon Curry"
                image="images/demo2.jpg"
            />
            <x-recipe-card
                title="Chicken & Veggies"
                image="images/demo3.jpg"
            />
            <x-recipe-card
                title="Fancy Ramen"
                image="images/demo4.jpg"
            />
        </div>
    </section>

    <section class="container mx-auto py-12 px-4">
        <h2 class="text-3xl text-center font-bold mb-2 text-gray-800 font-jost uppercase">Special Diet? No Problem!</h2>
        <p class="text-center text-gray-600 mb-6 font-jost">
            Whether you're vegan, vegetarian, or following a specific diet, we have recipes for you.
        </p>
        <hr class="w-full md:w-1/2 mx-auto border-2 border-rose-500 my-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <x-recipe-card
                title="Rice & Eggs"
                image="images/demo1.jpg"
            />
            <x-recipe-card
                title="Salmon Curry"
                image="images/demo2.jpg"
            />
            <x-recipe-card
                title="Chicken & Veggies"
                image="images/demo3.jpg"
            />
            <x-recipe-card
                title="Fancy Ramen"
                image="images/demo4.jpg"
            />
        </div>
    </section> --}}
</x-layouts.site>
