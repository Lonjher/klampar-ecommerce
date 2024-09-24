<nav
    class="fixed top-0 left-0 right-0 z-10 grid items-center grid-cols-1 border-b-2 border-cyan-500 px-5 py-2 bg-white shadow-sm md:grid-cols-3">
    <div class="z-0 flex items-center justify-between w-full">
        <a href="/" class="w-full">
            <img src="{{ asset('assets/img/logo-batik.png') }}" alt="logo" width="100" class="md:w-32">
        </a>
        <div class="flex items-center md:hidden">
            <span
                class="inline-flex items-center justify-center p-1 text-gray-800 rounded-md cursor-pointer bg-gray-50 hover:text-gray-00 hover:bg-gray-100 5focus:outline-none focus:ring-2 focus:ring-inset focus:ring-gray-50"
                aria-expanded="false">
                <ion-icon name="menu" class="text-3xl" onclick="Menu(this)"></ion-icon>
            </span>
        </div>
    </div>
    <div id="menu" class="z-0 items-center justify-center hidden w-full gap-3 list-none md:flex">
        <div class="md:flex md:gap-3 hidden">
            <li class="my-4 md:my-0 lg:my-0">
                <a href="{{ route('home') }}"
                    class="text-sm font-normal text-gray-500 transition-colors delay-100 md:text-base hover:text-blue-400">
                    Beranda
                </a>
            </li>
            <li class="my-4 md:my-0 lg:my-0">
                <a href="{{ route('documentation') }}"
                    class="text-sm font-normal text-gray-500 transition-colors delay-100 md:text-base hover:text-blue-400">
                    Laporan
                </a>
            </li>
            <li class="my-4 md:my-0 lg:my-0">
                <a href="#"
                    class="text-sm font-normal text-gray-500 transition-colors delay-100 md:text-base hover:text-blue-400">Tentang
                </a>
            </li>
        </div>
        <div class="md:hidden">
            <li class="my-4 md:my-0 lg:my-0">
                <a href="{{ route('home') }}"
                    class="block px-2 py-2 align-middle rounded-md text-sm hover:bg-blue-200 text-gray-700">
                    <span class="h-full flex items-center">
                        <ion-icon name="home-outline" class="text-3xl"></ion-icon>
                        <span class="ml-2">Beranda</span>
                    </span>
                </a>
                <a href="{{ route('home') }}"
                    class="block px-2 py-2 align-middle rounded-md text-sm hover:bg-blue-200 text-gray-700">
                    <span class="h-full flex items-center">
                        <ion-icon name="book-outline" class="text-3xl"></ion-icon>
                        <span class="ml-2">Tentang</span>
                    </span>
                </a>
                @auth
                    <a href="/user-profile/{{ Auth::user()->username }}"
                        class="block px-2 py-2 align-middle text-sm rounded-md hover:bg-blue-200 text-gray-700"
                        role="menuitem" tabindex="-1" id="user-menu-item-0">
                        <span class="h-full flex items-center">
                            <ion-icon name="person-circle-outline" class="text-3xl"></ion-icon>
                            <span class="ml-2">Profil Anda</span>
                        </span>
                    </a>
                @endauth
                @auth
                    <a href="/dashboard/{{ Auth::user()->username }}"
                        class="block ml-1 px-2 py-2 align-middle rounded-md text-sm border-b hover:bg-blue-200 border-gray-400 text-gray-700"
                        role="menuitem" tabindex="-1" id="user-menu-item-0">
                        <span class="h-full flex items-center">
                            <ion-icon name="apps-outline" class="text-2xl"></ion-icon>
                            <span class="ml-2">Dashboard</span>
                        </span>
                    </a>
                @endauth
            </li>
            @auth
                <button class="px-4 py-2 text-sm flex justify-center  text-gray-700 hover:bg-red-200 w-full">
                    <span class="h-full flex items-center">
                        <ion-icon name="log-out-outline" class="text-2xl"></ion-icon>
                        <span class="ml-2">Keluar</span>
                    </span>
                </button>
            @else
                <li class="w-full flex justify-center items-center gap-2">
                    <a href="{{ route('login') }}"
                        class="py-1 text-sm text-gray-900 font-medium flex items-center bg-blue-100 transition ease-in-out border duration-300 delay-150 border-gray-200 rounded-lg px-4 focus:outline-none hover:bg-blue-400 hover:text-white hover:-translate-y-1 hover:scale-100 focus:z-10 focus:ring-4 focus:ring-blue-400">
                        <span class="h-full flex items-center justify-start gap-2">
                            <ion-icon name="log-in-outline" class="text-3xl"></ion-icon>
                            <span>Login</span>
                        </span>
                    </a>
                    <a href="{{ route('register') }}"
                        class="px-5 py-2 text-sm text-gray-900 bg-white font-medium border hover:-translate-y-1 transition ease-in-out duration-300 delay-150 hover:scale-100 border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-blue-500 focus:z-10 focus:ring-4 focus:ring-gray-100">
                        <span class="h-full flex items-center justify-start gap-2">
                            <ion-icon name="person-add-outline" class="text-2xl"></ion-icon>
                            <span>Daftar</span>
                        </span>
                    </a>
                </li>
            @endauth
        </div>
    </div>
    <div id="tombol" class="z-0 flex-row items-center justify-end hidden gap-2 my-4 md:my-0 lg:my-0 md:flex">
        @auth
            <form action="{{ route('logout') }}" method="POST" class="flex items-center gap-5">
                @csrf
                <div class="relative ml-3 w-full">
                    <div>
                        <button type="button" onclick="showDropDown()"
                            class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-500"
                            id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Buka Menu Pengguna</span>
                            <div class="rounded-full w-12 h-12 overflow-hidden">
                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="avatar"
                                    class="w-full h-full object-cover rounded-full">
                            </div>
                        </button>
                    </div>
                    <div class="absolute md:right-0 lg:right-0 z-10 mt-2 w-48 origin-top-right rounded-md py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden menu flex-col dropdown bg-white"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <a href="/user-profile/{{ Auth::user()->username }}"
                            class="block px-2 py-2 align-middle text-sm hover:bg-blue-200 text-gray-700" role="menuitem"
                            tabindex="-1" id="user-menu-item-0">
                            <span class="h-full flex items-center">
                                <ion-icon name="person-circle-outline" class="text-3xl"></ion-icon>
                                <span class="ml-2">Profil Anda</span>
                            </span>
                        </a>

                        <a href="/dashboard/{{ Auth::user()->username }}"
                            class="block ml-1 px-2 py-2 align-middle text-sm border-b hover:bg-blue-200 border-gray-400 text-gray-700"
                            role="menuitem" tabindex="-1" id="user-menu-item-0">
                            <span class="h-full flex items-center">
                                <ion-icon name="apps-outline" class="text-2xl"></ion-icon>
                                <span class="ml-2">Dashboard</span>
                            </span>
                        </a>
                        <button class="px-4 py-2 text-sm flex justify-center  text-gray-700 hover:bg-red-200 w-full">
                            <span class="h-full flex items-center">
                                <ion-icon name="log-out-outline" class="text-2xl"></ion-icon>
                                <span class="ml-2">Keluar</span>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
        @else
            <a href="{{ route('login') }}"
                class="py-2 text-sm text-gray-900 font-medium bg-blue-100 transition ease-in-out border duration-300 delay-150 border-gray-200 rounded-lg px-7 focus:outline-none hover:bg-blue-400 hover:text-white hover:-translate-y-1 hover:scale-100 focus:z-10 focus:ring-4 focus:ring-blue-400">Masuk</a>
            <a href="{{ route('register') }}"
                class="px-5 py-2 text-sm text-gray-900 bg-white font-medium border hover:-translate-y-1 transition ease-in-out duration-300 delay-150 hover:scale-100 border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-blue-500 focus:z-10 focus:ring-4 focus:ring-gray-100">Daftar</a>
        @endauth
    </div>
    @push('script')
        <script>
            function showDropDown() {
                const dropDown = document.querySelector(".dropdown")
                dropDown.classList.toggle("hidden")
            }

            function Menu(e) {
                const menu = document.getElementById('menu')

                if (menu.classList.contains('hidden')) {
                    e.setAttribute('name', 'close')
                    menu.classList.remove('hidden')
                } else {
                    e.setAttribute('name', 'menu')
                    menu.classList.add('hidden')
                }
            }
        </script>
    @endpush
</nav>
