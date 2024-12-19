@extends('layouts.appguest')

@section('title', 'Detail')

@section('content')
    <div class="container px-4 py-8 mx-auto">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Product Detail</h1>
        <br>
        <br>
        <a href="{{ route('home') }}"
            class="px-4 py-2 text-white bg-blue-500 rounded-md btn btn-primary hover:bg-blue-600">Back</a>

        <div class="grid grid-cols-1 gap-6 mt-6 md:grid-cols-2">
            <div class="col-span-1">
                <img alt="Product Image" class="object-cover mb-4 h-100 w-100"
                    src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('img/avatar.png') }}" />
            </div>
            <div class="col-span-1">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">{{ $product['product_name'] }}</h1>
                <p class="mt-4 text-lg text-gray-700 dark:text-gray-200">{{ $product['description'] }}</p>
                <p class="mt-4 text-2xl font-semibold text-gray-900 dark:text-white">
                    Rp{{ number_format($product['price'], 0, ',', '.') }}
                </p>
                <br>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <div>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">CPU</p>
                        <p
                            class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">
                            {{ $product['cpu'] }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xl font-bold text-gray-900dark:text-white">GPU</p>
                        <p
                            class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">
                            {{ $product['gpu'] }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xl font-bold text-gray-900dark:text-white">Memory</p>
                        <p
                            class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">
                            {{ $product['memory'] }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xl font-bold text-gray-900dark:text-white">Storage</p>
                        <p
                            class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">
                            {{ $product['storage'] }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xl font-bold text-gray-900dark:text-white">Stock</p>
                        <p
                            class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">
                            {{ $product['stock'] }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xl font-bold text-gray-900dark:text-white">Category</p>
                        <p
                            class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">
                            {{ $product->category->category_name }}
                        </p>
                    </div>
                </div>

                <a href="{{ route('login') }}"
                    class="inline-block px-6 py-2 mt-6 font-semibold text-white bg-blue-500 rounded-lg shadow-md hover:bg-blue-600">Login
                    to Buy</a>
            </div>
        </div>
    </div>
@endsection
