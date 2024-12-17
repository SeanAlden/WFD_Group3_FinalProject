@extends('layouts.app')
@section('content')

@if (session('success'))
<script>
    setTimeout(function() {
        document.getElementById('success-notification').style.display = 'none';
    }, 3000); // 3 detik
</script>
@endif

<body class="flex min-h-screen items-center justify-center bg-gray-100 dark:bg-gray-800">
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="m:rounded-lg overflow-hidden bg-white dark:bg-gray-700">
                <div class="mx-auto max-w-6xl bg-white p-6 dark:bg-gray-700">
                    <h1 class="mb-6 text-center text-3xl font-semibold text-gray-800 dark:text-white">Contact Us</h1>
                    <form action="{{ route('messages.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="fullName" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Full Name</label>
                            <input type="text" name="full_name" id="fullName" class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 dark:border-gray-500 dark:bg-gray-600 dark:text-white" placeholder="Full Name" required>
                        </div>
                        <div class="mb-6">
                            <label for="email" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" name="email" id="email" class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 dark:border-gray-500 dark:bg-gray-600 dark:text-white" placeholder="Email" required>
                        </div>
                        <div class="mb-6">
                            <label for="phone" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                            <input type="tel" name="phone" id="phone" class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 dark:border-gray-500 dark:bg-gray-600 dark:text-white" placeholder="Phone" required>
                        </div>
                        <div class="mb-6">
                            <label for="message" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">Your Message</label>
                            <textarea name="message" id="message" class="w-full rounded-lg border border-gray-300 bg-gray-50 p-3 dark:border-gray-500 dark:bg-gray-600 dark:text-white" rows="6" placeholder="Your Message" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="rounded-lg bg-indigo-600 px-6 py-3 text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-400 dark:bg-indigo-700 dark:hover:bg-indigo-600">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection

@if (session('success'))
<script>
    setTimeout(function() {
        document.getElementById('success-notification').style.display = 'none';
    }, 3000); // 3 detik
</script>
@endif

