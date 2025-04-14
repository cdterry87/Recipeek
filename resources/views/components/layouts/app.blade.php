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

    <title>@yield('page-title', config('app.name', 'Recipeek') . ' - ' . config('app.tagline', 'Take a Peek, Then Eat!'))</title>
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
    class="font-[Jost] antialiased"
    style="visibility: hidden;"
>
    <div class="drawer">
        <input
            id="drawer"
            type="checkbox"
            class="drawer-toggle"
        />
        <div class="drawer-content">
            <header class="max-w-6xl mx-auto px-6">
                <nav class="px-0 navbar bg-base-100">
                    <div class="flex-1">
                        <a
                            href="{{ route('home') }}"
                            class="text-3xl md:text-4xl font-bold text-black hover:text-rose-600 transition duration-300 ease-in-out font-[Arizonia]"
                        >
                            Recipeek
                        </a>
                    </div>
                    <div>
                        <label
                            for="drawer"
                            class="btn btn-ghost btn-circle md:hidden"
                        >
                            <x-icons.menu />
                        </label>
                    </div>
                    <div class="hidden md:flex items-center gap-2">
                        <a
                            href="{{ route('about') }}"
                            class="btn btn-sm btn-link text-xs font-semibold text-gray-800 hover:text-rose-600 transition ease-in-out duration-300"
                        >
                            About
                        </a>
                        <a
                            href="{{ route('discover-recipes') }}"
                            class="btn btn-sm btn-link text-xs font-semibold text-gray-800 hover:text-rose-600 transition ease-in-out duration-300"
                        >
                            Discover
                        </a>
                        @if (auth()->check())
                            <div
                                class="dropdown dropdown-end"
                                title="Navigation Menu"
                                aria-label="Navigation Menu"
                            >
                                @if (auth()->user()->avatar)
                                    <x-avatar
                                        :image="asset(auth()->user()->avatar)"
                                        :alt="auth()->user()->name . 'Profile Picture'"
                                        :title="auth()->user()->name . 'Profile Picture'"
                                        sm
                                    />
                                @else
                                    <x-initials
                                        :initials="auth()->user()->getInitials()"
                                        sm
                                    />
                                @endif
                                <ul
                                    tabindex="0"
                                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 text-lg shadow"
                                >
                                    <li>
                                        <a
                                            href="{{ route('user-profile') }}"
                                            class="flex items-center gap-1 hover:brightness-80 transition ease-in-out duration-200"
                                        >
                                            <x-icons.user-profile />
                                            <span>
                                                My Profile
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('my-recipes') }}"
                                            class="flex items-center gap-1 hover:brightness-80 transition ease-in-out duration-200"
                                        >
                                            <x-icons.my-recipes />
                                            <span>
                                                My Recipes
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('saved-recipes') }}"
                                            class="flex items-center gap-1 hover:brightness-80 transition ease-in-out duration-200"
                                        >
                                            <x-icons.saved-recipes />
                                            <span>
                                                Saved Recipes
                                            </span>
                                        </a>
                                    </li>
                                    <li></li>
                                    <li>
                                        <a
                                            href="{{ route('following') }}"
                                            class="flex items-center gap-1 hover:brightness-80 transition ease-in-out duration-200"
                                        >
                                            <x-icons.following />
                                            <span>
                                                Following
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="{{ route('friends') }}"
                                            class="flex items-center gap-1 hover:brightness-80 transition ease-in-out duration-200"
                                        >
                                            <x-icons.friends />
                                            <span>
                                                Friends
                                            </span>
                                        </a>
                                    </li>
                                    <li></li>
                                    <li>
                                        <form
                                            method="POST"
                                            action="{{ route('logout') }}"
                                            class="inline"
                                        >
                                            @csrf

                                            <button
                                                type="submit"
                                                class="text-error flex items-center gap-1 cursor-pointer hover:brightness-80 transition ease-in-out duration-200"
                                            >
                                                <x-icons.logout />
                                                <span>
                                                    {{ __('Log Out') }}
                                                </span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="btn btn-sm btn-primary btn-ghost font-semibold rounded-none"
                            >
                                Login / Sign Up
                            </a>
                        @endif
                    </div>
                </nav>
            </header>

            <main>
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="bg-slate-950 text-white px-6 py-8">
                <div class="max-w-6xl mx-auto p-6 text-center">
                    <div
                        class="flex flex-col lg:flex-row items-center justify-between gap-4 lg:gap-8 text-center lg:text-left">
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
                            href="{{ auth()->check() ? route('my-recipes') : route('login') }}"
                        >
                            @if (auth()->check())
                                <h3 class="text-lg font-semibold mb-2">Contribute</h3>
                                <p class="text-sm text-gray-400">
                                    Create your own recipes and share them with the world!
                                </p>
                            @else
                                <h3 class="text-lg font-semibold mb-2">Join</h3>
                                <p class="text-sm text-gray-400">
                                    Join our community and start contributing your own recipes!
                                </p>
                            @endif
                        </a>

                    </div>
                    <hr class="w-full mx-auto border-2 border-slate-900 my-8">
                    <div class="flex flex-col md:flex-row justify-between gap-6 text-xs">
                        <div class="flex items-center justify-center gap-3 md:gap-6">
                            <x-link
                                href="{{ route('cookie-policy') }}"
                                tertiary
                            >Cookie Policy</x-link>
                            <x-link
                                href="{{ route('privacy-policy') }}"
                                tertiary
                            >Privacy Policy</x-link>
                            <x-link
                                href="{{ route('terms-of-use') }}"
                                tertiary
                            >Terms of Use</x-link>
                        </div>
                        <span>
                            Copyright &copy; 2025 {{ config('app.name') }}.
                        </span>
                    </div>
                </div>
            </footer>
        </div>
        <div class="drawer-side z-40">
            <label
                for="drawer"
                aria-label="close sidebar"
                class="drawer-overlay"
            ></label>
            <div
                class="flex flex-col gap-6 justify-between menu bg-base-200 text-base-content min-h-full w-80 p-4 text-xs">
                <div class="flex flex-col gap-6">
                    <div class="flex items-center justify-between gap-6">
                        <a
                            href="{{ route('home') }}"
                            class="text-4xl md:text-5xl font-bold text-primary hover:brightness-80 transition duration-200 ease-in-out font-[Arizonia] py-3"
                        >
                            Recipeek
                        </a>

                        @if (auth()->check() && auth()->user()->avatar)
                            <a
                                href="{{ route('user-profile') }}"
                                title="Edit Profile"
                                class="hover:brightness-120 hover:scale-105 transition duration-200 ease-in-out"
                            >
                                <img
                                    src="{{ asset(auth()->user()->avatar) }}"
                                    class="h-12 w-12 rounded-full object-cover shadow-md border-2 border-rose-600"
                                    alt="Profile Picture"
                                >
                            </a>
                        @endif
                    </div>
                    <ul class="flex flex-col gap-2 ">
                        <li>
                            <a
                                href="{{ route('about') }}"
                                class="flex items-center gap-1 hover:brightness-80 transition ease-in-out duration-200"
                            >
                                <x-icons.about />
                                <span>
                                    About
                                </span>
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('discover-recipes') }}"
                                class="flex items-center gap-1 hover:brightness-80 transition ease-in-out duration-200"
                            >
                                <x-icons.discover />
                                <span>
                                    Discover
                                </span>
                            </a>
                        </li>
                        <li></li>
                        @if (auth()->check())
                            <li>
                                <a
                                    href="{{ route('user-profile') }}"
                                    class="flex items-center gap-1 hover:brightness-80 transition ease-in-out duration-200"
                                >
                                    <x-icons.user-profile />
                                    <span>
                                        My Profile
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('my-recipes') }}"
                                    class="flex items-center gap-1 hover:brightness-80 transition ease-in-out duration-200"
                                >
                                    <x-icons.my-recipes />
                                    <span>
                                        My Recipes
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('saved-recipes') }}"
                                    class="flex items-center gap-1 hover:brightness-80 transition ease-in-out duration-200"
                                >
                                    <x-icons.saved-recipes />
                                    <span>
                                        Saved Recipes
                                    </span>
                                </a>
                            </li>
                            <li></li>
                            <li>
                                <a
                                    href="{{ route('following') }}"
                                    class="flex items-center gap-1 hover:brightness-80 transition ease-in-out duration-200"
                                >
                                    <x-icons.following />
                                    <span>
                                        Following
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a
                                    href="{{ route('friends') }}"
                                    class="flex items-center gap-1 hover:brightness-80 transition ease-in-out duration-200"
                                >
                                    <x-icons.friends />
                                    <span>
                                        Friends
                                    </span>
                                </a>
                            </li>
                            <li></li>
                            <li>
                                <form
                                    method="POST"
                                    action="{{ route('logout') }}"
                                    class="inline"
                                >
                                    @csrf

                                    <button
                                        type="submit"
                                        class="text-rose-600 flex items-center gap-1 cursor-pointer hover:brightness-80 transition ease-in-out duration-200"
                                    >
                                        <x-icons.logout />
                                        <span>
                                            {{ __('Log Out') }}
                                        </span>
                                    </button>
                                </form>
                            </li>
                        @else
                            <li>
                                <a
                                    href="{{ route('login') }}"
                                    class="flex items-center gap-1 hover:brightness-80 transition ease-in-out duration-200"
                                >
                                    <x-icons.login />
                                    <span>
                                        Login / Sign Up
                                    </span>
                                </a>
                            </li>
                        @endif
                        <li></li>
                    </ul>
                </div>

                <div class="flex items-center justify-center">
                    <a
                        href="{{ route('home') }}"
                        class="flex items-center justify-center"
                        title="{{ config('app.name') }}"
                    >
                        <img
                            src="{{ asset('images/icon-black.png') }}"
                            alt="{{ config('app.name') }} Logo"
                            class="mx-auto w-20 hover:scale-105 transition-all duration-300"
                        >
                    </a>
                </div>
            </div>
        </div>

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
