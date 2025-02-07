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

    <title>{{ config('app.name', 'Laravel') }}</title>

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
        href="https://fonts.googleapis.com/css2?family=Figtree&family=Jost&family=Poiret+One&display=swap"
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

    <!-- Styles -->
    @livewireStyles
</head>


<body
    class="font-sans antialiased"
    style="visibility: hidden;"
>
    <header>
        <!-- Navbar -->
        <nav class="bg-black shadow-md px-4">
            <div class="container mx-auto flex justify-between items-center">
                <a
                    href="{{ route('home') }}"
                    class="text-2xl font-bold text-gray-800"
                >
                    <img
                        src="{{ asset('images/logo-white.png') }}"
                        alt="{{ config('app.name') }} Logo"
                        class="h-16"
                    >
                </a>

                <div class="space-x-6 hidden md:flex">
                    <a
                        href="#"
                        class="text-white font-bold hover:text-slate-200"
                    >Discover</a>
                    @if (auth()->check())
                        {{-- <a
                            href="{{ route('filament.app.pages.dashboard') }}"
                            class="text-white hover:text-slate-200 font-bold"
                        >App</a> --}}
                        <div
                            class="relative"
                            x-data="{ open: false }"
                        >
                            <button
                                @click.prevent="open = !open"
                                class="text-rose-500 hover:text-rose-400 font-semibold focus:outline-none"
                            >
                                {{ ucwords(auth()->user()->name) }}
                                <span class="text-xs">▼</span>
                            </button>
                            <div
                                x-show="open"
                                @click.away="open = false"
                                class="absolute right-0 mt-2 w-48 bg-black text-white border border-gray-900 rounded-md shadow-lg z-10"
                            >
                                <a
                                    href="{{ route('filament.app.auth.profile') }}"
                                    class="block px-4 py-2 hover:bg-gray-900"
                                >Profile</a>
                                <a
                                    href="{{ route('filament.app.pages.dashboard') }}"
                                    class="block px-4 py-2 hover:bg-gray-900"
                                >Dashboard</a>
                                <form
                                    method="POST"
                                    action="{{ route('filament.app.auth.logout') }}"
                                >
                                    @csrf
                                    <button
                                        type="submit"
                                        class="block w-full text-left px-4 py-2 hover:bg-gray-900"
                                    >Sign Out</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a
                            href="{{ route('filament.app.auth.login') }}"
                            class="text-white hover:text-slate-200 font-bold"
                        >Login</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>

    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-black text-white py-8 mt-12">
        <div class="container mx-auto text-center">
            <a
                href="{{ route('home') }}"
                class="block"
                title="{{ config('app.name') }}"
            >
                <img
                    src="{{ asset('images/logo-white-icon.png') }}"
                    alt="{{ config('app.name') }} Logo"
                    class="mx-auto w-52 mb-4 hover:scale-105 transition-all duration-300"
                >
            </a>
            <div class="flex justify-center space-x-6 mb-4 text-sm">
                <a
                    href="#"
                    class="text-gray-400 hover:text-white"
                >Privacy Policy</a>
                <a
                    href="#"
                    class="text-gray-400 hover:text-white"
                >Terms of Use</a>
                <a
                    href="#"
                    class="text-gray-400 hover:text-white"
                >Contact</a>
            </div>
            <p class="mt-6 text-xs">&copy; 2025 {{ config('app.name') }}. All Rights Reserved.</p>
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
