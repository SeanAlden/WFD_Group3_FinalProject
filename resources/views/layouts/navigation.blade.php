 <nav x-data="{ open: false }" class="bg-blue-300 border-b border-gray-100 dark:bg-blue-900 dark:border-gray-700">
     <!-- Primary Navigation Menu -->
     <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
         <div class="flex justify-between h-16">
             <div class="flex items-center">
                 <!-- Logo -->
                 <div class="flex items-center shrink-0">
                     <a href="{{ Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('dashboard') }}">
                         <x-application-logo class="block w-auto text-gray-800 fill-current dark:text-white h-9" />
                        </a>
                        <a class="text-2xl font-semibold text-gray-800 dark:text-white" href="#">WFDGP3 Store</a>
                    </div>
                    
                 <!-- Navigation Links -->
                 <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                     <x-nav-link :href="Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('dashboard')" :active="Auth::user()->usertype == 'admin'
                         ? request()->routeIs('admin.dashboard')
                         : request()->routeIs('dashboard')">
                         <span
                             class="text-gray-700 transition dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">
                             {{ __('Dashboard') }}
                         </span>
                     </x-nav-link>

                     @if (Auth::user()->usertype == 'admin')
                         <x-nav-link href="/admin/product" :active="request()->routeIs('admin.product')">
                             <span
                                 class="text-gray-700 transition dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">
                                 {{ __('Product') }}
                             </span>
                         </x-nav-link>
                         <x-nav-link href="/admin/transactions" :active="request()->routeIs('admin.transactions')">
                             <span
                                 class="text-gray-700 transition dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">
                                 {{ __('Sales Report') }}
                             </span>
                         </x-nav-link>
                         <x-nav-link href="/view/messages" :active="request()->routeIs('view.messages')">
                             <span
                                 class="text-gray-700 transition dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">
                                 {{ __('User Message') }}
                             </span>
                         </x-nav-link>
                     @endif

                     @if (Auth::user()->usertype == 'user')
                         <x-nav-link href="/transactions" :active="request()->routeIs('transactions')">
                             <span
                                 class="text-gray-700 transition dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">
                                 {{ __('Order Page') }}
                             </span>
                         </x-nav-link>
                         <x-nav-link href="/contactus" :active="request()->routeIs('contact.us')">
                             <span
                                 class="text-gray-700 transition dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">
                                 {{ __('Contact Us') }}
                             </span>
                         </x-nav-link>
                     @endif
                 </div>

             </div>

             <!-- Right Section -->
             <div class="hidden sm:ml-6 sm:flex sm:items-center">
                 @if (Auth::user()->usertype == 'user')
                     <a href="/cart" class="flex items-center me-4">
                         <svg class="w-6 h-6 text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-200"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                             stroke-width="2">
                             <path stroke-linecap="round" stroke-linejoin="round"
                                 d="M3 3h2l.4 2M7 13h10l1.6-8H6.4L7 13zm5 8a2 2 0 100-4 2 2 0 000 4zm6 0a2 2 0 100-4 2 2 0 000 4z" />
                         </svg>
                     </a>
                 @endif
                 <!-- Dark Mode Toggle -->
                 <button id="themeToggleBtn" onclick="toggleTheme()"
                     class="flex items-center justify-center w-10 h-10 text-black transition bg-gray-300 rounded-full shadow dark:bg-gray-700 dark:text-white">
                     <i id="themeIcon" class="fas"></i>
                 </button>

                 <!-- User Profile -->
                 <img src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : asset('storage/profile_images/profile.jpg') }}"
                     alt="Profile Image" class="object-cover w-8 h-8 ml-4 rounded-full" />
                 <x-dropdown align="right" width="48">
                     <x-slot name="trigger">
                         <button
                             class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 transition dark:text-gray-300 hover:text-blue-500 dark:hover:text-blue-400">
                             <div>{{ Auth::user()->name }}</div>
                             <div class="ml-1">
                                 <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                     <path fill-rule="evenodd"
                                         d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                         clip-rule="evenodd" />
                                 </svg>
                             </div>
                         </button>
                     </x-slot>
                     <x-slot name="content">
                         <x-dropdown-link :href="route('profile.edit')">
                             {{ __('Profile') }}
                         </x-dropdown-link>
                         <form method="POST" action="{{ route('logout') }}">
                             @csrf
                             <x-dropdown-link :href="route('logout')"
                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                 {{ __('Log Out') }}
                             </x-dropdown-link>
                         </form>
                     </x-slot>

                 </x-dropdown>
             </div>

             <!-- Hamburger -->
             <div class="flex items-center sm:hidden">
                 <button @click="open = ! open"
                     class="inline-flex items-center p-2 text-gray-400 transition dark:text-gray-200 hover:text-gray-500 dark:hover:text-gray-100">
                     <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                         <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                             stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M4 6h16M4 12h16M4 18h16" />
                         <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                             stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                     </svg>
                 </button>
             </div>
         </div>
     </div>

     <!-- Responsive Navigation Menu -->
     <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
         <div class="pt-2 pb-3 space-y-1">
             <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                 {{ __('Dashboard') }}
             </x-responsive-nav-link>
             @if (Auth::user()->usertype == 'admin')
                 <x-responsive-nav-link href="/admin/product" :active="request()->routeIs('admin.product')">
                     {{ __('Product') }}
                 </x-responsive-nav-link>
             @endif
         </div>
     </div>
 </nav>

 <script>
     function toggleTheme() {
         const htmlElement = document.documentElement;
         const themeIcon = document.getElementById('themeIcon');
         htmlElement.classList.toggle('dark');
     }
 </script>
