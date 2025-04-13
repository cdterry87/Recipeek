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
                                    <x-icons.unfollow />
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
                                    <x-icons.remove-friend />
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
                                    <x-icons.accept-friend />
                                </x-slot:icon>
                            </x-button>
                            <x-button
                                error
                                outline
                                wire:click.prevent="rejectFriendRequest({{ $user->id }})"
                                title="Reject Friend Request From {{ $user->name }}"
                            >
                                <x-slot:icon>
                                    <x-icons.reject-friend />
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
                                    <x-icons.cancel-friend-request />
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
                    <x-icons.view />
                </x-slot:icon>
            </x-button>
        </div>
    </div>
</div>
