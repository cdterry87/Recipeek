<div class="h-screen flex flex-col lg:flex-row">
    <div class="w-full lg:w-2/5">
        <img
            src="{{ asset('images/login-register.jpg') }}"
            alt="Delicious Food"
            class="h-42 lg:h-full w-full object-cover"
        >
    </div>

    <!-- Right Side (Login / Register) -->
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

            <!-- Login Form -->
            <div
                x-show="!showRegister"
                x-transition:enter="transition-opacity duration-500"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
            >
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">Welcome To Our Kitchen!</h2>
                <p class="text-gray-600 text-center mb-6">Login to continue</p>

                @if (session('login-error'))
                    <x-alert
                        error
                        class="mb-2"
                    >
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
                    <button
                        class="btn btn-block bg-white hover:brightness-90 transition ease-in-out duration-200 text-black border-[#e5e5e5]"
                    >
                        <svg
                            aria-label="Google logo"
                            width="16"
                            height="16"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"
                        >
                            <g>
                                <path
                                    d="m0 0H512V512H0"
                                    fill="#fff"
                                ></path>
                                <path
                                    fill="#34a853"
                                    d="M153 292c30 82 118 95 171 60h62v48A192 192 0 0190 341"
                                ></path>
                                <path
                                    fill="#4285f4"
                                    d="m386 400a140 175 0 0053-179H260v74h102q-7 37-38 57"
                                ></path>
                                <path
                                    fill="#fbbc02"
                                    d="m90 341a208 200 0 010-171l63 49q-12 37 0 73"
                                ></path>
                                <path
                                    fill="#ea4335"
                                    d="m153 219c22-69 116-109 179-50l55-54c-78-75-230-72-297 55"
                                ></path>
                            </g>
                        </svg>
                        Continue with Google
                    </button>
                    <p class="text-sm text-center text-gray-600 mt-8">New here?
                        <a
                            href="#"
                            class="text-primary font-medium hover:underline"
                            @click.prevent="showRegister = true"
                        >Join Our Community!</a>
                    </p>
                </form>
            </div>

            <!-- Registration Form -->
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
