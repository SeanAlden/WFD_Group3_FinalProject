<nav class="bg-white shadow-md dark:bg-blue-900">
    <div class="container flex items-center justify-between px-6 py-4 mx-auto">
        <a class="text-2xl font-semibold text-gray-800 dark:text-white" href="#">WFDGP3 Store</a>
        <div>
            <a class="text-gray-800 hover:text-blue-600 dark:text-white" href="{{ route('home') }}">Home</a>
        </div>
        <div class="hidden space-x-6 lg:flex" id="navbarSupportedContent">
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}"
                    class="px-4 py-2 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">Login</a>
                <a href="{{ route('register') }}"
                    class="px-4 py-2 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">Register</a>
            </div>
            <button id="themeToggleBtn" onclick="toggleTheme()"
                class="flex items-center justify-center w-10 h-10 text-black transition bg-gray-300 rounded-full shadow dark:bg-gray-700 dark:text-white">
                <i id="themeIcon" class="fas"></i>
            </button>
        </div>
    </div>
</nav>
