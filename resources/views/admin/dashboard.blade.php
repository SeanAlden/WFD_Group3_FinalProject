@extends('layouts.app')
@section('content')
    {{-- <x-app-layout> --}}
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    {{-- <body class="p-6 bg-gray-300"> --}}

    <body>
        {{-- <div class="container mx-auto"> --}}
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    {{-- <div class="p-6 text-gray-900">
                        {{ __("List of Products") }}
                    </div> --}}

                    <div class="max-w-6xl p-6 mx-auto bg-white rounded-lg shadow-md">
                        <h1 class="mb-6 text-3xl font-bold">
                            Dashboard
                        </h1>
                        <div class="grid grid-cols-1 gap-6 mb-6 md:grid-cols-3">
                            <div class="flex items-center justify-between p-6 bg-white rounded-lg shadow-md">
                                <div>
                                    <h2 class="text-xl font-bold">
                                        Total Sales
                                    </h2>
                                    <p>
                                        Total: X
                                    </p>
                                </div>
                                <i class="text-3xl fas fa-shopping-cart">
                                </i>
                            </div>
                            <div class="flex items-center justify-between p-6 bg-white rounded-lg shadow-md">
                                <div>
                                    <h2 class="text-xl font-bold">
                                        Total Income
                                    </h2>
                                    <p>
                                        Rp X,XXX,XXX
                                    </p>
                                </div>
                                <i class="text-3xl fas fa-wallet">
                                </i>
                            </div>
                            <div class="flex items-center justify-between p-6 bg-white rounded-lg shadow-md">
                                <div>
                                    <h2 class="text-xl font-bold">
                                        Total Sessions
                                    </h2>
                                    <p>
                                        XXXX
                                    </p>
                                </div>
                                <i class="text-3xl fas fa-user">
                                </i>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div class="p-6 bg-white rounded-lg shadow-md">
                                <h2 class="mb-4 text-xl font-bold">
                                    Recents Orders
                                </h2>
                                <table class="w-full text-left">
                                    <thead>
                                        <tr>
                                            <th class="p-2 border-b-2">
                                                Transaction ID
                                            </th>
                                            <th class="p-2 border-b-2">
                                                Product
                                            </th>
                                            <th class="p-2 border-b-2">
                                                Price
                                            </th>
                                            <th class="p-2 border-b-2">
                                                Quantity
                                            </th>
                                            <th class="p-2 border-b-2">
                                                Total Price
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="p-2 border-b">
                                                XXXX
                                            </td>
                                            <td class="flex items-center p-2 border-b">
                                                <img alt="Product Image" class="w-10 h-10 mr-2" height="50"
                                                    src="https://storage.googleapis.com/a1aa/image/4SotcyoDR6oxPBmzJffasVeGUccW6AM2JxBXsemCpWu0PEmPB.jpg"
                                                    width="50" />
                                                Product Name
                                            </td>
                                            <td class="p-2 border-b">
                                                Rp XXXX
                                            </td>
                                            <td class="p-2 border-b">
                                                XX
                                            </td>
                                            <td class="p-2 border-b">
                                                Rp XXXX
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 border-b">
                                                XXXX
                                            </td>
                                            <td class="flex items-center p-2 border-b">
                                                <img alt="Product Image" class="w-10 h-10 mr-2" height="50"
                                                    src="https://storage.googleapis.com/a1aa/image/4SotcyoDR6oxPBmzJffasVeGUccW6AM2JxBXsemCpWu0PEmPB.jpg"
                                                    width="50" />
                                                Product Name
                                            </td>
                                            <td class="p-2 border-b">
                                                Rp XXXX
                                            </td>
                                            <td class="p-2 border-b">
                                                XX
                                            </td>
                                            <td class="p-2 border-b">
                                                Rp XXXX
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 border-b">
                                                XXXX
                                            </td>
                                            <td class="flex items-center p-2 border-b">
                                                <img alt="Product Image" class="w-10 h-10 mr-2" height="50"
                                                    src="https://storage.googleapis.com/a1aa/image/4SotcyoDR6oxPBmzJffasVeGUccW6AM2JxBXsemCpWu0PEmPB.jpg"
                                                    width="50" />
                                                Product Name
                                            </td>
                                            <td class="p-2 border-b">
                                                Rp XXXX
                                            </td>
                                            <td class="p-2 border-b">
                                                XX
                                            </td>
                                            <td class="p-2 border-b">
                                                Rp XXXX
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-2 border-b">
                                                XXXX
                                            </td>
                                            <td class="flex items-center p-2 border-b">
                                                <img alt="Product Image" class="w-10 h-10 mr-2" height="50"
                                                    src="https://storage.googleapis.com/a1aa/image/4SotcyoDR6oxPBmzJffasVeGUccW6AM2JxBXsemCpWu0PEmPB.jpg"
                                                    width="50" />
                                                Product Name
                                            </td>
                                            <td class="p-2 border-b">
                                                Rp XXXX
                                            </td>
                                            <td class="p-2 border-b">
                                                XX
                                            </td>
                                            <td class="p-2 border-b">
                                                Rp XXXX
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="p-6 bg-white rounded-lg shadow-md">
                                <h2 class="mb-4 text-xl font-bold">
                                    Best Seller Products
                                </h2>
                                <div class="flex items-center mb-4">
                                    <img alt="Best Seller Product Image" class="w-10 h-10 mr-4" height="50"
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
                                <div class="flex items-center mb-4">
                                    <img alt="Best Seller Product Image" class="w-10 h-10 mr-4" height="50"
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
                                    <img alt="Best Seller Product Image" class="w-10 h-10 mr-4" height="50"
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
                            </div>
                        </div>
                    </div>
                    {{-- <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ __("You're logged in!") }}
                    </div>
                </div>
            </div>
        </div> --}}
                </div>
            </div>
    </body>
@endsection



{{-- </x-app-layout> --}}
