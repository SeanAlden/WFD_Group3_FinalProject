@extends('layouts.app')
@section('content')

    <body>
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="mx-auto max-w-6xl rounded-lg bg-white p-6 shadow-md">
                        <h1 class="mb-6 text-3xl font-bold">
                            Dashboard
                        </h1>
                        <div class="mb-6 grid grid-cols-1 gap-6 md:grid-cols-3">
                            <div class="flex items-center justify-between rounded-lg bg-white p-6 shadow-md">
                                {{-- <div>
                                    <h2 class="text-xl font-bold">
                                        Total Sales
                                    </h2>
                                    <p>
                                        Total: X
                                    </p>
                                </div> --}}
                                @foreach ($results as $result)
                                    <div>
                                        <h2 class="text-xl font-bold">Total Sales</h2>
                                        <p>Total: {{ $result->total_completed_transactions }}</p>
                                    </div>
                                    <i class="fas fa-shopping-cart text-3xl">
                                    </i>
                            </div>
                            <div class="flex items-center justify-between rounded-lg bg-white p-6 shadow-md">
                                {{-- <div>
                                    <h2 class="text-xl font-bold">
                                        Total Income
                                    </h2>
                                    <p>
                                        Rp X,XXX,XXX
                                    </p>
                                </div> --}}
                                <div>
                                    <h2 class="text-xl font-bold">Total Income</h2>
                                    {{-- <p>Rp {{ number_format($totalIncome, 0, ',', '.') }}</p> --}}
                                    <p>Rp {{ $result->total_cost }}</p>
                                </div>
                                <i class="fas fa-wallet text-3xl">
                                </i>
                            </div>
                            @endforeach

                            {{-- @foreach ($totalUsers as $totalUser) --}}
                            <div class="flex items-center justify-between rounded-lg bg-white p-6 shadow-md">
                                {{-- <div>
                                    <h2 class="text-xl font-bold">
                                        Total User
                                    </h2>
                                    <p>
                                        XXXX
                                    </p>
                                </div> --}}
                                <div>
                                    <h2 class="text-xl font-bold">Total Users</h2>
                                    <p>{{ $totalUsers }}</p>
                                </div>
                                <i class="fas fa-user text-3xl">
                                </i>
                            </div>
                            {{-- @endforeach --}}

                        </div>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">

                            <div class="rounded-lg bg-white p-6 shadow-md">
                                <h2 class="mb-4 text-xl font-bold">
                                    Recents Orders
                                </h2>
                                <table class="w-full text-left">
                                    <thead>
                                        <tr>
                                            <th class="border-b-2 p-2">
                                                Product ID
                                            </th>
                                            <th class="border-b-2 p-2">
                                                Product
                                            </th>
                                            <th class="border-b-2 p-2">
                                                Price
                                            </th>
                                            <th class="border-b-2 p-2">
                                                Quantity
                                            </th>
                                            <th class="border-b-2 p-2">
                                                Total Price
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $cart)
                                            <tr>
                                                <td class="border-b p-2">
                                                    {{ $cart->product_id }}
                                                </td>
                                                <td class="flex items-center border-b p-2">
                                                    <img alt="Product Image" class="mr-2 h-10 w-10" height="50" w-10 rounded
                                                        src="{{ $cart->product->photo ? asset('storage/' . $cart->product->photo) : asset('img/avatar.png') }}" />
                                                    {{ $cart->product->product_name }}
                                                </td>
                                                <td class="border-b p-2">
                                                    {{ $cart->product->price }}
                                                </td>
                                                <td class="border-b p-2">
                                                    {{ $cart->quantity }}
                                                </td>
                                                <td class="border-b p-2">
                                                    {{ $cart->product->price * $cart->quantity }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- <tr>
                                            <td class="border-b p-2">
                                                XXXX
                                            </td>
                                            <td class="flex items-center border-b p-2">
                                                <img alt="Product Image" class="mr-2 h-10 w-10" height="50"
                                                    src="https://storage.googleapis.com/a1aa/image/4SotcyoDR6oxPBmzJffasVeGUccW6AM2JxBXsemCpWu0PEmPB.jpg"
                                                    width="50" />
                                                Product Name
                                            </td>
                                            <td class="border-b p-2">
                                                Rp XXXX
                                            </td>
                                            <td class="border-b p-2">
                                                XX
                                            </td>
                                            <td class="border-b p-2">
                                                Rp XXXX
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-b p-2">
                                                XXXX
                                            </td>
                                            <td class="flex items-center border-b p-2">
                                                <img alt="Product Image" class="mr-2 h-10 w-10" height="50"
                                                    src="https://storage.googleapis.com/a1aa/image/4SotcyoDR6oxPBmzJffasVeGUccW6AM2JxBXsemCpWu0PEmPB.jpg"
                                                    width="50" />
                                                Product Name
                                            </td>
                                            <td class="border-b p-2">
                                                Rp XXXX
                                            </td>
                                            <td class="border-b p-2">
                                                XX
                                            </td>
                                            <td class="border-b p-2">
                                                Rp XXXX
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border-b p-2">
                                                XXXX
                                            </td>
                                            <td class="flex items-center border-b p-2">
                                                <img alt="Product Image" class="mr-2 h-10 w-10" height="50"
                                                    src="https://storage.googleapis.com/a1aa/image/4SotcyoDR6oxPBmzJffasVeGUccW6AM2JxBXsemCpWu0PEmPB.jpg"
                                                    width="50" />
                                                Product Name
                                            </td>
                                            <td class="border-b p-2">
                                                Rp XXXX
                                            </td>
                                            <td class="border-b p-2">
                                                XX
                                            </td>
                                            <td class="border-b p-2">
                                                Rp XXXX
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                            <div class="rounded-lg bg-white p-6 shadow-md">
                                <h2 class="mb-4 text-xl font-bold">
                                    Top Products
                                </h2>
                                @foreach ($products as $product)
                                <div class="mb-4 flex items-center">
                                    <img alt="Product Image" class="mr-2 h-10 w-10" height="50" w-10 rounded
                                                        src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('img/avatar.png') }}" />
                                    <div>
                                        <p>
                                            {{ $product->product_name }}
                                        </p>
                                        <p>
                                            {{ $product->price }}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                                
                                {{-- <div class="mb-4 flex items-center">
                                    <img alt="Best Seller Product Image" class="mr-4 h-10 w-10" height="50"
                                        src="https://storage.googleapis.com/a1aa/image/ws3omo6N1w5OAdEFhLQrWC7laNCEiDegbgLTCsQyGEu9hw8JA.jpg"
                                        width="50" />
                                    <div>
                                        <p>
                                            Product Name
                                        </p>
                                        <p>
                                            Rp XXXX
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center">
                                    <img alt="Best Seller Product Image" class="mr-4 h-10 w-10" height="50"
                                        src="https://storage.googleapis.com/a1aa/image/ws3omo6N1w5OAdEFhLQrWC7laNCEiDegbgLTCsQyGEu9hw8JA.jpg"
                                        width="50" />
                                    <div>
                                        <p>
                                            Product Name
                                        </p>
                                        <p>
                                            Rp XXXX
                                        </p>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
@endsection
