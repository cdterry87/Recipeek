<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>{{ config('app.name', 'Laravel') }} - {{ config('app.tagline') }}</title>

    <!-- Fonts -->
    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >
    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >
    <link
        href="https://fonts.googleapis.com/css2?family=Figtree&family=Jost&family=Arizonia&display=swap"
        rel="stylesheet"
    >

    <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="/apple-touch-icon.png"
    >
    <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="/favicon-32x32.png"
    >
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="/favicon-16x16.png"
    >
    <link
        rel="manifest"
        href="/site.webmanifest"
    >

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body
    class="font-sans antialiased"
    style="visibility: hidden;"
>
    <header>
        <!-- Navbar -->
        <nav class="bg-black shadow-md px-6 py-1 lg:px-16 flex items-center">
            <div class="container mx-auto flex justify-between items-center">
                <a
                    href="{{ route('home') }}"
                    class="text-5xl font-bold text-white font-[Arizonia] py-3"
                >
                    Recipeek
                </a>

                <div class="space-x-6 hidden md:flex md:items-center">
                    <a
                        href="{{ route('discover-recipes') }}"
                        class="text-white font-bold hover:text-slate-200"
                    >Discover</a>
                    {{-- @todo - login/auth menu --}}
                    <a
                        href="{{ route('login') }}"
                        class="btn btn-primary"
                    >
                        Login
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-slate-950 text-white px-6 py-8 lg:px-16">
        <div class="container mx-auto text-center">
            <div
                class="flex flex-col md:flex-row items-center justify-between gap-4 md:gap-12 text-center md:text-left">
                <a
                    href="{{ route('home') }}"
                    class="flex items-center justify-center"
                    title="{{ config('app.name') }}"
                >
                    <img
                        src="{{ asset('images/icon-white.png') }}"
                        alt="{{ config('app.name') }} Logo"
                        class="mx-auto w-20 hover:scale-105 transition-all duration-300"
                    >
                </a>
                <a
                    class="block px-6 py-2 flex-1 hover:bg-slate-900 rounded-lg transition ease-in-out duration-300"
                    href="{{ route('about') }}"
                >
                    <h3 class="text-lg font-semibold mb-2">About</h3>
                    <p class="text-sm text-gray-400">
                        Share, discover, and enjoy delicious recipes from our community!
                    </p>
                </a>
                <a
                    class="block px-6 py-2 flex-1 hover:bg-slate-900 rounded-lg transition ease-in-out duration-300"
                    href="{{ route('discover-recipes') }}"
                >
                    <h3 class="text-lg font-semibold mb-2">Discover</h3>
                    <p class="text-sm text-gray-400">
                        We make it super simple to find your next favorite dish!
                    </p>
                </a>
                <a
                    class="block px-6 py-2 flex-1 hover:bg-slate-900 rounded-lg transition ease-in-out duration-300"
                    href="{{ route('login') }}"
                >
                    <h3 class="text-lg font-semibold mb-2">Join</h3>
                    <p class="text-sm text-gray-400">
                        Join our community and start contributing your own recipes!
                    </p>
                </a>
            </div>
            <hr class="w-full mx-auto border-2 border-slate-900 my-8">
            <div class="flex flex-col md:flex-row justify-between gap-6 text-xs">
                <div class="flex items-center justify-center gap-3 md:gap-6">
                    <x-link
                        href="{{ route('cookie-policy') }}"
                        secondary
                    >Cookie Policy</x-link>
                    <x-link
                        href="{{ route('privacy-policy') }}"
                        secondary
                    >Privacy Policy</x-link>
                    <x-link
                        href="{{ route('terms-of-use') }}"
                        secondary
                    >Terms of Use</x-link>
                </div>
                <span>
                    Copyright &copy; 2025 {{ config('app.name') }}.
                </span>
            </div>
        </div>
    </footer>

    @livewireScripts

    {{-- Prevent flash of unstyled content (FOUC) --}}
    <script>
        let domReady = (cb) => {
            document.readyState === 'interactive' || document.readyState === 'complete' ?
                cb() :
                document.addEventListener('DOMContentLoaded', cb);
        };
        domReady(() => {
            document.body.style.visibility = 'visible';
        });
    </script>
</body>

</html>
