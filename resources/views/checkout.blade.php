{{-- @extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="mb-6 text-2xl font-bold">Checkout</h1>

    <!-- Tabel Item di Keranjang -->
    <div class="mb-8">
        <table class="w-full table-auto border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Produk</th>
                    <th class="border border-gray-300 px-4 py-2">Harga</th>
                    <th class="border border-gray-300 px-4 py-2">Jumlah</th>
                    <th class="border border-gray-300 px-4 py-2">Subtotal</th>
                </tr>   
            </thead>
            <tbody>
                @foreach ($cartItems as $item)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->product->product_name }}</td>
                    <td class="border border-gray-300 px-4 py-2">Rp{{ number_format($item->product->price, 0, ',', '.') }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $item->quantity }}</td>
                    <td class="border border-gray-300 px-4 py-2">Rp{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Total Harga -->
    <div class="mb-6 text-right text-xl font-bold">
        Total: Rp{{ number_format($total, 0, ',', '.') }}
    </div>

    <!-- Form Checkout -->
    <form action="{{ route('checkout.handle') }}" method="POST" class="mb-4 rounded bg-white px-8 pb-8 pt-6 shadow-md">
        @csrf
        <div class="mb-4">
            <label for="first_name" class="mb-2 block text-sm font-bold text-gray-700">Nama Depan</label>
            <input type="text" name="first_name" id="first_name" required class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none">
        </div>

        <div class="mb-4">
            <label for="last_name" class="mb-2 block text-sm font-bold text-gray-700">Nama Belakang</label>
            <input type="text" name="last_name" id="last_name" required class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none">
        </div>

        <div class="mb-4">
            <label for="email" class="mb-2 block text-sm font-bold text-gray-700">Email</label>
            <input type="email" name="email" id="email" required class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none">
        </div>

        <div class="mb-4">
            <label for="phone" class="mb-2 block text-sm font-bold text-gray-700">Nomor Telepon</label>
            <input type="text" name="phone" id="phone" required class="focus:shadow-outline w-full appearance-none rounded border px-3 py-2 leading-tight text-gray-700 shadow focus:outline-none">
        </div>

        <div class="text-right">
            <button type="submit" class="focus:shadow-outline rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none">
                Bayar Sekarang
            </button>
        </div>
    </form>
</div>
@endsection 
<!-- Pastikan script Midtrans Snap ditambahkan di bawah -->
<!-- Javascript untuk memunculkan pop-up Midtrans Snap -->
<script type="text/javascript">
    document.getElementById('pay-button').addEventListener('click', function () {
        var snapToken = '{{ $snap_token }}';  // Pastikan $snap_token berisi token yang valid
        snap.pay(snapToken, {
            onSuccess: function(result) {
                alert("Pembayaran berhasil!");
                console.log(result);
            },
            onPending: function(result) {
                alert("Pembayaran sedang diproses.");
                console.log(result);
            },
            onError: function(result) {
                alert("Terjadi kesalahan dalam pembayaran.");
                console.log(result);
            }
        });
    });
</script>

 --}}

{{-- @extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Checkout</h1>
    <div class="card">
        <div class="card-body">
            <h4>Cart Items</h4>
            <ul class="list-group mb-3">
                @foreach($cartItems as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $item->product->product_name }} (x{{ $item->quantity }})
                        <span>Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>
            <h5>Total: Rp {{ number_format($total, 0, ',', '.') }}</h5>
        </div>
    </div>

    <form id="checkout-form" class="mt-4">
        <h4>Customer Details</h4>
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" required>
        </div>
        <button type="submit" class="btn btn-primary">Confirm</button>
    </form>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-v6-15hiE40WcarUI"></script>
<script>
    document.getElementById('checkout-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(e.target);

        fetch("{{ route('checkout.handle') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.snap_token) {
                snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        alert('Payment Successful');
                        window.location.href = "{{ route('transactions') }}";
                    },
                    onPending: function(result) {
                        alert('Waiting for payment');
                    },
                    onError: function(result) {
                        alert('Payment failed');
                    },
                });
            } else if (data.error) {
                alert(data.error);
            }
        })
        .catch(error => console.error(error));
    });
</script>
@endsection --}}

{{-- @extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Checkout</h1>
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Cart Items</h4>
        </div>
        <div class="card-body">
            <ul class="list-group mb-3">
                @foreach($cartItems as $item)
                <div>
                    <img alt="Product Image" class="h-32 w-32 rounded-md object-cover"
                                src="{{ $item->product->photo ? asset('storage/' . $item->product->photo) : asset('img/avatar.png') }}" />
                </div>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ $item->product->product_name }} <strong>(x{{ $item->quantity }})</strong></span>
                        <span class="text-success">Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</span>
                    </li>
                @endforeach
            </ul>
            <div class="d-flex justify-content-between">
                <h5>Total:</h5>
                <h5 class="text-primary">Rp {{ number_format($total, 0, ',', '.') }}</h5>
            </div>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Customer Details</h4>
        </div>
        <div class="card-body">
            <form id="checkout-form">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg px-5">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script>
    document.getElementById('checkout-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(e.target);

        fetch("{{ route('checkout.handle') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.snap_token) {
                snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        alert('Payment Successful');
                        window.location.href = "{{ route('transactions') }}";
                    },
                    onPending: function(result) {
                        alert('Waiting for payment');
                    },
                    onError: function(result) {
                        alert('Payment failed');
                    },
                });
            } else if (data.error) {
                alert(data.error);
            }
        })
        .catch(error => console.error(error));
    });
</script>
@endsection --}}

@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-10">
    <h1 class="mb-8 text-center text-3xl font-bold text-gray-800">Checkout</h1>

    <!-- Cart Items -->
    <div class="mb-8 rounded-lg bg-white shadow-lg">
        <div class="rounded-t-lg bg-blue-600 px-6 py-3 text-white">
            <h4 class="text-lg font-semibold">Cart Items</h4>
        </div>
        <div class="px-6 py-4">
            <table class="w-full table-auto border-collapse text-left">
                <thead>
                    <tr>
                        <th class="border-b py-2">Image</th>
                        <th class="border-b py-2">Product</th>
                        <th class="border-b py-2 text-center">Quantity</th>
                        <th class="border-b py-2 text-right">Total Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                    <tr>
                        <td class="border-b py-4">
                            <img alt="Product Image" class="h-16 w-16 rounded object-cover"
                                 src="{{ $item->product->photo ? asset('storage/' . $item->product->photo) : asset('img/avatar.png') }}" />
                        </td>
                        <td class="border-b py-4">{{ $item->product->product_name }}</td>
                        <td class="border-b py-4 text-center">x{{ $item->quantity }}</td>
                        <td class="border-b py-4 text-right font-semibold text-green-600">Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4 flex items-center justify-between">
                <h5 class="text-lg font-bold">Total:</h5>
                <h5 class="text-xl font-extrabold text-blue-600">Rp {{ number_format($total, 0, ',', '.') }}</h5>
            </div>
        </div>
    </div>

    <!-- Customer Details -->
    <div class="rounded-lg bg-white shadow-lg">
        <div class="rounded-t-lg bg-gray-800 px-6 py-3 text-white">
            <h4 class="text-lg font-semibold">Customer Details</h4>
        </div>
        <div class="px-6 py-4">
            <form id="checkout-form" class="space-y-6">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="first_name" class="block font-medium text-gray-700">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="w-full rounded-lg border px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="last_name" class="block font-medium text-gray-700">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="w-full rounded-lg border px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="email" class="block font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="w-full rounded-lg border px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label for="phone" class="block font-medium text-gray-700">Phone</label>
                        <input type="text" id="phone" name="phone" class="w-full rounded-lg border px-4 py-2 focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="rounded-lg bg-blue-600 px-6 py-3 text-lg font-semibold text-white shadow hover:bg-blue-700">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script>
    document.getElementById('checkout-form').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(e.target);

        fetch("{{ route('checkout.handle') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.snap_token) {
                snap.pay(data.snap_token, {
                    onSuccess: function(result) {
                        alert('Payment Successful');
                        window.location.href = "{{ route('transactions') }}";
                    },
                    onPending: function(result) {
                        alert('Waiting for payment');
                    },
                    onError: function(result) {
                        alert('Payment failed');
                    },
                });
            } else if (data.error) {
                alert(data.error);
            }
        })
        .catch(error => console.error(error));
    });
</script>
@endsection



