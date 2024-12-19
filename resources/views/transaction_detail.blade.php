@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="container mx-auto mt-10">
                <h1 class="mb-6 text-3xl font-bold text-gray-800 dark:text-white">Transaction Details</h1>
                <div class="p-6 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <h2 class="text-xl font-semibold text-gray-700 dark:text-gray-300">Order ID: {{ $transaction->order_id }}
                    </h2>
                    <p class="text-gray-500 dark:text-gray-400">Status: {{ ucfirst($transaction->status) }}</p>
                    <p class="text-gray-500 dark:text-gray-400">Gross Amount: Rp
                        {{ number_format($transaction->gross_amount, 0, ',', '.') }}</p>
                    <p class="text-gray-500 dark:text-gray-400">Updated At:
                        {{ $transaction->updated_at->format('Y-m-d H:i:s') }}</p>
                    <h3 class="mt-4 text-lg font-semibold text-gray-700 dark:text-gray-300">Customer Info:</h3>
                    <p class="text-gray-500 dark:text-gray-400">Name: {{ $transaction->user->name }}</p>
                    <p class="text-gray-500 dark:text-gray-400">Email: {{ $transaction->user->email }}</p>
                    <p class="text-gray-500 dark:text-gray-400">Phone: {{ $transaction->user->phone }}</p>

                    <div class="mt-6">
                        <a href="{{ route('admin.transactions') }}"
                            class="inline-block px-6 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                            Back to Transactions
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
