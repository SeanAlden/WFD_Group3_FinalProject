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

                        <!-- Section Berita -->
                        <div class="mt-8">
                            <h2 class="mb-4 text-xl font-bold text-gray-800 ">Latest Computer News</h2>

                            <!-- Slider Berita -->
                            <div class="relative w-full overflow-hidden h-72">
                                <!-- Container Scroll -->
                                <div id="news-slider"
                                    class="flex w-full h-full overflow-x-auto snap-x snap-mandatory scrollbar-hide">
                                    <!-- Placeholder saat API belum dimuat -->
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 w-full h-full bg-gray-100 rounded-lg shadow-md dark:bg-gray-800">
                                        <p class="text-gray-500 dark:text-gray-300">Loading news...</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

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
                                        {{-- <button class="px-4 py-2 mb-2 text-white bg-blue-500 rounded-lg">
                                            Add to Cart
                                        </button> --}}

                                        <button class="px-4 py-2 mb-2 text-white bg-blue-500 rounded-lg"
                                            onclick="showAddToCartPopup({{ $product->id }})">
                                            Add to Cart
                                        </button>

                                        {{-- Pop-Up Cart --}}
                                        {{-- <div id="add-to-cart-popup" --}}
                                        {{-- class="fixed inset-0 z-50 items-center justify-center hidden bg-gray-800 bg-opacity-50"> --}}
                                        {{-- <div class="relative w-1/3 p-6 bg-white rounded-lg shadow-lg"> --}}
                                        {{-- <h3 class="mb-4 text-xl font-semibold">Add to Cart Confirmation</h3> --}}
                                        <p id="popup-product-description" class="mb-4 text-gray-700"></p>
                                        {{-- <p><strong>Price:</strong> <span id="popup-product-price"></span></p> --}}
                                        {{-- <p><strong>Stock:</strong> <span id="popup-product-stock"></span></p> --}}
                                        {{-- <div class="flex justify-end mt-6"> --}}
                                        {{-- <button class="px-4 py-2 mr-2 text-gray-700 bg-gray-200 rounded-lg" --}}
                                        {{-- onclick="closeAddToCartPopup()">No</button> --}}
                                        {{-- <button class="px-4 py-2 text-white bg-blue-500 rounded-lg" --}}
                                        {{-- onclick="addToCart()">Yes</button> --}}
                                        {{-- </div> --}}
                                        {{-- </div> --}}
                                        {{-- </div> --}}

                                        <div id="add-to-cart-popup"
                                            class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
                                            <div class="relative w-1/3 p-6 bg-white rounded-lg shadow-lg">
                                                <h3 class="mb-4 text-xl font-semibold">Add to Cart Confirmation</h3>
                                                {{-- <p id="popup-product-description" class="mb-4 text-gray-700"></p> --}}
                                                <p><strong>Price:</strong> <span id="popup-product-price"></span></p>
                                                <p><strong>Stock:</strong> <span id="popup-product-stock"></span></p>
                                                <div class="flex justify-end mt-6">
                                                    <button class="px-4 py-2 mr-2 text-gray-700 bg-gray-200 rounded-lg"
                                                        onclick="closeAddToCartPopup()">No</button>
                                                    <button class="px-4 py-2 text-white bg-blue-500 rounded-lg"
                                                        onclick="addToCart()">Yes</button>
                                                </div>
                                            </div>
                                        </div>


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
            // let currentProduct = null;
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

            const newsApiUrl = "https://newsapi.org/v2/everything?q=computer&apiKey=16f57f8d0e444696863da47a233e651b";

            const newsSlider = document.getElementById("news-slider");

            // Fetch berita dan render ke slider
            async function fetchNews() {
                try {
                    const response = await fetch(newsApiUrl);
                    const data = await response.json();
                    const articles = data.articles.slice(0, 100); // Ambil 100 berita pertama
                    newsSlider.innerHTML = ""; // Kosongkan placeholder

                    // Render kartu berita
                    articles.forEach((article) => {
                        const newsCard = document.createElement("div");
                        newsCard.className =
                            "flex-shrink-0 w-full h-full snap-start relative cursor-pointer rounded-lg shadow-lg overflow-hidden";

                        newsCard.onclick = () => window.open(article.url, "_blank");

                        newsCard.innerHTML = `
            <!-- Gambar berita -->
            <img
                src="${article.urlToImage || "/img/avatar.png"}"
                alt="News Image"
                class="object-cover w-full h-full"
            />
            <!-- Overlay Judul -->
            <div
                class="absolute inset-0 flex items-end p-4 bg-gradient-to-t from-black/70 via-black/30 to-transparent">
                <h3 class="text-5xl font-bold tracking-wider text-white drop-shadow-lg">
                    ${article.title}
                </h3>
            </div>
        `;

                        newsSlider.appendChild(newsCard);
                    });

                    enableAutoScroll(newsSlider);
                } catch (error) {
                    console.error("Error fetching news:", error);
                    newsSlider.innerHTML = `
        <div
            class="flex items-center justify-center flex-shrink-0 w-full h-full bg-red-100 rounded-lg shadow-md dark:bg-red-800">
            <p class="text-red-500 dark:text-red-300">Failed to load news</p>
        </div>
    `;
                }
            }

            // Fungsi untuk mengaktifkan auto-scroll saat hover
            function enableAutoScroll(container) {
                let isHovering = false;

                // Event listener untuk hover
                container.addEventListener("mouseenter", () => {
                    isHovering = true;
                    autoScroll(container);
                });
                container.addEventListener("mouseleave", () => {
                    isHovering = false;
                });

                // Auto-scroll
                function autoScroll(container) {
                    if (!isHovering) return;

                    const scrollAmount = container.scrollLeft + container.offsetWidth;
                    if (scrollAmount >= container.scrollWidth) {
                        container.scrollTo({
                            left: 0,
                            behavior: "smooth"
                        }); // Reset ke awal jika sudah di akhir
                    } else {
                        container.scrollBy({
                            left: container.offsetWidth,
                            behavior: "smooth"
                        });
                    }

                    setTimeout(() => autoScroll(container), 5000); // Scroll setiap 5 detik
                }
            }

            // Fetch berita saat halaman dimuat
            fetchNews();

            let selectedProductId;

            function showAddToCartPopup(productId) {
                const product = products.find(p => p.id === productId);
                selectedProductId = productId;

                // document.getElementById('popup-product-description').textContent = product.description;
                document.getElementById('popup-product-price').textContent =
                    `IDR ${parseFloat(product.price).toLocaleString()}`;
                document.getElementById('popup-product-stock').textContent = product.stock;

                document.getElementById('add-to-cart-popup').classList.remove('hidden');
            }

            function closeAddToCartPopup() {
                document.getElementById('add-to-cart-popup').classList.add('hidden');
            }

            async function addToCart() {
                try {
                    const response = await fetch(`/cart/add`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            product_id: selectedProductId
                        })
                    });

                    if (response.ok) {
                        alert('Product added to cart successfully!');
                    }
                } catch (error) {
                    console.error('Error adding product to cart:', error);
                }

                closeAddToCartPopup();
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
