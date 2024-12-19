<footer class="py-12 text-gray-800 bg-white shadow-lg dark:bg-gray-800 dark:text-gray-200">
    <div class="container px-6 mx-auto">
        <!-- Section: Solutions -->
        <div class="mb-10 text-center">
            <h2 class="mb-6 text-2xl font-bold tracking-wide">Our Solutions</h2>

        </div>

        <!-- Divider -->
        <div class="mb-8 border-t border-gray-300 dark:border-gray-700"></div>

        <!-- Footer Links -->
        <div class="grid items-center justify-center grid-cols-1 gap-8 text-center sm:grid-cols-2 lg:grid-cols-2">
            <!-- Column 1 -->
            <div>
                <h3 class="mb-4 text-lg font-semibold">WFDGP3 STORE</h3>
                <ul class="space-y-2">
                    <li><button class="hover:underline hover:text-blue-500" onclick="showContent('about')">About</button>
                    </li>
                    <li><button class="hover:underline hover:text-blue-500"
                            onclick="showContent('clients')">Clients</button></li>
                    <li><button class="hover:underline hover:text-blue-500"
                            onclick="showContent('career')">Career</button></li>
                </ul>
            </div>
            <!-- Column 2 -->
            <div>
                <h3 class="mb-4 text-lg font-semibold">Legal</h3>
                <ul class="space-y-2">
                    <li><button class="hover:underline hover:text-blue-500" onclick="showContent('privacy')">Privacy
                            Policy</button></li>
                    <li><button class="hover:underline hover:text-blue-500" onclick="showContent('terms')">Terms of
                            Use</button></li>
                </ul>
            </div>
        </div>

        <!-- konten berubah berdasarkan tombol yang diklik -->
        <div id="contentArea" class="p-4 mt-8 border rounded-md">
            <p id="contentText">Pilih sebuah menu untuk melihat informasi.</p>
        </div>

        <!-- Divider -->
        <div class="my-8 border-t border-gray-300 dark:border-gray-700"></div>

        <!-- Footer Bottom -->
        <div class="flex flex-col items-center justify-center text-sm sm:flex-row">
            <p>© 2024 WFDGP3 STORE. All Rights Reserved.</p>
        </div>
    </div>
</footer>
<script>
    function showContent(section) {
        var contentText = document.getElementById("contentText");

        switch (section) {
            case 'about':
                contentText.innerHTML =
                    "WFDGP3 Store adalah toko komputer dan laptop yang melayani berbagai kebutuhan perangkat teknologi. Kami berkomitmen untuk menyediakan produk berkualitas dengan layanan pelanggan terbaik.";
                break;
            case 'clients':
                contentText.innerHTML =
                    "Kami telah melayani berbagai perusahaan dan individu. Klien kami mencakup perusahaan IT, institusi pendidikan, serta pengguna pribadi yang mencari perangkat berkualitas.";
                break;
            case 'career':
                contentText.innerHTML =
                    "Saat ini kami membuka kesempatan untuk bergabung dengan tim kami. Kami mencari orang-orang yang berbakat di bidang penjualan, pemasaran, dan dukungan pelanggan.";
                break;
            case 'privacy':
                contentText.innerHTML =
                    "Kami menjaga kerahasiaan data Anda dengan serius. Kebijakan privasi kami menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi Anda.";
                break;
            case 'terms':
                contentText.innerHTML =
                    "Ketentuan penggunaan kami mengatur bagaimana Anda dapat menggunakan situs web kami, termasuk hak dan kewajiban Anda sebagai pengguna.";
                break;
            default:
                contentText.innerHTML = "Pilih sebuah menu untuk melihat informasi.";
                break;
        }
    }
</script>
