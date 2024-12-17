@extends('layouts.app')
@section('content')
<body class="dark:bg-gray-900 dark:text-gray-100">
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-100">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <!-- Update Profile Information Section -->
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg dark:bg-gray-800 dark:border-gray-700">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password Section -->
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg dark:bg-gray-800 dark:border-gray-700">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete User Section -->
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg dark:bg-gray-800 dark:border-gray-700">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
