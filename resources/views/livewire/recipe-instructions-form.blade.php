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
        <ol class="list-decimal space-y-3">
            @foreach ($instructions as $instruction)
                <li class="flex items-center justify-between gap-4">
                    <span>
                        {{ $instruction->instruction }}
                    </span>
                    <button
                        wire:click.prevent="removeInstruction({{ $instruction->id }})"
                        class="btn btn-ghost btn-circle text-error hover:brightness-120 cursor-pointer"
                        title="Remove Ingredient"
                        alt="Remove Ingredient"
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
                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                            />
                        </svg>
                    </button>
                </li>
            @endforeach
        </ol>
    @endif
</div>
