<nav class="bg-white shadow-md">
    <div class="container flex items-center justify-between px-6 py-4 mx-auto">
        <a class="text-2xl font-semibold text-gray-800" href="#">WFDGP3 Store</a>
        <div>
            <a class="text-gray-800 hover:text-blue-600" href="{{ route('home') }}">Home</a>
        </div>
        <div class="hidden space-x-6 lg:flex" id="navbarSupportedContent">
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}"
                    class="px-4 py-2 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">Login</a>
                <a href="{{ route('register') }}"
                    class="px-4 py-2 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">Register</a>
            </div>
        </div>
    </div>
</nav>

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="loginname" :value="__('Email / Phone')" />
            <x-text-input id="loginname" class="block w-full mt-1" type="text" name="loginname" :value="old('loginname')"
                required />
            <x-input-error :messages="$errors->get('loginname')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="text-indigo-600 border-gray-300 rounded shadow-sm focus:ring-indigo-500" name="remember">
                <span class="text-sm text-gray-600 ms-2">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">

            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
        <div class="flex mt-4 items justify-evenly">
            <div class="mt-4">
                <x-input-label for="password" :value="__('Don’t have an account?')" />
            </div>
            <div class="mt-4">
                @if (Route::has('register'))
                    <a class="text-sm text-blue-600 underline rounded-md me-4 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                        href="{{ route('register') }}">
                        {{ __('Register') }}
                    </a>
                @endif
            </div>
        </div>
    </form>
</x-guest-layout>




