<x-layouts.app>
    <div class="max-w-4xl mx-auto p-6 my-16 flex flex-col md:flex-row gap-16 md:gap-8">
        <div class="md:w-3/5 flex flex-col gap-4">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">About Recipeek</h1>
            <p class="text-gray-700 leading-7">Recipeek is a vibrant community website where food enthusiasts from
                all over
                the world come together to share, discover, and celebrate recipes. Whether you're a home cook or a
                professional chef, Recipeek provides a space to exchange ideas, explore new flavors, and create culinary
                masterpieces.
            </p>
            <p class="text-gray-700 leading-7">Our mission is to connect people through the joy of cooking by offering a
                diverse
                collection of recipes, tips, and food stories. We believe in fostering a supportive and inspiring
                environment where everyone can contribute their knowledge and passion for food.
            </p>
            <p class="text-gray-700 leading-7">
                At Recipeek, we value creativity, collaboration, and the love of cooking. Our platform is designed to be
                user-friendly and accessible, making it easy for anyone to share their favorite recipes or find new ones
                to try. We encourage our users to engage with each other, share their experiences, and provide feedback
                on recipes. This way, we can all learn and grow together as a community of food lovers.
            </p>
        </div>
        <div class="md:w-2/5">
            <svg>
                <defs>
                    <clipPath
                        id="aboutBlobClip"
                        clipPathUnits="objectBoundingBox"
                    >
                        <path
                            d="M0.85,0.3C0.8,0.15,0.65,0.05,0.5,0S0.25,0.05,0.15,0.2C0.05,0.35,0,0.55,0.1,0.7S0.3,1,0.5,1s0.45,-0.1,0.55,-0.25S0.9,0.45,0.85,0.3"
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

    <div class="max-w-4xl mx-auto p-6 mb-16">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Contact Information</h2>
        <p class="text-xl text-gray-700 mb-4 italic text-center">
            Having issues with the site? Want more info about us? Feel free to reach out!
        </p>
        <hr class="w-full md:w-1/2 mx-auto border-2 border-rose-500 my-6">
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
</x-layouts.app>
