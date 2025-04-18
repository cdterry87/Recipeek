<div class="max-w-4xl mx-auto p-6 my-8 flex flex-col gap-16">
    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-8">
        <div class="w-full mb-6 flex flex-col gap-4">
            <h2 class="font-bold text-3xl font-[Jost]">
                Edit Profile
            </h2>
            <p class="text-sm italic">
                Update your profile information to let the community know more about you and your love of food.
            </p>
        </div>

        <div class="w-full">
            <form
                class="flex flex-col gap-2"
                wire:submit.prevent="updateProfile"
            >
                @if (session('update-profile-message'))
                    <x-alert
                        success
                        class="mb-2"
                    >
                        {{ session('update-profile-message') }}
                    </x-alert>
                @endif

                <div class="flex items-center gap-4">
                    @if ($avatar && $avatar->temporaryUrl())
                        <div class="flex items-center justify-center flex-col gap-2">
                            <img
                                src="{{ $avatar->temporaryUrl() }}"
                                class="h-24 w-24 rounded-full object-cover shadow-md border-2 border-rose-600"
                                alt="Profile Preview"
                            >
                            <div class="text-xs font-semibold italic">New Avatar</div>
                        </div>
                    @endif
                    @if ($avatarPath)
                        <div class="flex items-center justify-center flex-col gap-2">
                            <img
                                src="{{ asset($avatarPath) }}"
                                class="h-24 w-24 rounded-full object-cover shadow-md border-2 border-rose-600"
                                alt="Profile Picture"
                            >
                            <div class="text-xs font-semibold italic">Current Avatar</div>
                        </div>
                        <div class="flex items-center justify-center">
                            <x-button
                                secondary
                                xs
                                wire:click.prevent="removeAvatar"
                            >
                                Remove Avatar
                            </x-button>
                        </div>
                    @endif
                </div>

                @if ($avatar && $avatar->temporaryUrl())
                    <p class="text-xs font-semibold italic text-rose-600">
                        A preview of your new avatar will be shown above. Please save your changes to apply the new
                        avatar.
                    </p>
                @endif

                <x-input-text
                    label="Name"
                    id="name"
                    name="name"
                    placeholder="Enter your name"
                    wire:model="name"
                    required
                    block
                    maxlength="255"
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
                    maxlength="255"
                />
                <x-file
                    label="Avatar"
                    id="avatar"
                    name="avatar"
                    placeholder="Upload your avatar"
                    wire:model="avatar"
                    block
                />
                <x-textarea
                    label="Bio"
                    id="bio"
                    name="bio"
                    placeholder="Tell the community about yourself"
                    wire:model="bio"
                    maxlength="2000"
                    block
                ></x-textarea>
                <x-toggle
                    label="Public Profile - Enable to make your profile visible to others"
                    id="public"
                    name="public"
                    wire:model="public"
                    primary
                />
                <x-button
                    primary
                    block
                    class="mt-4"
                >
                    Update Profile
                </x-button>
            </form>
        </div>
    </div>
    <hr class="w-full md:w-1/2 mx-auto border-2 border-rose-600 my-8">
    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-8">
        <div class="w-full mb-6 flex flex-col gap-4">
            <h2 class="font-bold text-3xl font-[Jost]">
                Change Password
            </h2>
            <p class="text-sm italic">
                Update your password to keep your account secure. Make sure to use a strong password that you haven't
                used before.
            </p>
        </div>

        <div class="w-full">
            <form
                class="flex flex-col gap-2"
                wire:submit.prevent="changePassword"
            >
                @if (session('change-password-message'))
                    <x-alert
                        success
                        class="mb-2"
                    >
                        {{ session('change-password-message') }}
                    </x-alert>
                @endif
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
                    Change Password
                </x-button>
            </form>
        </div>
    </div>
    <hr class="w-full md:w-1/2 mx-auto border-2 border-rose-600 my-8">
    <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-2 lg:gap-8">
        <div class="w-full mb-6 flex flex-col gap-4">
            <h2 class="font-bold text-3xl font-[Jost]">
                Friend Request Link
            </h2>
            <p class="text-sm italic">
                Share this link with your friends to allow them to send you friend requests, even if your profile is
                private. You can regenerate this link at any time to create a new one or clear it and set your profile
                to private to no longer receive friend requests.
            </p>
        </div>

        <div class="w-full">
            <form class="flex flex-col gap-2">
                @if (session('change-password-message'))
                    <x-alert
                        success
                        class="mb-2"
                    >
                        {{ session('change-password-message') }}
                    </x-alert>
                @endif
                <label class="input w-full">
                    <x-icons.link />
                    <input
                        wire:model="private_friend_request_link"
                        readonly
                    />
                </label>
                <div class="grid grid-cols-2 gap-6 mt-4">
                    <x-button
                        primary
                        block
                        wire:click.prevent="regenerateFriendRequestLink"
                    >
                        Regenerate
                    </x-button>
                    <x-button
                        secondary
                        block
                        wire:click.prevent="clearFriendRequestLink"
                    >
                        Clear
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
