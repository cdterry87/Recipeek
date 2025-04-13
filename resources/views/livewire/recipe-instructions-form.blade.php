<div class="w-full flex flex-col gap-6">
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

    <hr>

    <h3 class="font-bold text-lg">Instructions</h3>

    @if ($instructions->isEmpty())
        <p class="text-sm italic text-gray-500">
            No instructions added yet.
        </p>
    @else
        <ol class="space-y-3">
            @foreach ($instructions as $instruction)
                <li class="flex items-start justify-between gap-4">
                    <span>
                        <strong class="uppercase underline select-none">Step {{ $loop->index + 1 }}.</strong>
                        {{ $instruction->instruction }}
                    </span>
                    <button
                        wire:click.prevent="removeInstruction({{ $instruction->id }})"
                        class="btn btn-ghost btn-circle text-error hover:brightness-120 cursor-pointer"
                        title="Remove Ingredient"
                        alt="Remove Ingredient"
                    >
                        <x-icons.delete />
                    </button>
                </li>
            @endforeach
        </ol>
    @endif
</div>
