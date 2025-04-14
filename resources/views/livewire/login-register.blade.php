<div class="h-screen flex flex-col lg:flex-row">
    <div class="w-full lg:w-2/5">
        <img
            src="{{ asset('images/login-register.jpg') }}"
            alt="Delicious Food"
            class="h-42 lg:h-full w-full object-cover"
        >
    </div>
    <div
        class="w-full lg:w-3/5 flex items-center justify-center bg-white"
        x-data="{ showRegister: false }"
    >
        <div class="w-full max-w-md p-6">
            <div class="text-center mb-6">
                <a
                    href="{{ route('home') }}"
                    class="text-5xl text-center font-bold text-primary font-[Arizonia] py-2"
                >
                    Recipeek
                </a>
            </div>
            <div
                x-show="!showRegister"
                x-transition:enter="transition-opacity duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
            >
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">Welcome To Our Kitchen!</h2>
                <p class="text-gray-600 text-center mb-6">Login to continue</p>
                <div class="flex flex-col gap-2">
                    @if (session('login-error'))
                        <x-alert error>
                            {{ session('login-error') }}
                        </x-alert>
                    @endif
                    <form
                        class="flex flex-col gap-2"
                        wire:submit.prevent="login"
                    >
                        <x-input-text
                            label="Email"
                            id="email"
                            name="email"
                            type="email"
                            placeholder="Enter your email address"
                            wire:model="email"
                            required
                            block
                        />
                        <x-input-text
                            label="Password"
                            id="password"
                            name="password"
                            type="password"
                            placeholder="Enter your password"
                            wire:model="password"
                            required
                            block
                        />
                        <x-button
                            primary
                            block
                            class="mt-4"
                        >
                            Login
                        </x-button>
                        <hr class="w-full md:w-1/2 mx-auto border-2 border-black my-6">
                        <a
                            href="{{ route('google.redirect') }}"
                            class="btn btn-block bg-white hover:brightness-90 transition ease-in-out duration-200 text-black border-[#e5e5e5]"
                        >
                            <x-icons.google />
                            Continue with Google
                        </a>
                        <p class="text-sm text-center text-gray-600 mt-8">New here?
                            <a
                                href="#"
                                class="text-primary font-medium hover:underline"
                                @click.prevent="showRegister = true"
                            >Join Our Community!</a>
                        </p>
                    </form>
                </div>
            </div>
            <div
                x-show="showRegister"
                x-transition:enter="transition-opacity duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
            >
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">Join Our Community!</h2>
                <p class="text-gray-600 text-center mb-6">Create an account to get started</p>

                <form
                    class="flex flex-col gap-2"
                    wire:submit.prevent="register"
                >
                    <x-input-text
                        label="Name"
                        id="name"
                        name="name"
                        placeholder="Enter your name"
                        wire:model="name"
                        required
                        block
                    />
                    <x-input-text
                        label="Email"
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Enter your email address"
                        wire:model="email"
                        required
                        block
                    />
                    <x-input-text
                        label="Password"
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Enter your password"
                        wire:model="password"
                        required
                        block
                    />
                    <x-input-text
                        label="Confirm Password"
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Confirm your password"
                        wire:model="password_confirmation"
                        required
                        block
                    />
                    <x-button
                        primary
                        block
                        class="mt-4"
                    >
                        Register
                    </x-button>
                    <p class="text-sm text-center text-gray-600 mt-8">Already have an account?
                        <a
                            href="#"
                            class="text-primary font-medium hover:underline"
                            @click.prevent="showRegister = false"
                        >Return to Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
