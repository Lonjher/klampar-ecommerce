<nav
    class="fixed top-0 left-0 right-0 z-0 grid items-center grid-cols-1 border-b-2 border-cyan-500 px-5 py-2 bg-white shadow-sm md:grid-cols-3">
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
        <li class="my-4 md:my-0 lg:my-0">
            <a href="{{ route('home') }}"
                class="text-sm font-normal text-gray-500 transition-colors delay-100 md:text-base hover:text-blue-400">
                Beranda
            </a>
        </li>
        {{-- <li class="my-4 md:my-0 lg:my-0">
            <a href="{{ route('shop-reservation') }}"
                class="text-sm font-normal text-gray-500 transition-colors delay-100 md:text-base hover:text-blue-400">Pemesanan
            </a>
        </li> --}}
        @canany(['admin', 'seller'])
            <li class="my-4 md:my-0 lg:my-0">
                <a href="/dashboard/{{ Auth::user()->username }}"
                    class="text-sm font-normal text-gray-500 transition-colors delay-100 md:text-base hover:text-blue-400">Dashboard
                </a>
            </li>
        @endcanany
        <li class="my-4 md:my-0 lg:my-0">
            <a href="#"
                class="text-sm font-normal text-gray-500 transition-colors delay-100 md:text-base hover:text-blue-400">Tentang
            </a>
        </li>
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
                            <img class="h-8 w-8 rounded-full" src="{{ asset('storage/' . Auth::user()->avatar) }}"
                                alt="Avatar">
                        </button>
                    </div>
                    <div class="absolute right-0 z-10 mt-2 lg:w-48 w-full origin-top-right rounded-md py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden flex-col dropdown bg-white"
                        role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                        <!-- Active: "bg-gray-100", Not Active: "" -->
                        <a href="/user-profile/{{ Auth::user()->username }}" class="block px-4 py-2 text-sm border-b border-gray-400 text-gray-700"
                            role="menuitem" tabindex="-1" id="user-menu-item-0">Profil Anda</a>
                        <button
                            class="ml-4 px-5 mt-4 rounded-lg transition ease-in-out text-sm text-white delay-150 bg-red-400 hover:-translate-y-1 hover:scale-100 hover:bg-red-500  focus:z-10 focus:ring-4 focus:ring-red-200 duration-300">Keluar</button>
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

            function Menu(e){
                const menu = document.getElementById('menu')

                if(menu.classList.contains('hidden')){
                    e.setAttribute('name', 'close')
                    menu.classList.remove('hidden')
                }else {
                    e.setAttribute('name', 'menu')
                    menu.classList.add('hidden')
                }
            }
        </script>
    @endpush
</nav>
