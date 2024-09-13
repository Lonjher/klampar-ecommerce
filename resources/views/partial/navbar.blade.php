<nav class="fixed top-0 left-0 right-0 z-0 flex items-center justify-between px-5 py-2 bg-white shadow-sm">
    <div class="z-0 flex items-center justify-between w-auto">
        <a href="/" class="w-full">
            <img src="{{ asset('assets/img/logo-batik.png') }}" alt="logo" width="100" class="md:w-32">
        </a>
        {{-- <div class="flex items-center -mr-2 md:hidden">
            <button
                class="inline-flex items-center justify-center p-2 text-gray-400 rounded-md bg-gray-50 hover:text-gray-00 hover:bg-gray-100 5focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-50"
                type="button" aria-expanded="false">
                <span class="sr-only">Menu Utama</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" aria-hidden="true" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div> --}}
    </div>
    <div class="z-0 flex justify-between gap-3 list-none">
        <li>
            <a href="{{ route('home') }}"
                class="text-sm font-normal text-gray-500 transition-colors delay-100 md:text-base hover:text-blue-400">
                Beranda
            </a>
        </li>
        <li>
            <a href="{{ route('reservation.create') }}"
                class="text-sm font-normal text-gray-500 transition-colors delay-100 md:text-base hover:text-blue-400">Pemesanan
            </a>
        </li>
        <li>
            <a href="#"
                class="text-sm font-normal text-gray-500 transition-colors delay-100 md:text-base hover:text-blue-400">Tentang
            </a>
        </li>
    </div>
    <div class="z-0">
        <a href="#"
            class="px-5 py-2 mb-2 text-sm text-gray-900 bg-white border border-gray-200 rounded-lg me-2 focus:outline-none hover:bg-gray-100 hover:text-blue-00 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Register</a>
        <a href="{{ route('login') }}"
            class="py-2 mb-2 text-sm text-gray-900 bg-blue-100 border border-gray-200 rounded-lg px-7 me-2 focus:outline-none hover:bg-blue-400 hover:text-white focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Login</a>
    </div>
</nav>
