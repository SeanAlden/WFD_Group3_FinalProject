{{-- <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section> --}}

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>

        <div class="mt-4">
            <x-input-label for="profile_image" :value="__('Profile Image')" />
            
            <!-- Display the current profile image -->
            {{-- <div class="mb-3">
                <img 
                    src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : asset('img/profile.jpg') }}" 
                    alt="Profile Image" 
                    class="h-24 w-24 rounded-full object-cover"
                />
            </div> --}}

            <!-- File input for profile image -->
            <form method="post" action="{{ route('profile.upload') }}" enctype="multipart/form-data">
                @csrf
                {{-- <x-text-input 
                    id="profile_image" 
                    name="profile_image" 
                    type="file" 
                    class="mt-1 block w-full" 
                    accept="image/*" 
                />
                <x-input-error class="mt-2" :messages="$errors->get('profile_image')" />
                <x-primary-button class="mt-3">
                    {{ __('Upload Image') }}
                </x-primary-button> --}}
                <div class="avatar-upload">
                    <div>
                        <input type='file' id="imageUpload" name="photo" accept=".png, .jpg, jpeg"
                            onchange="previewImage(this)" />
                        <label for="imageUpload"></label>
                    </div>
                    <br>
                    <div class="avatar-preview">
                        {{-- <div id="imagePreview" style="background-image: url('{{ url('/img/avatar.png') }}')"></div> --}}
                        <img src="{{ URL::asset('/img/profile.jpg') }}" alt="profile Pic" height="100"
                            width="100" class="rounded-full object-cover">
                    </div>
                </div>
            </form>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
<script>
    function previewImage(input) {
        // if (input.files && input.files[0]) {
        //     var reader = new FileReader();
        //     reader.onload = function(e) {
        //         $("#imagePreview").css('background-image', 'url(' + e.target.result + ')');
        //         $("#imagePreview").hide();
        //         $("#imagePreview").fadeIn(700)
        //     }
        //     reader.readAsDataURL(input.files[0]);
        // }
        if (input.files && input.files[0]) {
            let reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('.avatar-preview img').src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


