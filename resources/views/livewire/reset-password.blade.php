<div class="max-w-4xl mx-auto p-6 my-8 flex flex-col gap-16">
    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-8 min-h-[50vh]">
        <div class="w-full mb-6 flex flex-col gap-4">
            <h2 class="font-bold text-3xl font-[Jost]">
                Reset Your Password
            </h2>
            <p class="text-sm italic">
                Type a new password and confirm your password in the following form to successfully reset your password.
            </p>
        </div>

        <form
            class="flex flex-col gap-2"
            wire:submit.prevent="submit"
        >
            @if (session('reset-password-message'))
                <x-alert
                    success
                    class="mb-2"
                >
                    {{ session('reset-password-message') }}
                </x-alert>
            @endif

            <x-input-text
                label="Password"
                id="password"
                name="password"
                type="password"
                placeholder="Type a new password"
                wire:model="password"
                required
                block
            />

            <x-input-text
                label="Confirm Password"
                id="password_confirmation"
                name="password_confirmation"
                type="password"
                placeholder="Confirm your new password"
                wire:model="password_confirmation"
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
