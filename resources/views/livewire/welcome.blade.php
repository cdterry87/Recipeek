<div>
    <section class="relative w-full h-[85vh] overflow-hidden">
        <video
            autoplay
            loop
            muted
            id="background-video"
            class="absolute inset-0 w-full h-full object-cover z-10"
        >
            <source
                src="{{ asset('videos/video.mp4') }}"
                type="video/mp4"
            >
            Your browser does not support the video tag.
        </video>
        <div class="absolute inset-0 bg-black/50 z-20 flex justify-center items-center text-white text-center">
            <form
                class="flex flex-col justify-center items-center"
                wire:submit.prevent="discover"
            >
                <h1 class="text-4xl md:text-6xl font-bold select-none">Discover Amazing Recipes</h1>
                <p class="my-8 text-lg select-none">Explore the best dishes created by people like you.</p>
                <input
                    type="text"
                    name="search"
                    id="search"
                    wire:model="search"
                    minlength="3"
                    placeholder="Search for something delicious!"
                    class="px-4 py-3 rounded-full text-black bg-white w-4/5 md:w-2/3"
                >
                <button class="mt-6 bg-rose-500 px-6 py-3 rounded-full text-lg hover:bg-rose-600 cursor-pointer">
                    Start Searching!
                </button>
            </form>
        </div>
    </section>

    <div class="flex flex-col gap-16 mt-16">
        <section class="container mx-auto px-6 lg:px-16 flex flex-col gap-6">
            <h2 class="text-xl md:text-3xl text-center font-bold mb-2 text-gray-800 font-[Jost] uppercase">
                So, How Does
                <span class="font-[Arizonia] text-primary normal-case text-4xl md:text-6xl mx-1 select-none">
                    {{ config('app.name') }}
                </span>
                Work?
            </h2>
            <p class="text-center text-gray-600 font-[Jost] w-full md:w-2/3 mx-auto leading-7">
                It's simple! Create your own recipes or find recipes created by other people in the community. Save
                recipes to your recipe book, share with friends, and once you've tried a recipe make sure to rate it so
                others can see how delicious it is! Oh, and did we mention it's completely free to use with no annoying
                ads?! Now that's tasty!
            </p>
        </section>

        <section class="container mx-auto px-6 lg:px-16">
            <h2 class="text-xl md:text-3xl text-center font-bold mb-2 text-gray-800 font-[Jost] uppercase">
                Trending Recipes
            </h2>
            <p class="text-center text-gray-600 font-[Jost]">
                Discover the most popular recipes created and rated by our community.
            </p>
            <hr class="w-full md:w-1/2 mx-auto border-2 border-rose-500 my-6">
            @if ($recipes && $recipes->isNotEmpty())
                <x-recipe-grid :recipes="$recipes" />
            @else
                <div class="font-[Jost] text-xl text-center text-gray-600 flex items-center justify-center h-32">
                    No recipes are trending at this time, but check back often for new delicious recipes!
                </div>
            @endif
        </section>

        <section class="bg-rose-50 h-80 flex items-center justify-center blob-scatter mt-8">
            <div class="container mx-auto py-12 px-6">
                <h2 class="text-xl md:text-3xl text-center font-bold mb-2 text-gray-800 font-[Jost] uppercase">
                    Subscribe to Our Newsletter
                </h2>
                <p class="text-center text-gray-600 mb-6 font-[Jost]">
                    Get the latest recipes, cooking tips, and exclusive offers delivered straight to your inbox.
                </p>
                <div
                    x-data="{ isFormSubmitted: @entangle('isFormSubmitted') }"
                    class="mt-8"
                >
                    <form
                        x-show="!isFormSubmitted"
                        method="POST"
                        class="flex flex-col gap-3"
                        wire:submit.prevent="subscribe"
                    >
                        @error('email')
                            <div class="text-rose-800 text-sm font-bold text-center">{{ $message }}</div>
                        @enderror
                        <div class="flex flex-col gap-4 md:flex-row md:gap-0 justify-center">
                            <input
                                type="email"
                                placeholder="Enter your email"
                                class="border border-rose-200 px-4 py-2 pr-32 rounded-full text-black w-full md:w-1/2 bg-white"
                                required
                                pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                                wire:model="email"
                            >
                            <button
                                type="submit"
                                class="bg-rose-500 text-white px-6 py-1 rounded-full md:rounded-none md:rounded-r-full text-lg hover:bg-rose-600 md:-ml-30 cursor-pointer"
                            >
                                Subscribe
                            </button>
                        </div>
                    </form>
                    <div
                        x-show="isFormSubmitted"
                        x-transition:enter="transition-opacity duration-500"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        class="text-lg md:text-2xl font-bold text-center text-rose-800 font-[Jost]"
                    >
                        Thank you for subscribing!
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
