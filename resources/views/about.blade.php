<x-layouts.app>
    <div class="max-w-4xl mx-auto p-6 mt-6 mb-16 flex flex-col md:flex-row gap-16">
        <div class="md:w-1/2 flex flex-col justify-center gap-4 text-center md:text-left">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">About Recipeek</h1>
            <p class="text-gray-700 leading-9 font-[Jost]">
                Recipeek is a vibrant community website where food enthusiasts from
                all over the world come together to share, discover, and celebrate recipes. Whether you're a home cook
                or a professional chef, Recipeek provides a space to exchange ideas, explore new flavors, and create
                culinary masterpieces.
            </p>
        </div>
        <div class="md:w-1/2">
            <svg
                width="0"
                height="0"
            >
                <defs>
                    <clipPath
                        id="aboutBlobClip"
                        clipPathUnits="objectBoundingBox"
                    >
                        <path
                            d="M0.9,0.3C0.8,0.1,0.7,0,0.55,0.05C0.4,0.1,0.35,0.25,0.25,0.3C0.1,0.35,0,0.45,0.05,0.6C0.1,0.75,0.3,0.9,0.45,0.95C0.6,1,0.75,0.95,0.85,0.85C0.95,0.75,1,0.6,0.95,0.45C0.9,0.35,1,0.4,0.9,0.3"
                        />
                    </clipPath>
                </defs>
            </svg>
            <div class="flex items-center justify-center relative">
                <img
                    src="{{ asset('images/about.jpg') }}"
                    alt="About Recipeek"
                    class="about-blob-mask rounded-full"
                >
            </div>
        </div>
    </div>

    <div class="bg-rose-50 text-rose-900 text-center px-6 py-16">
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
            <hr class="w-full sm:w-1/2 mx-auto border-2 border-rose-500 my-2">
        </div>
    </div>


    <div class="max-w-4xl mx-auto p-6 my-16">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Contact Us!</h2>
        <p class="text-xl text-gray-700 mb-4 italic text-center">
            Having issues with the site? Want more info about us? Feel free to reach out!
        </p>
        <div class="flex flex-col md:flex-row items-center gap-6 mt-16">
            <div class="w-full text-center">
                <h3 class="text-lg font-semibold text-gray-800">By Email</h3>
                <p class="text-gray-700">
                    <a href="#">support@recipeek.com</a>
                </p>
            </div>
            <div class="w-full text-center">
                <h3 class="text-lg font-semibold text-gray-800">By Phone</h3>
                <p class="text-gray-700">
                    <a href="#">+1 (555) 123-4567</a>
                </p>
            </div>
            <div class="w-full text-center">
                <h3 class="text-lg font-semibold text-gray-800">By Social</h3>
                <p class="text-gray-700">
                    <a href="#">Facebook</a>
                    <a href="#">X</a>
                    <a href="#">TikTok</a>
                </p>
            </div>
        </div>
    </div>
</x-layouts.app>
