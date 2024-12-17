@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="container mx-auto mt-5">
                <h1 class="mb-6 text-4xl font-semibold text-gray-900 dark:text-white">Manage Transactions</h1>
                <div class="overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <div class="p-6 overflow-x-auto">
                        <table class="min-w-full text-sm text-left text-gray-900 table-auto dark:text-gray-200">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 font-medium text-gray-700 dark:text-gray-200">Order ID</th>
                                    <th class="px-6 py-3 font-medium text-gray-700 dark:text-gray-200">Gross Amount</th>
                                    <th class="px-6 py-3 font-medium text-gray-700 dark:text-gray-200">Status</th>
                                    <th class="px-6 py-3 font-medium text-gray-700 dark:text-gray-200">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr class="border-t hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">{{ $transaction->order_id }}</td>
                                        <td class="px-6 py-4">Rp
                                            {{ number_format($transaction->gross_amount, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 capitalize">{{ $transaction->status }}</td>
                                        <td class="flex gap-2 px-6 py-4">
                                            @if ($transaction->status == 'pending')
                                                <form action="{{ route('transactions.confirm', $transaction->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button
                                                        class="px-4 py-2 font-semibold text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 dark:bg-green-600 dark:hover:bg-green-500">
                                                        Confirm
                                                    </button>
                                                </form>
                                                <form action="{{ route('transactions.cancel', $transaction->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button
                                                        class="px-4 py-2 font-semibold text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400 dark:bg-red-600 dark:hover:bg-red-500">
                                                        Cancel
                                                    </button>
                                                </form>
                                            @else
                                                <button
                                                    class="px-4 py-2 font-semibold text-gray-700 bg-gray-300 rounded-lg cursor-not-allowed dark:bg-gray-600 dark:text-gray-400"
                                                    disabled>No Action</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
