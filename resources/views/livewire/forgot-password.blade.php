<div class="max-w-4xl mx-auto p-6 my-8 flex flex-col gap-16">
    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-8 min-h-[50vh]">
        <div class="w-full mb-6 flex flex-col gap-4">
            <h2 class="font-bold text-3xl font-[Jost]">
                Forgot Your Password?
            </h2>
            <p class="text-sm italic">
                If you forgot your password, type your email address in the following form and we will send you a link
                to reset your password.
            </p>
        </div>

        <form
            class="flex flex-col gap-2"
            wire:submit.prevent="submit"
        >
            @if (session('forgot-password-message'))
                <x-alert
                    success
                    class="mb-2"
                >
                    {{ session('forgot-password-message') }}
                </x-alert>
            @endif

            <x-input-text
                label="Email"
                id="email"
                name="email"
                type="email"
                placeholder="Type your email address"
                wire:model="email"
                required
                block
            />

            <div>
                <x-button
                    primary
                    block
                    class="mt-4"
                >
                    Submit
                </x-button>
            </div>
        </form>
    </div>
</div>
