@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div id="flash-message"
            class="relative px-4 py-3 text-green-700 transition-opacity duration-500 bg-green-100 border border-green-400 rounded"
            role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="py-12 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <h2 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">Shopping Cart</h2>
            <div class="space-y-4">
                @foreach ($cartItems as $item)
                    <div
                        class="flex items-center justify-between p-4 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex items-start space-x-4">
                            <img alt="Product Image" class="object-cover w-32 h-32 rounded-md"
                                src="{{ $item->product->photo ? asset('storage/' . $item->product->photo) : asset('img/avatar.png') }}" />
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $item->product->product_name }}</h3>
                                <p class="text-gray-700 dark:text-gray-300">Price: IDR
                                    {{ number_format($item->product->price, 2) }}</p>
                                <p class="text-gray-700 dark:text-gray-300">Stock: {{ $item->product->stock }}</p>
                            </div>
                        </div>

                        <!-- Tombol Delete -->
                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST" class="ml-4">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini dari keranjang?')"
                                class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-600">
                                <!-- Ikon Delete -->
                                <i class="mr-2 fas fa-trash-alt"></i> Delete
                            </button>
                        </form>

                        <div class="flex items-center">
                            <button onclick="updateQuantity({{ $item->id }}, -1)"
                                class="px-2 py-1 text-white bg-gray-500 rounded hover:bg-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600">
                                -
                            </button>
                            <input type="text" readonly value="{{ $item->quantity }}"
                                class="w-12 mx-2 text-center bg-gray-100 border dark:bg-gray-700 dark:text-white">
                            <button onclick="updateQuantity({{ $item->id }}, 1)"
                                class="px-2 py-1 text-white bg-blue-500 rounded hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700">
                                +
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
            <h3 class="mt-6 text-lg font-bold text-gray-900 dark:text-white">Total: IDR {{ number_format($total, 2) }}</h3>
            <div class="flex items-center justify-between mt-4">
                <a href="{{ route('checkout') }}"
                    class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700">
                    Checkout
                </a>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            setTimeout(() => {
                flashMessage.classList.add('opacity-0'); // Tambahkan efek transisi
                setTimeout(() => flashMessage.remove(), 500); // Hapus elemen setelah transisi selesai
            }, 3000); // Flash message akan hilang setelah 3 detik
        }
    });
    async function updateQuantity(itemId, delta) {
        try {
            const response = await fetch(`/cart/update/${itemId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    delta
                })
            });

            if (response.ok) {
                location.reload(); // Refresh halaman
            }
        } catch (error) {
            console.error('Error updating quantity:', error);
        }
    }
</script>
