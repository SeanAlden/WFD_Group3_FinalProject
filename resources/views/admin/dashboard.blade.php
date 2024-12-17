@extends('layouts.app')
@section('content')

    <body>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800">
                    <div class="max-w-6xl p-6 mx-auto bg-gray-100 rounded-lg shadow-md dark:bg-gray-700">
                        <h1 class="mb-6 text-3xl font-bold text-gray-800 dark:text-gray-100">
                            Dashboard
                        </h1>
                        <div class="grid grid-cols-1 gap-6 mb-6 sm:grid-cols-2 lg:grid-cols-3">
                            <div
                                class="flex items-center justify-between p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-700 dark:text-gray-200">Total Sales</h2>
                                    <p class="text-gray-600 dark:text-gray-400">Total: {{ $totalSales }}</p>
                                </div>
                                <i class="text-3xl text-blue-500 fas fa-shopping-cart"></i>
                            </div>
                            <div
                                class="flex items-center justify-between p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-700 dark:text-gray-200">Total Income</h2>
                                    <p class="text-gray-600 dark:text-gray-400">Rp
                                        {{ number_format($totalIncome, 0, ',', '.') }}</p>
                                </div>
                                <i class="text-3xl text-green-500 fas fa-wallet"></i>
                            </div>
                            <div
                                class="flex items-center justify-between p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <div>
                                    <h2 class="text-xl font-bold text-gray-700 dark:text-gray-200">Total Users</h2>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $totalUsers }}</p>
                                </div>
                                <i class="text-3xl text-purple-500 fas fa-user"></i>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">

                            <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <h2 class="mb-4 text-xl font-bold text-gray-700 dark:text-gray-200">
                                    Recent Orders
                                </h2>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-left">
                                        <thead>
                                            <tr>
                                                <th class="p-2 text-gray-700 border-b-2 dark:text-gray-300">
                                                    Product ID
                                                </th>
                                                <th class="p-2 text-gray-700 border-b-2 dark:text-gray-300">
                                                    Product
                                                </th>
                                                <th class="p-2 text-gray-700 border-b-2 dark:text-gray-300">
                                                    Price
                                                </th>
                                                <th class="p-2 text-gray-700 border-b-2 dark:text-gray-300">
                                                    Quantity
                                                </th>
                                                <th class="p-2 text-gray-700 border-b-2 dark:text-gray-300">
                                                    Total Price
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($recentOrders as $order)
                                                <tr>
                                                    <td class="p-2 text-gray-600 border-b dark:text-gray-400">
                                                        {{ $order->id }}
                                                    </td>
                                                    <td
                                                        class="flex items-center p-2 text-gray-600 border-b dark:text-gray-400">
                                                        <img alt="Product Image" class="w-10 h-10 mr-2 rounded"
                                                            height="50" w-10
                                                            src="{{ $order->photo ? asset('storage/' . $order->photo) : asset('img/avatar.png') }}" />
                                                        {{ $order->product_name }}
                                                    </td>
                                                    <td class="p-2 text-gray-600 border-b dark:text-gray-400">
                                                        {{ $order->price }}
                                                    </td>
                                                    <td class="p-2 text-gray-600 border-b dark:text-gray-400">
                                                        {{ $order->quantity }}
                                                    </td>
                                                    <td class="p-2 text-gray-600 border-b dark:text-gray-400">
                                                        {{ number_format($order->total_price, 0, ',', '.') }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <h2 class="mb-4 text-xl font-bold text-gray-700 dark:text-gray-200">
                                    Top Products
                                </h2>
                                @foreach ($bestSellers as $product)
                                    <div class="flex items-center mb-4">
                                        <img alt="Product Image" class="w-10 h-10 mr-2 rounded" height="50" w-10
                                            src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('img/avatar.png') }}" />
                                        <div>
                                            <p class="text-gray-700 dark:text-gray-200">
                                                {{ $product->product_name }}
                                            </p>
                                            <p class="text-gray-600 dark:text-gray-400">
                                                {{ number_format($product->price, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
