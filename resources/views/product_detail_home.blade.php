{{-- @extends('layouts.appguest')

@section('title', 'Detail')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('home') }}" class="btn btn-primary">Kembali</a>
            <div class="mt-3 row">
                <div class="col-md-4">
                    <img src="{{ $product['photo'] }}" class="border shadow-sm img-fluid border-secondary-subtle"
                        alt="{{ $product['product_name'] }}">
                </div>
                <div class="col-md-8">
                    <h1>{{ $product['product_name'] }}</h1>
                    <p>{{ $product['description'] }}</p>
                    <p>Rp{{ number_format($product['price'], 0, ',', '.') }}</p>

                    <a href="{{ route('login') }}" class="btn btn-primary">Login untuk membeli</a>

                </div>
            </div>
        </div>
    </div>
@endsection --}}

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
                <p class="mt-4 text-2xl font-semibold text-gray-900 dark:text-white">Rp{{ number_format($product['price'], 0, ',', '.') }}
                </p>
                <br>

                {{-- <p class="mt-4 font-bold text-gray-900 text-1xl">CPU
                </p>
                <p class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">
                    {{ $product['cpu'] }}</p>
                <p class="mt-4 font-bold text-gray-900 text-1xl">GPU
                </p>
                <p class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">{{ $product['gpu'] }}</p>
                <p class="mt-4 font-bold text-gray-900 text-1xl">Memory
                </p>
                <p class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">{{ $product['memory'] }}</p>
                <p class="mt-4 font-bold text-gray-900 text-1xl">Storage
                </p>
                <p class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">{{ $product['storage'] }}</p>
                <p class="mt-4 font-bold text-gray-900 text-1xl">Stock
                </p>
                <p class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">{{ $product['stock'] }}</p>
                <p class="mt-4 font-bold text-gray-900 text-1xl">Price
                </p>
                <p class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">{{ $product['price'] }}</p>
                <p class="mt-4 font-bold text-gray-900 text-1xl">Category
                </p>
                <p class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">{{ $product->category->category_name }}</p> --}}

                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <div>
                        <p class="text-xl font-bold text-gray-900 dark:text-white">CPU</p>
                        <p class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">
                            {{ $product['cpu'] }}
                        </p>
                    </div>
                
                    <div>
                        <p class="text-xl font-bold text-gray-900dark:text-white">GPU</p>
                        <p class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">
                            {{ $product['gpu'] }}
                        </p>
                    </div>
                
                    <div>
                        <p class="text-xl font-bold text-gray-900dark:text-white">Memory</p>
                        <p class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">
                            {{ $product['memory'] }}
                        </p>
                    </div>
                
                    <div>
                        <p class="text-xl font-bold text-gray-900dark:text-white">Storage</p>
                        <p class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">
                            {{ $product['storage'] }}
                        </p>
                    </div>
                
                    <div>
                        <p class="text-xl font-bold text-gray-900dark:text-white">Stock</p>
                        <p class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">
                            {{ $product['stock'] }}
                        </p>
                    </div>
                
                    <div>
                        <p class="text-xl font-bold text-gray-900dark:text-white">Category</p>
                        <p class="w-full p-3 text-gray-400 border border-gray-300 rounded-lg bg-gray-50 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">
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
