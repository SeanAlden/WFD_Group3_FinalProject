@extends('layouts.app')

@section('content')

    <body class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-800">
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white m:rounded-lg dark:bg-gray-700">
                    <div class="max-w-6xl p-6 mx-auto bg-white dark:bg-gray-700">
                        <h1 class="mb-6 text-3xl font-semibold text-center text-gray-800 dark:text-white">Contact Us</h1>
                        <form action="{{ route('messages.store') }}" method="POST">
                            @csrf
                            {{-- <div class="mb-6">
                            <label for="fullName" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Full Name</label>
                            <input type="text" name="full_name" id="fullName" class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-white" placeholder="Full Name" required>
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" id="email" class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-white" placeholder="Email" required>
                        </div>
                        <div class="mb-6">
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                            <input type="tel" name="phone" id="phone" class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-white" placeholder="Phone" required>
                        </div> --}}
                            <!-- Full Name -->
                            <div class="mb-6">
                                <label for="fullName"
                                    class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Full
                                    Name</label>
                                <p id="fullName"
                                    class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">
                                    {{ $user->name }}
                                </p>
                            </div>

                            <!-- Email -->
                            <div class="mb-6">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                                <p id="email"
                                    class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">
                                    {{ $user->email }}
                                </p>
                            </div>

                            <!-- Phone -->
                            <div class="mb-6">
                                <label for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                                <p id="phone"
                                    class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">
                                    {{ $user->phone }}
                                </p>
                            </div>
                            <div class="mb-6">
                                <label for="message"
                                    class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Your
                                    Message</label>
                                <textarea name="message" id="message"
                                    class="w-full p-3 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-white"
                                    rows="6" placeholder="Your Message" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit"
                                    class="px-6 py-3 text-white bg-indigo-600 rounded-lg hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400 dark:bg-indigo-700 dark:hover:bg-indigo-600">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
