<x-layouts.app>
    <section class="relative w-full h-[85vh] overflow-hidden">
        <div class="bg-gray-800 absolute inset-0 w-full h-full bg-cover bg-center error-404-bg pan-animation z-10"></div>
        <div
            class="absolute inset-0 bg-black/50 z-20 flex justify-center items-center text-black text-center font-[Jost]">
            <div class="card py-4">
                <div
                    class="card-body bg-white/90 md:w-2/3 lg:w-1/2 mx-auto flex flex-col justify-center gap-4 text-center ">
                    <div class="flex justify-center">
                        <x-icons.error-404 />
                    </div>

                    <h1 class="text-3xl font-bold mb-4">Page Not Found</h1>
                    <p class="text-sm md:text-base leading-8">
                        Sorry, the page you are looking for could not be found. Please check the URL in the address bar
                        and try again or go back to our home page.
                    </p>
                    <div>
                        <a
                            href="{{ route('home') }}"
                            class="btn btn-primary"
                        >
                            Go Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>
