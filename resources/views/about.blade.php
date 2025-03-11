<x-layouts.app>
    <section class="relative w-full h-[85vh] overflow-hidden">
        <div class="bg-gray-800 absolute inset-0 w-full h-full bg-cover bg-center animated-about-bg z-10"></div>
        <div
            class="absolute inset-0 bg-black/50 z-20 flex justify-center items-center text-black text-center font-[Jost]">
            <div class="bg-rose-100/85 shadow-2xl border-y-5 border-rose-600 w-full py-4">
                <div class="card-body md:w-2/3 lg:w-1/2 mx-auto flex flex-col justify-center gap-4 text-center ">
                    <h1 class="text-3xl font-bold mb-4">About Us</h1>
                    <p class="italic font-semibold text-sm md:text-base leading-8">
                        Recipeek is a vibrant community website where food enthusiasts from
                        all over the world come together to share, discover, and celebrate recipes. Whether you're a
                        home cook or a professional chef, Recipeek provides a space to exchange ideas, explore new
                        flavors, and create culinary masterpieces.
                    </p>
                </div>
            </div>

        </div>
    </section>

    <div class="max-w-4xl mx-auto p-6 my-16">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Contact Us!</h2>
        <p class="text-gray-700 mb-4 italic text-center">
            Having issues with the site? Want more info about us? Feel free to reach out!
        </p>

        <livewire:contact-form />
    </div>

    <div class="bg-rose-50 text-rose-900 text-center px-6 py-16 circle-scatter">
        <div class="relative max-w-3xl mx-auto">
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 text-6xl text-rose-200 opacity-50">
                &#10077;
            </div>
            <div
                class="px-10 py-12 opacity-90 leading-relaxed tracking-wide
                       text-2xl md:text-3xl font-[Dancing_Script] italic font-semibold transition-opacity duration-700">
                <p>
                    Our mission is to connect people through the joy of cooking by sharing diverse recipes, tips, and
                    food stories in a supportive, inspiring environment where everyone can contribute their knowledge
                    and passion.
                </p>
            </div>
            <hr class="w-full sm:w-1/2 mx-auto border-2 border-rose-200 opacity-50 my-2">
        </div>
    </div>
</x-layouts.app>
