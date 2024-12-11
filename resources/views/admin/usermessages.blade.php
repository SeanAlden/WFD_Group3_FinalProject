@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="mx-auto max-w-6xl rounded-lg bg-white p-6 shadow-md">
                    <h1 class="mb-4 text-lg font-semibold text-gray-800">User Messages</h1>
                    <table class="w-full table-auto border-collapse text-sm">
                        <thead>
                            <tr class="bg-gray-100 font-medium text-gray-600">
                                <th class="px-4 py-3 text-left">USER NAME</th>
                                <th class="px-4 py-3 text-left">USER EMAIL</th>
                                <th class="px-4 py-3 text-left">PHONE</th>
                                <th class="px-4 py-3 text-left">MESSAGES</th>
                                <th class="px-4 py-3 text-left">CREATED AT</th>
                                <th class="px-4 py-3 text-left">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr class="border-t border-gray-200 hover:bg-gray-50">
                                    <td class="px-4 py-3 text-gray-800">{{ $message->full_name }}</td>
                                    <td class="px-4 py-3 text-gray-600">{{ $message->email }}</td>
                                    <td class="px-4 py-3 text-gray-600">{{ $message->phone }}</td>
                                    <td class="px-4 py-3 text-gray-600">
                                        {{ Str::limit($message->message, 16) }}{{ strlen($message->message) > 16 ? '...' : '' }}
                                    </td>
                                    <td class="px-4 py-3 text-gray-600">{{ $message->created_at->format('Y-m-d H:i:s') }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <!-- View Button -->
                                        <button class="view-message mr-4 font-medium text-green-600 hover:underline"
                                            data-id="{{ $message->id }}" data-message="{{ $message->message }}"
                                            data-name="{{ $message->name }}" data-email="{{ $message->email }}"
                                            data-phone="{{ $message->phone }}">View</button>
                                        <!-- Remove Button -->
                                        <button class="remove-message font-medium text-red-500 hover:underline"
                                            data-id="{{ $message->id }}">Remove</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- View Message Pop-up -->
    {{-- <div id="viewMessagePopup" class="fixed inset-0 flex hidden items-center justify-center bg-gray-800 bg-opacity-50"> --}}
    {{-- <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg"> --}}
    {{-- <h2 class="mb-4 text-xl font-semibold">Message Details</h2> --}}
    {{-- <p><strong>Name:</strong> <span id="viewName"></span></p> --}}
    {{-- <p><strong>Email:</strong> <span id="viewEmail"></span></p> --}}
    {{-- <p><strong>Phone:</strong> <span id="viewPhone"></span></p> --}}
    {{-- <p><strong>Message:</strong></p> --}}
    {{-- <p id="viewMessage"></p> --}}
    {{-- <button id="closeViewPopup" class="mt-4 rounded-lg bg-gray-500 px-4 py-2 text-white">Close</button> --}}
    {{-- </div> --}}
    {{-- </div> --}}
    <!-- View Message Pop-up -->
    <!-- View Message Pop-up -->
    <div id="viewMessagePopup" class="fixed inset-0 flex hidden items-center justify-center bg-gray-800 bg-opacity-50">
        <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg">
            <h2 class="mb-4 text-xl font-semibold">Message Details</h2>
            <p><strong>Name:</strong> <span id="viewName"></span></p>
            <p><strong>Email:</strong> <span id="viewEmail"></span></p>
            <p><strong>Phone:</strong> <span id="viewPhone"></span></p>
            <p><strong>Message:</strong></p>
            <div id="viewMessage" class="max-h-64 overflow-y-auto break-words text-sm text-gray-800">
                <!-- Message content goes here -->
            </div>
            <button id="closeViewPopup" class="mt-4 rounded-lg bg-gray-500 px-4 py-2 text-white">Close</button>
        </div>
    </div>



    <!-- Remove Message Confirmation Pop-up -->
    <div id="removeMessagePopup" class="fixed inset-0 flex hidden items-center justify-center bg-gray-800 bg-opacity-50">
        <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg">
            <h2 class="mb-4 text-xl font-semibold">Are you sure you want to delete this message?</h2>
            <div class="flex justify-between">
                <button id="removeYes" class="rounded-lg bg-red-600 px-4 py-2 text-white">Yes</button>
                <button id="removeNo" class="rounded-lg bg-gray-500 px-4 py-2 text-white">No</button>
            </div>
        </div>
    </div>

    <script>
        // View Message Pop-up
        document.querySelectorAll('.view-message').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const message = this.getAttribute('data-message');
                const name = this.getAttribute('data-name');
                const email = this.getAttribute('data-email');
                const phone = this.getAttribute('data-phone');

                document.getElementById('viewMessage').innerText = message;
                document.getElementById('viewName').innerText = name;
                document.getElementById('viewEmail').innerText = email;
                document.getElementById('viewPhone').innerText = phone;

                document.getElementById('viewMessagePopup').classList.remove('hidden');
            });
        });

        document.getElementById('closeViewPopup').addEventListener('click', function() {
            document.getElementById('viewMessagePopup').classList.add('hidden');
        });

        // Remove Message Pop-up
        document.querySelectorAll('.remove-message').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                document.getElementById('removeMessagePopup').classList.remove('hidden');

                document.getElementById('removeYes').addEventListener('click', function() {
                    // Send request to delete the message
                    fetch(`/messages/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content'),
                            },
                        })
                        .then(response => {
                            if (response.ok) {
                                location.reload(); // Reload the page to reflect the deletion
                            }
                        });
                });

                document.getElementById('removeNo').addEventListener('click', function() {
                    document.getElementById('removeMessagePopup').classList.add('hidden');
                });
            });
        });
    </script>
@endsection
