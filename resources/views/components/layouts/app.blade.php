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
        href="https://fonts.googleapis.com/css2?family=Figtree&family=Jost&family=Arizonia&family=Dancing+Script&display=swap"
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
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="2"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 6h16M4 12h16m-7 6h7"
                                />
                            </svg>
                        </label>
                    </div>
                    <div class="hidden md:flex items-center gap-4">
                        <a
                            href="{{ route('discover-recipes') }}"
                            class="text-sm font-semibold text-black hover:text-rose-600 transition ease-in-out duration-300"
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
                                    <img
                                        tabindex="0"
                                        role="button"
                                        src="{{ asset(auth()->user()->avatar) }}"
                                        class="cursor-pointer h-12 w-12 rounded-full object-cover shadow-md border-2 border-rose-600 hover:brightness-120 transition duration-200 ease-in-out"
                                        alt="Profile Picture"
                                    >
                                @else
                                    <div
                                        tabindex="0"
                                        role="button"
                                        class="select-none cursor-pointer bg-slate-800 text-white font-bold rounded-full h-12 w-12 flex items-center justify-center hover:bg-rose-600 transition duration-300 ease-in-out"
                                    >
                                        {{ auth()->user()->getInitials() }}
                                    </div>
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
                                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                                />
                                            </svg>
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
                                                    d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"
                                                />
                                            </svg>

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
                                                    d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9"
                                                />
                                            </svg>
                                            <span>
                                                Saved Recipes
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
                                                        d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"
                                                    />
                                                </svg>
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
                                href="{{ route('discover-recipes') }}"
                                class="flex items-center gap-1 hover:brightness-80 transition ease-in-out duration-200"
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
                                        d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18"
                                    />
                                </svg>
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
                                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                        />
                                    </svg>
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
                                            d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"
                                        />
                                    </svg>

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
                                            d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0 1 20.25 6v12A2.25 2.25 0 0 1 18 20.25H6A2.25 2.25 0 0 1 3.75 18V6A2.25 2.25 0 0 1 6 3.75h1.5m9 0h-9"
                                        />
                                    </svg>

                                    <span>
                                        Saved Recipes
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
                                                d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"
                                            />
                                        </svg>
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
                                            d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"
                                        />
                                    </svg>
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
