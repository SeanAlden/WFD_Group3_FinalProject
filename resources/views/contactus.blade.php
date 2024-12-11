@extends('layouts.app')
@section('content')
@if (session('success'))
<script>
    setTimeout(function() {
        document.getElementById('success-notification').style.display = 'none';
    }, 3000); // 3 detik
</script>
@endif


    <body class="flex min-h-screen items-center justify-center bg-gray-300">
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="mx-auto max-w-6xl rounded-lg bg-white p-6 shadow-md">
                        <h1 class="mb-6 text-center text-2xl font-semibold">Contact Us</h1>
                        {{-- <form>
                            <div class="mb-4">
                                <label for="fullName" class="mb-2 block text-sm font-medium">Full Name</label>
                                <input type="text" id="fullName" class="w-full rounded-lg border border-gray-300 p-2"
                                    placeholder="Full Name">
                            </div>
                            <div class="mb-4">
                                <label for="email" class="mb-2 block text-sm font-medium">Email</label>
                                <input type="email" id="email" class="w-full rounded-lg border border-gray-300 p-2"
                                    placeholder="Email">
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="mb-2 block text-sm font-medium">Phone</label>
                                <input type="tel" id="phone" class="w-full rounded-lg border border-gray-300 p-2"
                                    placeholder="Phone">
                            </div>
                            <div class="mb-4">
                                <label for="message" class="mb-2 block text-sm font-medium">Your Message</label>
                                <textarea id="message" class="w-full rounded-lg border border-gray-300 p-2" rows="4" placeholder="Your Message">Type your message here</textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="rounded-lg bg-gray-500 px-4 py-2 text-white">Send</button>
                            </div>
                        </form> --}}
                        <form action="{{ route('messages.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="fullName" class="mb-2 block text-sm font-medium">Full Name</label>
                                <input type="text" name="full_name" id="fullName"
                                    class="w-full rounded-lg border border-gray-300 p-2" placeholder="Full Name" required>
                            </div>
                            <div class="mb-4">
                                <label for="email" class="mb-2 block text-sm font-medium">Email</label>
                                <input type="email" name="email" id="email"
                                    class="w-full rounded-lg border border-gray-300 p-2" placeholder="Email" required>
                            </div>
                            <div class="mb-4">
                                <label for="phone" class="mb-2 block text-sm font-medium">Phone</label>
                                <input type="tel" name="phone" id="phone"
                                    class="w-full rounded-lg border border-gray-300 p-2" placeholder="Phone" required>
                            </div>
                            <div class="mb-4">
                                <label for="message" class="mb-2 block text-sm font-medium">Your Message</label>
                                <textarea name="message" id="message" class="w-full rounded-lg border border-gray-300 p-2" rows="4"
                                    placeholder="Your Message" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="rounded-lg bg-gray-500 px-4 py-2 text-white">Send</button>
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
