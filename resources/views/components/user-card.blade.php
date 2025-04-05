@props(['user', 'variant' => null, 'imageFull' => false, 'imageSide' => false])

@php
    $classes = array_filter([
        'card',
        'shadow-md',
        'w-full',
        'card-sm',
        'border-3 border-white',
        'hover:border-slate-200',
        'transition ease-in-out duration-300',
        $imageSide ? 'card-side' : null,
        $imageFull ? 'image-full' : null,
    ]);
@endphp

<div {{ $attributes->merge([
    'class' => implode(' ', $classes),
]) }}>
    @if ($user->avatar)
        <figure class="overflow-hidden">
            <img
                src="{{ asset($user->avatar) }}"
                alt="{{ $user->name }} avatar"
                class="h-56 w-full object-cover"
            />
        </figure>
    @else
        <figure class="overflow-hidden">
            <div class="bg-slate-800 text-white h-56 w-full object-cover text-7xl flex items-center justify-center">
                {{ $user->getInitials() }}
            </div>
        </figure>
    @endif
    <div class="card-body font-[Jost] relative z-20">
        @if ($user->name)
            <h2 class="card-title">{{ Str::limit($user->name, 20) }}</h2>
        @endif

        <div class="card-actions grid grid-cols-3">
            <div class="col-span-2">
                @if ($variant)
                    @switch($variant)
                        @case('following')
                            <x-button
                                primary
                                outline
                                wire:click.prevent="unfollow({{ $user->id }})"
                                title="Unfollow {{ $user->name }}"
                            >
                                <x-slot:icon>
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
                                            d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                        />
                                    </svg>
                                </x-slot:icon>
                            </x-button>
                        @break

                        @case('friends')
                            <x-button
                                primary
                                outline
                                wire:click.prevent="removeFriend({{ $user->id }})"
                                title="Remove {{ $user->name }}"
                            >
                                <x-slot:icon>
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
                                            d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM4 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 10.374 21c-2.331 0-4.512-.645-6.374-1.766Z"
                                        />
                                    </svg>
                                </x-slot:icon>
                            </x-button>
                        @break

                        @case('friend-request-received')
                            <x-button
                                success
                                outline
                                wire:click.prevent="acceptFriendRequest({{ $user->id }})"
                                title="Accept Friend Request From {{ $user->name }}"
                            >
                                <x-slot:icon>
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
                                            d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                                        />
                                    </svg>
                                </x-slot:icon>
                            </x-button>
                            <x-button
                                error
                                outline
                                wire:click.prevent="rejectFriendRequest({{ $user->id }})"
                                title="Reject Friend Request From {{ $user->name }}"
                            >
                                <x-slot:icon>
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
                                            d="M22 10.5h-6m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM4 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 10.374 21c-2.331 0-4.512-.645-6.374-1.766Z"
                                        />
                                    </svg>
                                </x-slot:icon>
                            </x-button>
                        @break

                        @case('friend-request-sent')
                            <x-button
                                error
                                outline
                                wire:click.prevent="cancelFriendRequest({{ $user->id }})"
                                title="Cancel Friend Request To {{ $user->name }}"
                            >
                                <x-slot:icon>
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
                                            d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636"
                                        />
                                    </svg>
                                </x-slot:icon>
                            </x-button>
                        @break
                    @endswitch
                @endif
            </div>
            <x-button
                secondary
                outline
                wire:click.prevent="viewFriend({{ $user->id }})"
                title="View {{ $user->name }}"
            >
                <x-slot:icon>
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
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                        />
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                        />
                    </svg>
                </x-slot:icon>
            </x-button>
        </div>
    </div>
</div>
