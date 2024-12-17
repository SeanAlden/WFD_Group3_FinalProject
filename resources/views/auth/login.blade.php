@extends('layouts.appguest')

@section('content')
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
@endsection


{{-- @extends('layouts.appguest')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Title -->
            <h2 class="mb-6 text-2xl font-semibold text-center text-gray-700 dark:text-gray-100">
                {{ __('Login') }}
            </h2>

            <!-- Email Address -->
            <div>
                <label for="loginname" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Email / Phone') }}
                </label>
                <input id="loginname" type="text" name="loginname" :value="old('loginname')" required
                    class="block w-full mt-1 p-2.5 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 rounded-md" />
                @error('loginname')
                    <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    {{ __('Password') }}
                </label>
                <input id="password" type="password" name="password" required
                    class="block w-full mt-1 p-2.5 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-indigo-500 focus:border-indigo-500 rounded-md" />
                @error('password')
                    <span class="text-sm text-red-600 dark:text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mt-4">
                <input id="remember_me" type="checkbox" name="remember"
                    class="text-indigo-600 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 focus:ring-indigo-500" />
                <label for="remember_me" class="text-sm text-gray-600 ms-2 dark:text-gray-300">
                    {{ __('Remember me') }}
                </label>
            </div>

            <!-- Submit Button & Forgot Password -->
            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}"
                        class="text-sm text-indigo-600 dark:text-indigo-400 hover:underline">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <button type="submit"
                    class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 dark:bg-indigo-700 dark:hover:bg-indigo-800">
                    {{ __('Log in') }}
                </button>
            </div>

            <!-- Register Link -->
            <div class="mt-6 text-center">
                <span class="text-sm text-gray-600 dark:text-gray-300">{{ __("Don’t have an account?") }}</span>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
                        {{ __('Register') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection --}}
