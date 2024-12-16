{{-- @extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="mb-6 text-2xl font-bold">Kelola Transaksi</h1>

    @if ($transactions->isEmpty())
    <p class="text-gray-500">Tidak ada transaksi.</p>
    @else
    <table class="w-full table-auto border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2">Order ID</th>
                <th class="border border-gray-300 px-4 py-2">User ID</th>
                <th class="border border-gray-300 px-4 py-2">Total</th>
                <th class="border border-gray-300 px-4 py-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $transaction->order_id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $transaction->user_id }}</td>
                <td class="border border-gray-300 px-4 py-2">Rp{{ number_format($transaction->gross_amount, 0, ',', '.') }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $transaction->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection --}}

{{-- @extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Manage Transactions</h1>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>User</th>
                        <th>Gross Amount</th>
                        <th>Status</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->order_id }}</td>
                            <td>{{ $transaction->user->name ?? 'Unknown' }}</td>
                            <td>Rp {{ number_format($transaction->gross_amount, 0, ',', '.') }}</td>
                            <td>{{ ucfirst($transaction->status) }}</td>
                            <td>{{ $transaction->updated_at->format('Y-m-d H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="container mx-auto mt-10">
                <h1 class="mb-6 text-3xl font-bold text-gray-800">All Transactions</h1>
                <div class="overflow-hidden rounded-lg bg-white shadow-md">
                    <div class="p-4">
                        <table class="min-w-full table-auto border-collapse border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th
                                        class="border border-gray-200 px-6 py-3 text-left text-sm font-medium uppercase tracking-wider text-gray-700">
                                        Order ID</th>
                                    <th
                                        class="border border-gray-200 px-6 py-3 text-left text-sm font-medium uppercase tracking-wider text-gray-700">
                                        Token</th>
                                    <th
                                        class="border border-gray-200 px-6 py-3 text-left text-sm font-medium uppercase tracking-wider text-gray-700">
                                        Gross Amount</th>
                                    <th
                                        class="border border-gray-200 px-6 py-3 text-left text-sm font-medium uppercase tracking-wider text-gray-700">
                                        Status</th>
                                    <th
                                        class="border border-gray-200 px-6 py-3 text-left text-sm font-medium uppercase tracking-wider text-gray-700">
                                        Updated At</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($transactions as $transaction)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-200 px-6 py-4 text-gray-800">
                                            {{ $transaction->order_id }}</td>
                                        <td class="border border-gray-200 px-6 py-4 text-gray-800">
                                            {{ $transaction->snap_token ?? 'Unknown' }}</td>
                                        <td class="border border-gray-200 px-6 py-4 text-gray-800">Rp
                                            {{ number_format($transaction->gross_amount, 0, ',', '.') }}</td>
                                        <td class="border border-gray-200 px-6 py-4">
                                            <span
                                                class="inline-flex px-3 py-1 rounded-full text-sm font-semibold 
                                @if ($transaction->status == 'completed') bg-green-100 text-green-800
                                @elseif($transaction->status == 'pending')
                                    bg-yellow-100 text-yellow-800
                                @else
                                    bg-red-100 text-red-800 @endif">
                                                {{ ucfirst($transaction->status) }}
                                            </span>
                                        </td>
                                        <td class="border border-gray-200 px-6 py-4 text-gray-800">
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
@endsection
