{{-- @extends('layouts.app')
@section('content')

    <body class="items-center justify-center">
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

                    <div class="max-w-6xl p-6 mx-auto bg-white rounded-lg shadow-md">
                        <h1 class="mb-1 text-3xl font-bold">
                            Dashboard
                        </h1>
                    </div>

                    <br>
                    <!-- Search Bar -->
                    <div class="items-center justify-center w-full max-w-2xl p-2">
                        <div class="relative items-center">
                            <input type="text"
                                class="w-full p-4 pl-10 text-gray-700 placeholder-gray-600 bg-gray-200 rounded-full focus:outline-none"
                                placeholder="Search Model/Category">
                            <i class="absolute text-gray-600 transform -translate-y-1/2 fas fa-search left-4 top-1/2"></i>
                        </div>
                    </div>
                    
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h2 class="mb-4 text-xl font-bold">
                            Our Products
                        </h2>

                        <body class="bg-gray-100">
                            <div class="container py-8 mx-auto">
                                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                                    <!-- Product Card -->
                                    <div class="p-4 bg-white rounded-lg shadow-md">
                                        <img alt="Product Image" class="object-cover w-full h-64 mb-4" height="300"
                                            src="https://storage.googleapis.com/a1aa/image/GcRapuaXGlZqKdZa4GVQeRoR3aH1Ixn9cxHpJNZsH8Fub58JA.jpg"
                                            width="300" />
                                        <h2 class="mb-2 text-lg font-semibold">
                                            Product Name
                                        </h2>
                                        <p class="mb-4 text-gray-700">
                                            PRICE : XX,XXX,XXX
                                        </p>
                                        <button class="px-4 py-2 mb-2 text-white bg-blue-500 rounded-lg">
                                            Add to Cart
                                        </button>
                                        <p class="text-blue-500">
                                            Learn More &gt;&gt;
                                        </p>
                                    </div>
                                    <!-- Repeat the product card 15 times -->
                                    <div class="p-4 bg-white rounded-lg shadow-md">
                                        <img alt="Product Image" class="object-cover w-full h-64 mb-4" height="300"
                                            src="https://storage.googleapis.com/a1aa/image/GcRapuaXGlZqKdZa4GVQeRoR3aH1Ixn9cxHpJNZsH8Fub58JA.jpg"
                                            width="300" />
                                        <h2 class="mb-2 text-lg font-semibold">
                                            Product Name
                                        </h2>
                                        <p class="mb-4 text-gray-700">
                                            PRICE : XX,XXX,XXX
                                        </p>
                                        <button class="px-4 py-2 mb-2 text-white bg-blue-500 rounded-lg">
                                            Add to Cart
                                        </button>
                                        <p class="text-blue-500">
                                            Learn More &gt;&gt;
                                        </p>
                                    </div>
                                    <div class="p-4 bg-white rounded-lg shadow-md">
                                        <img alt="Product Image" class="object-cover w-full h-64 mb-4" height="300"
                                            src="https://storage.googleapis.com/a1aa/image/GcRapuaXGlZqKdZa4GVQeRoR3aH1Ixn9cxHpJNZsH8Fub58JA.jpg"
                                            width="300" />
                                        <h2 class="mb-2 text-lg font-semibold">
                                            Product Name
                                        </h2>
                                        <p class="mb-4 text-gray-700">
                                            PRICE : XX,XXX,XXX
                                        </p>
                                        <button class="px-4 py-2 mb-2 text-white bg-blue-500 rounded-lg">
                                            Add to Cart
                                        </button>
                                        <p class="text-blue-500">
                                            Learn More &gt;&gt;
                                        </p>
                                    </div>
                                    <div class="p-4 bg-white rounded-lg shadow-md">
                                        <img alt="Product Image" class="object-cover w-full h-64 mb-4" height="300"
                                            src="https://storage.googleapis.com/a1aa/image/GcRapuaXGlZqKdZa4GVQeRoR3aH1Ixn9cxHpJNZsH8Fub58JA.jpg"
                                            width="300" />
                                        <h2 class="mb-2 text-lg font-semibold">
                                            Product Name
                                        </h2>
                                        <p class="mb-4 text-gray-700">
                                            PRICE : XX,XXX,XXX
                                        </p>
                                        <button class="px-4 py-2 mb-2 text-white bg-blue-500 rounded-lg">
                                            Add to Cart
                                        </button>
                                        <p class="text-blue-500">
                                            Learn More &gt;&gt;
                                        </p>
                                    </div>
                                    <div class="p-4 bg-white rounded-lg shadow-md">
                                        <img alt="Product Image" class="object-cover w-full h-64 mb-4" height="300"
                                            src="https://storage.googleapis.com/a1aa/image/GcRapuaXGlZqKdZa4GVQeRoR3aH1Ixn9cxHpJNZsH8Fub58JA.jpg"
                                            width="300" />
                                        <h2 class="mb-2 text-lg font-semibold">
                                            Product Name
                                        </h2>
                                        <p class="mb-4 text-gray-700">
                                            PRICE : XX,XXX,XXX
                                        </p>
                                        <button class="px-4 py-2 mb-2 text-white bg-blue-500 rounded-lg">
                                            Add to Cart
                                        </button>
                                        <p class="text-blue-500">
                                            Learn More &gt;&gt;
                                        </p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </body>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection


 --}}

@extends('layouts.app')

@section('content')
    @if (session('success'))
        <script>
            setTimeout(function() {
                document.getElementById('success-notification').style.display = 'none';
            }, 3000); // 3 detik
        </script>
    @endif

    <body class="items-center justify-center">
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="max-w-6xl p-6 mx-auto bg-white rounded-lg shadow-md">
                        <h1 class="mb-1 text-3xl font-bold">
                            Dashboard
                        </h1>


                        <br>

                        <!-- Dropdown Filter Category -->
                        {{-- <form method="GET" action="{{ url()->current() }}" class="mb-6">
                        <select name="category_id" class="p-2 border border-gray-300 rounded-md">
                            <option value="">Show All Products</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ $categoryId == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md">Filter</button>
                    </form> --}}

                        <!-- Dropdown Filter Category -->
                        {{-- <form id="category-filter-form" method="GET" action="{{ url()->current() }}" class="mb-6">
                            <select name="category_id" class="p-2 border border-gray-300 rounded-md"
                                onchange="document.getElementById('category-filter-form').submit()">
                                <option value="">Show All Products</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $categoryId == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </form> --}}

                        <!-- Dropdown Filter Category -->
                        <form id="category-filter-form" method="GET" action="{{ url()->current() }}" class="mb-6">
                            <select name="category_id"
                                class="w-64 p-3 text-gray-700 bg-gray-100 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                onchange="document.getElementById('category-filter-form').submit()">
                                <option value="" class="text-gray-400">Show All Products</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $categoryId == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </form>



                        <!-- Search Bar -->
                        {{-- <div class="items-center justify-center w-full max-w-2xl p-2">
                        <div class="relative items-center">
                            <input type="text"
                                class="w-full p-4 pl-10 text-gray-700 placeholder-gray-600 bg-gray-200 rounded-full focus:outline-none"
                                placeholder="Search Model/Category">
                            <i class="absolute text-gray-600 transform -translate-y-1/2 fas fa-search left-4 top-1/2"></i>
                        </div>
                    </div> --}}

                        <div class="p-6 bg-white rounded-lg shadow-md">
                            <h2 class="mb-4 text-xl font-bold">
                                Our Products
                            </h2>

                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                                @foreach ($products as $product)
                                    <!-- Product Card -->
                                    <div class="p-4 bg-white rounded-lg shadow-md">
                                        <img alt="Product Image" class="object-cover w-full h-64 mb-4"
                                            src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('img/avatar.png') }}" />
                                        <h2 class="mb-2 text-lg font-semibold">
                                            {{ $product->product_name }}
                                        </h2>
                                        <p class="mb-4 text-gray-700">
                                            PRICE : {{ number_format($product->price, 2) }}
                                        </p>
                                        <button class="px-4 py-2 mb-2 text-white bg-blue-500 rounded-lg">
                                            Add to Cart
                                        </button>
                                        <div>
                                            <button class="text-blue-500" onclick="openPopup({{ $product->id }})">
                                                Learn More &gt;&gt;
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Popup Detail -->
            {{-- <div id="popup" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-50"> --}}
            {{-- <div class="w-1/2 max-h-screen p-6 overflow-y-auto bg-white rounded-lg shadow-lg"> --}}
            {{-- <button class="absolute font-bold text-red-500 right-4 top-4" onclick="closePopup()">X</button> --}}
            {{-- <img id="popup-photo" class="object-cover w-full h-64 mb-4" /> --}}
            {{-- <h2 id="popup-name" class="mb-2 text-xl font-semibold"></h2> --}}
            {{-- <p id="popup-description" class="mb-4 overflow-y-auto text-gray-700 max-h-40"></p> --}}
            {{-- <ul> --}}
            {{-- <li><strong>Brand:</strong> <span id="popup-brand"></span></li> --}}
            {{-- <li><strong>CPU:</strong> <span id="popup-cpu"></span></li> --}}
            {{-- <li><strong>GPU:</strong> <span id="popup-gpu"></span></li> --}}
            {{-- <li><strong>Memory:</strong> <span id="popup-memory"></span></li> --}}
            {{-- <li><strong>Storage:</strong> <span id="popup-storage"></span></li> --}}
            {{-- <li><strong>Stock:</strong> <span id="popup-stock"></span></li> --}}
            {{-- <li><strong>Price:</strong> <span id="popup-price"></span></li> --}}
            {{-- </ul> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            <!-- Popup Detail -->
            <!-- Popup Detail -->
            <!-- Popup Detail -->
            <div id="popup"
                class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
                <div class="relative w-1/2 max-h-screen p-6 overflow-y-auto bg-white rounded-lg shadow-lg">
                    <!-- Close Button -->
                    <button
                        class="absolute flex items-center justify-center w-8 h-8 text-white bg-red-500 rounded-full right-4 top-4"
                        onclick="closePopup()">X</button>

                    <!-- Image -->
                    <img id="popup-photo" class="object-cover w-full h-64 mb-4" />

                    <!-- Product Name -->
                    <h2 id="popup-name" class="mb-2 text-xl font-semibold"></h2>

                    <!-- Description -->
                    <div class="mb-4 overflow-y-auto max-h-40">
                        <p id="popup-description" class="text-gray-700"></p>
                    </div>

                    <!-- Other Details -->
                    <ul class="space-y-2">
                        <li><strong>Brand:</strong> <span id="popup-brand"></span></li>
                        <li><strong>CPU:</strong> <span id="popup-cpu"></span></li>
                        <li><strong>GPU:</strong> <span id="popup-gpu"></span></li>
                        <li><strong>Memory:</strong> <span id="popup-memory"></span></li>
                        <li><strong>Storage:</strong> <span id="popup-storage"></span></li>
                        <li><strong>Stock:</strong> <span id="popup-stock"></span></li>
                        <li><strong>Price:</strong> <span id="popup-price"></span></li>
                    </ul>
                </div>
            </div>
        </div>
        <script>
            const products = @json($products);

            function openPopup(productId) {
                const product = products.find(p => p.id === productId);

                if (product) {
                    document.getElementById('popup-photo').src = `/storage/${product.photo}`;
                    document.getElementById('popup-name').textContent = product.product_name;
                    document.getElementById('popup-description').textContent = product.description;
                    document.getElementById('popup-brand').textContent = product.brand;
                    document.getElementById('popup-cpu').textContent = product.cpu;
                    document.getElementById('popup-gpu').textContent = product.gpu;
                    document.getElementById('popup-memory').textContent = product.memory;
                    document.getElementById('popup-storage').textContent = product.storage;
                    document.getElementById('popup-stock').textContent = product.stock;
                    document.getElementById('popup-price').textContent = `IDR ${parseFloat(product.price).toLocaleString()}`;

                    document.getElementById('popup').classList.remove('hidden');
                }
            }

            function closePopup() {
                document.getElementById('popup').classList.add('hidden');
            }
        </script>
    </body>
@endsection
@if (session('success'))
    <script>
        setTimeout(function() {
            document.getElementById('success-notification').style.display = 'none';
        }, 3000); // 3 detik
    </script>
@endif
