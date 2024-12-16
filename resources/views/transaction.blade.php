{{-- @extends('layouts.app')

@section('content')
<div class="container py-8 mx-auto">
    <h1 class="mb-6 text-2xl font-bold">Daftar Transaksi</h1>

    @if ($transactions->isEmpty())
    <p class="text-gray-500">Belum ada transaksi.</p>
    @else
    <table class="w-full border border-collapse border-gray-200 table-auto">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 border border-gray-300">Order ID</th>
                <th class="px-4 py-2 border border-gray-300">Total</th>
                <th class="px-4 py-2 border border-gray-300">Status</th>
                <th class="px-4 py-2 border border-gray-300">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr>
                <td class="px-4 py-2 border border-gray-300">{{ $transaction->order_id }}</td>
                <td class="px-4 py-2 border border-gray-300">Rp{{ number_format($transaction->gross_amount, 0, ',', '.') }}</td>
                <td class="px-4 py-2 border border-gray-300">{{ $transaction->status }}</td>
                <td class="px-4 py-2 border border-gray-300">
                    <form action="{{ route('transactions.cancel', $transaction->id) }}" method="POST" onsubmit="return confirm('Yakin ingin membatalkan transaksi ini?');">
                        @csrf
                        <button type="submit" class="px-2 py-1 font-bold text-white bg-red-500 rounded hover:bg-red-700">
                            Batalkan
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection --}}

{{-- @extends('layouts.app') --}}
{{--  --}}
{{-- @section('content') --}}
    {{-- <div class="container mt-5"> --}}
        {{-- <h1>Your Transactions</h1> --}}
        {{-- <div class="card"> --}}
            {{-- <div class="card-body"> --}}
                {{-- <table class="table"> --}}
                    {{-- <thead> --}}
                        {{-- <tr> --}}
                            {{-- <th>Order ID</th> --}}
                            {{-- <th>Gross Amount</th> --}}
                            {{-- <th>Status</th> --}}
                            {{-- <th>Action</th> --}}
                        {{-- </tr> --}}
                    {{-- </thead> --}}
                    {{-- <tbody> --}}
                        {{-- @foreach ($transactions as $transaction) --}}
                            {{-- <tr> --}}
                                {{-- <td>{{ $transaction->order_id }}</td> --}}
                                {{-- <td>Rp {{ number_format($transaction->gross_amount, 0, ',', '.') }}</td> --}}
                                {{-- <td>{{ ucfirst($transaction->status) }}</td> --}}
                                {{-- {{-- <td> --}}
                                    {{-- {{ ucfirst($transaction->status) }} --}}
                                    {{-- @if ($transaction->status == 'pending') --}}
                                        {{-- <form action="{{ route('transactions.sync', $transaction->id) }}" method="POST" --}}
                                            {{-- style="display:inline;"> --}}
                                            {{-- @csrf --}}
                                            {{-- <button type="submit" class="btn btn-info btn-sm">Sync Status</button> --}}
                                        {{-- </form> --}}
                                    {{-- @endif --}}
                                {{-- </td> --}} 
{{--  --}}
                                {{-- <td> --}}
                                    {{-- @if ($transaction->status == 'pending') --}}
                                        {{-- <form action="{{ route('transactions.cancel', $transaction->id) }}" method="POST"> --}}
                                            {{-- @csrf --}}
                                            {{-- <button class="btn btn-danger btn-sm">Cancel</button> --}}
                                        {{-- </form> --}}
                                    {{-- @else --}}
                                        {{-- <button class="btn btn-secondary btn-sm" disabled>No Action</button> --}}
                                    {{-- @endif --}}
                                {{-- </td> --}}
                            {{-- </tr> --}}
                        {{-- @endforeach --}}
                    {{-- </tbody> --}}
                {{-- </table> --}}
            {{-- </div> --}}
        {{-- </div> --}}
    {{-- </div> --}}
{{-- @endsection --}}

{{-- @extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="container mx-auto mt-5">
        <h1 class="mb-4 text-3xl font-semibold">Your Transactions</h1>
        <div class="overflow-hidden bg-white rounded-lg shadow-lg">
            <div class="p-6">
                <table class="min-w-full text-sm text-left table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 font-medium text-gray-700">Order ID</th>
                            <th class="px-6 py-3 font-medium text-gray-700">Gross Amount</th>
                            <th class="px-6 py-3 font-medium text-gray-700">Status</th>
                            <th class="px-6 py-3 font-medium text-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $transaction->order_id }}</td>
                                <td class="px-6 py-4">Rp {{ number_format($transaction->gross_amount, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 capitalize">{{ $transaction->status }}</td>
                                <td class="px-6 py-4">
                                    @if ($transaction->status == 'pending')
                                        <form action="{{ route('transactions.cancel', $transaction->id) }}" method="POST">
                                            @csrf
                                            <button class="px-4 py-2 font-semibold text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">Cancel</button>
                                        </form>
                                    @else
                                        <button class="px-4 py-2 font-semibold text-gray-700 bg-gray-300 rounded-lg cursor-not-allowed" disabled>No Action</button>
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
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="container mx-auto mt-5">
        <h1 class="mb-4 text-3xl font-semibold">Manage Transactions</h1>
        <div class="overflow-hidden bg-white rounded-lg shadow-lg">
            <div class="p-6">
                <table class="min-w-full text-sm text-left table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 font-medium text-gray-700">Order ID</th>
                            <th class="px-6 py-3 font-medium text-gray-700">Gross Amount</th>
                            <th class="px-6 py-3 font-medium text-gray-700">Status</th>
                            <th class="px-6 py-3 font-medium text-gray-700">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $transaction->order_id }}</td>
                                <td class="px-6 py-4">Rp {{ number_format($transaction->gross_amount, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 capitalize">{{ $transaction->status }}</td>
                                <td class="flex gap-2 px-6 py-4">
                                    @if ($transaction->status == 'pending')
                                        <form action="{{ route('transactions.confirm', $transaction->id) }}" method="POST">
                                            @csrf
                                            <button class="px-4 py-2 font-semibold text-white bg-green-500 rounded-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">Confirm</button>
                                        </form>
                                        <form action="{{ route('transactions.cancel', $transaction->id) }}" method="POST">
                                            @csrf
                                            <button class="px-4 py-2 font-semibold text-white bg-red-500 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">Cancel</button>
                                        </form>
                                    @else
                                        <button class="px-4 py-2 font-semibold text-gray-700 bg-gray-300 rounded-lg cursor-not-allowed" disabled>No Action</button>
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










