@extends('layouts.app')

@section('content')
    <div class="container px-4 py-10 mx-auto">
        <h1 class="mb-8 text-3xl font-bold text-center text-gray-800 dark:text-gray-100">Checkout</h1>

        <!-- Cart Items -->
        <div class="mb-8 overflow-x-auto bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="px-6 py-3 text-white bg-blue-600 rounded-t-lg">
                <h4 class="text-lg font-semibold">Cart Items</h4>
            </div>
            <div class="px-6 py-4">
                <table class="w-full text-left border-collapse table-auto">
                    <thead>
                        <tr>
                            <th class="py-2 text-gray-800 border-b dark:text-gray-100">Image</th>
                            <th class="py-2 text-gray-800 border-b dark:text-gray-100">Product</th>
                            <th class="py-2 text-center text-gray-800 border-b dark:text-gray-100">Quantity</th>
                            <th class="py-2 text-right text-gray-800 border-b dark:text-gray-100">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                            <tr>
                                <td class="py-4 border-b">
                                    <img alt="Product Image" class="object-cover w-16 h-16 rounded"
                                        src="{{ $item->product->photo ? asset('storage/' . $item->product->photo) : asset('img/avatar.png') }}" />
                                </td>
                                <td class="py-4 text-gray-800 border-b dark:text-gray-100">
                                    {{ $item->product->product_name }}</td>
                                <td class="py-4 text-center text-gray-800 border-b dark:text-gray-100">
                                    x{{ $item->quantity }}</td>
                                <td class="py-4 font-semibold text-right text-green-600 border-b dark:text-gray-100">Rp
                                    {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex items-center justify-between mt-4">
                    <h5 class="text-lg font-bold text-gray-800 dark:text-gray-100">Total:</h5>
                    <h5 class="text-xl font-extrabold text-blue-600 dark:text-blue-400">Rp
                        {{ number_format($total, 0, ',', '.') }}</h5>
                </div>
            </div>
        </div>

        <!-- Customer Details -->
        <div class="bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="px-6 py-3 text-white bg-gray-800 rounded-t-lg dark:bg-gray-600">
                <h4 class="text-lg font-semibold text-gray-100">Customer Details</h4>
            </div>
            <div class="px-6 py-4">
                <form id="checkout-form" class="space-y-6">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <label for="first_name" class="block font-medium text-gray-700 dark:text-gray-300">First
                                Name</label>
                            <input type="text" id="first_name" name="first_name"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600"
                                required>
                        </div>
                        <div>
                            <label for="last_name" class="block font-medium text-gray-700 dark:text-gray-300">Last
                                Name</label>
                            <input type="text" id="last_name" name="last_name"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600"
                                required>
                        </div>
                        <div>
                            <label for="email" class="block font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" id="email" name="email"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600"
                                required>
                        </div>
                        <div>
                            <label for="phone" class="block font-medium text-gray-700 dark:text-gray-300">Phone</label>
                            <input type="text" id="phone" name="phone"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600"
                                required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="px-6 py-3 text-lg font-semibold text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-400">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Production Mode --}}
    {{-- <script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script> --}}

    {{-- Sandbox Mode --}}
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        document.getElementById('checkout-form').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(e.target);

            fetch("{{ route('checkout.handle') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.snap_token) {
                        snap.pay(data.snap_token, {
                            onSuccess: function(result) {
                                alert('Payment Successful');
                                window.location.href = "{{ route('transactions') }}";
                            },
                            onPending: function(result) {
                                alert('Waiting for payment');
                            },
                            onError: function(result) {
                                alert('Payment failed');
                            },
                        });
                    } else if (data.error) {
                        alert(data.error);
                    }
                })
                .catch(error => console.error(error));
        });
    </script>
@endsection
