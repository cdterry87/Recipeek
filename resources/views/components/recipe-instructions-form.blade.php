<form
    class="flex flex-col gap-2"
    wire:submit.prevent="saveInstruction"
>
    @if (session('recipe-instructions-message'))
        <x-alert
            success
            class="mb-2"
        >
            {{ session('recipe-instructions-message') }}
        </x-alert>
    @endif

    <x-textarea
        label="Instruction"
        id="instruction"
        name="instruction"
        placeholder="Type your instruction here"
        wire:model="instruction"
        block
        required
    ></x-textarea>

    <x-input-text
        label="Order"
        id="order"
        name="order"
        wire:model="order"
        required
        block
        type="number"
    />

    <div>
        <x-button
            primary
            block
            class="mt-4"
        >
            Save Instruction
        </x-button>
    </div>
</form>
