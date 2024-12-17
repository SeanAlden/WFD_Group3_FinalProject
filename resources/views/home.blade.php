{{-- @extends('layouts.appguest')

@section('title', 'Home')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>WFDGP 3 STORE</h1>
        </div>
        <div class="col-md-12">
            <div class="row">
                @foreach ($products as $product)
                    <div class="mb-3 col-md-3">
                        <div class="card">
                            <img src="{{ $product['photo'] }}" class="card-img-top" alt="{{ $product['product_name'] }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product['product_name'] }}</h5>
                                <p class="card-text">{{ $product['description'] }}</p>
                                <a href="{{ route('product', $product['id']) }}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection --}}

@extends('layouts.appguest')

@section('title', 'Home')

@section('content')
    {{-- <div class="container py-6 mx-auto"> --}}

    <body class="items-center justify-center dark:bg-gray-900 dark:text-white">
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{-- <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg dark:bg-gray-800"> --}}
                <div class="max-w-6xl p-6 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800">

                    <!-- Section Berita -->
                    <div class="mt-8">
                        <h2 class="mb-4 text-xl font-bold text-gray-800 dark:text-gray-200">Latest Computer News</h2>

                        <!-- Slider Berita -->
                        <div class="relative w-full overflow-hidden h-72">
                            <!-- Container Scroll -->
                            <div id="news-slider"
                                class="flex w-full h-full overflow-x-auto snap-x snap-mandatory scrollbar-hide">
                                <!-- Placeholder saat API belum dimuat -->
                                <div
                                    class="flex items-center justify-center flex-shrink-0 w-full h-full bg-gray-100 rounded-lg shadow-md dark:bg-gray-700">
                                    <p class="text-gray-500 dark:text-gray-300">Loading news...</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>


                    <h2 class="mb-4 text-xl font-bold dark:text-white">
                        Our Products
                    </h2>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                        @foreach ($products as $product)
                            <!-- Product Card -->
                            <div class="p-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <img alt="Product Image" class="object-cover w-full h-64 mb-4"
                                    src="{{ $product->photo ? asset('storage/' . $product->photo) : asset('img/avatar.png') }}" />
                                <h2 class="mb-2 text-lg font-semibold dark:text-white">
                                    {{ $product->product_name }}
                                </h2>
                                <p class="mb-4 text-gray-700 dark:text-gray-400">
                                    PRICE : {{ number_format($product->price, 2) }}
                                </p>
                                <button class="px-4 py-2 mb-2 text-white bg-blue-500 rounded-lg">
                                    <a href="{{ route('product', $product['id']) }}" class="btn btn-primary">Detail</a>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>
    {{-- </div> --}}
@endsection
<script>
    const newsApiUrl = "https://newsapi.org/v2/everything?q=computer&apiKey=16f57f8d0e444696863da47a233e651b";

    const newsSlider = document.getElementById("news-slider");

    // Fetch berita dan render ke slider
    async function fetchNews() {
        try {
            const response = await fetch(newsApiUrl);
            const data = await response.json();
            const articles = data.articles.slice(0, 20); // Ambil 100 berita pertama
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
</script>
