<div
    x-data="{ isFormSubmitted: @entangle('isFormSubmitted') }"
    class="max-w-6xl mx-auto p-6"
>
    @if (session('error'))
        <x-alert
            error
            class="mb-2"
        >
            {{ session('error') }}
        </x-alert>
    @endif

    <form
        x-show="!isFormSubmitted"
        wire:submit.prevent="submit"
        class="flex flex-col gap-2"
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
        <x-textarea
            label="Message"
            id="message"
            name="message"
            placeholder="Type your message"
            wire:model="message"
            maxlength="2000"
            block
            required
        ></x-textarea>
        <x-button
            primary
            block
            class="mt-4"
        >
            Submit Message
        </x-button>
    </form>

    <div
        x-show="isFormSubmitted"
        x-transition:enter="transition-opacity duration-500"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        class="text-lg md:text-2xl font-bold text-center text-rose-800 font-[Jost] flex flex-col gap-3"
    >
        <p>Thank you for contacting us!</p>
        <p class="text-sm md:text-base">
            We will get back to you as soon as possible.
        </p>
    </div>
</div>
