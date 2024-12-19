@extends('layouts.appguest')

@section('title', 'Home')

@section('content')

    <body class="items-center justify-center dark:bg-gray-900 dark:text-white">
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="max-w-6xl p-6 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">

                    <!-- Image and Description Section -->
                    <div class="relative mb-8">
                        <img src="{{ asset('img/laptop_shop.png') }}" alt="Laptop Shop"
                            class="object-cover w-full h-64 rounded-lg shadow-md">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 rounded-lg">
                            <p class="px-4 text-xl font-bold text-center text-white">
                                WFDGP3 Store adalah sebuah toko komputer yang menyediakan bermacam-macam produk komputer
                                dengan kualitas terjamin
                            </p>
                        </div>
                    </div>

                    <h2 class="mb-4 text-xl font-bold dark:text-white">
                        Our Products
                    </h2>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach ($products as $product)
                            <!-- Product Card -->
                            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <img alt="Product Image" class="object-cover w-full h-64 mb-4"
                                    src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('img/avatar.png') }}" />
                                <h2 class="mb-2 text-lg font-semibold dark:text-white">
                                    {{ $product->product_name }}
                                </h2>
                                <p class="mb-4 text-gray-700 dark:text-gray-400">
                                    PRICE : {{ number_format($product->price, 2) }}
                                </p>
                                <button class="px-4 py-2 mb-2 text-white bg-blue-500 rounded-lg">
                                    <a href="{{ route('product', $product['id']) }}" class="btn btn-primary">Detail</a>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
