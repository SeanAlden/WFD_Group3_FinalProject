<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information, email address, and profile picture.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <!-- Profile Image -->
        <div class="flex items-center space-x-4">
            <div>
                <label for="profile_image" class="block text-sm font-medium text-gray-700 dark:text-gray-100">
                    {{ __('Profile Picture') }}
                </label>
                <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('storage/profile_images/profile.jpg') }}"
                    alt="Profile Image" class="w-16 h-16 mt-2 rounded-full">
            </div>

            <div class="mt-2">
                <x-input-label for="profile_image" :value="__('Upload New Picture')" class="dark:text-gray-100" />
                <input type="file" name="profile_image" id="profile_image"
                    class="block w-full mt-1 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                <x-input-error class="mt-2 dark:text-red-500" :messages="$errors->get('profile_image')" />
            </div>
        </div>

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" class="dark:text-gray-100" />
            <x-text-input id="name" name="name" type="text"
                class="block w-full mt-1 dark:bg-gray-700 dark:text-white dark:border-gray-600" :value="old('name', $user->name)"
                required autofocus autocomplete="name" />
            <x-input-error class="mt-2 dark:text-red-500" :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="dark:text-gray-100" />
            <x-text-input id="email" name="email" type="email"
                class="block w-full mt-1 dark:bg-gray-700 dark:text-white dark:border-gray-600" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2 dark:text-red-500" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800 dark:text-gray-300">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="text-sm text-gray-600 underline rounded-md dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Phone -->
        <div>
            <x-input-label for="phone" :value="__('Phone')" class="dark:text-gray-100" />
            <x-text-input id="phone" name="phone" type="text"
                class="block w-full mt-1 dark:bg-gray-700 dark:text-white dark:border-gray-600" :value="old('phone', $user->phone)"
                required autocomplete="phone" />
            <x-input-error class="mt-2 dark:text-red-500" :messages="$errors->get('phone')" />
        </div>

        <!-- Submit Button -->
        <div class="flex items-center gap-4">
            <x-primary-button class="dark:bg-lime-600 dark:hover:bg-lime-600">{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-300">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
