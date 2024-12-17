@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="container mx-auto mt-10">
                <h1 class="mb-6 text-3xl font-bold text-gray-800 dark:text-white">All Transactions</h1>
                <div class="overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <div class="p-4">
                        <div class="overflow-x-auto">
                            <table class="min-w-full border border-collapse border-gray-200 table-auto dark:border-gray-700">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-700 uppercase border border-gray-200 dark:text-gray-300">
                                            Order ID</th>
                                        <th
                                            class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-700 uppercase border border-gray-200 dark:text-gray-300">
                                            Token</th>
                                        <th
                                            class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-700 uppercase border border-gray-200 dark:text-gray-300">
                                            Gross Amount</th>
                                        <th
                                            class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-700 uppercase border border-gray-200 dark:text-gray-300">
                                            Status</th>
                                        <th
                                            class="px-6 py-3 text-sm font-medium tracking-wider text-left text-gray-700 uppercase border border-gray-200 dark:text-gray-300">
                                            Updated At</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($transactions as $transaction)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="px-6 py-4 text-gray-800 border border-gray-200 dark:text-gray-300">
                                                {{ $transaction->order_id }}</td>
                                            <td class="px-6 py-4 text-gray-800 border border-gray-200 dark:text-gray-300">
                                                {{ $transaction->snap_token ?? 'Unknown' }}</td>
                                            <td class="px-6 py-4 text-gray-800 border border-gray-200 dark:text-gray-300">Rp
                                                {{ number_format($transaction->gross_amount, 0, ',', '.') }}</td>
                                            <td class="px-6 py-4 border border-gray-200">
                                                <span
                                                    class="inline-flex px-3 py-1 rounded-full text-sm font-semibold 
                                                    @if ($transaction->status == 'completed') bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100
                                                    @elseif($transaction->status == 'pending')
                                                        bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100
                                                    @else
                                                        bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100 @endif">
                                                    {{ ucfirst($transaction->status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-gray-800 border border-gray-200 dark:text-gray-300">
                                                {{ $transaction->updated_at->format('Y-m-d H:i:s') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
