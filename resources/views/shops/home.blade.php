@extends('layouts.main')

@section('main')
    <div class="container mx-auto mt-10 carousel" style="max-width:1600px;">
        <section class="flex w-full pt-12 mx-auto bg-right bg-cover bg-nordic-gray-light md:pt-0 md:items-center"
            style="max-width:1600px; height: 32rem; background-image: url('{{ asset('assets/img/home-banner.jpg') }}');">

            <div class="container mx-auto flex justify-center">

                <div
                    class="flex flex-col justify-center items-center w-full px-6 tracking-wide lg:w-1/2 bg-white_navy bg-opacity-50">
                    <span class="rounded-3xl pl-3 text-center">
                        <p class="my-4 text-2xl text-black flex flex-col justify-center"><span>Sistem Informasi
                                Pemasaran</span><span class="my-4 text-2xl text-black"> Batik Tulis Original Klampar Proppo
                                Pamekasan
                            </span></p>
                    </span>
                    <a class="inline-block text-xl leading-relaxed no-underline bg-blue-400 mt-4 hover:bg-blue-500 px-3 rounded-md border-gray-600 hover:text-black hover:border-black"
                        href="#store">products</a>
                </div>
            </div>

        </section>
    </div>

    <section class="py-8 bg-slate-100">

        <div class="container flex flex-wrap items-center pt-4 pb-12 mx-auto">

            <nav id="store" class="top-0 w-full px-6 py-1 z-1">
                <div class="container flex flex-wrap items-center justify-between w-full px-2 py-3 mx-auto mt-0">

                    <a class="text-xl font-bold tracking-wide text-gray-800 no-underline uppercase hover:no-underline "
                        href="#">
                        Store
                    </a>
                    <div class="flex items-center" id="store-nav-content">

                        <a class="inline-block pl-3 no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path d="M7 11H17V13H7zM4 7H20V9H4zM10 15H14V17H10z" />
                            </svg>
                        </a>

                        <a class="inline-block pl-3 no-underline hover:text-black" href="#">
                            <svg class="fill-current hover:text-black" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24">
                                <path
                                    d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z" />
                            </svg>
                        </a>

                    </div>
                </div>
            </nav>

            <div class="w-full px-6">
                <div class="grid justify-center gap-2 sm:grid-cols-2 sm:justify-center md:grid-cols-3 lg:grid-cols-5">
                    @forelse ($products as $product)
                        <div class="flex flex-col w-56 rounded-lg shadow-md h-96">
                            <div class="flex flex-1 rounded-t-lg"
                                style="background-image: url(storage/{{ $product->product_image }});
                                       background-size: cover;
                                       background-repeat: no-repeat;
                                ">
                            </div>
                            <div class="flex flex-col p-2 bg-white rounded-b-lg">
                                <div class="detail">
                                    <span class="block font-semibold">{{ $product->product_name }}</span>
                                    <span class="text-xl font-bold text-red-500">Rp.
                                        {{ Number::format($product->price_sell) }}</span>
                                </div>
                                <div class="more-info">
                                    <div class="flex flex-col">
                                        <span
                                            class="text-sm text-gray-400">{{ $product->created_at->diffForHumans() }}</span>
                                    </div>
                                    <div class="grid grid-cols-4 gap-2">
                                        <a href="/products/{{ $product->slug }}"
                                            class="col-span-3 py-2 mt-5 transition ease-in-out delay-150 text-teal-50 bg-blue-700 hover:-translate-y-0.5 hover:scale-110 hover:bg-blue-800 duration-300 rounded-lg hover:font-bold text-center items-center focus:ring-4 focus:outline-none">
                                            <span>Deskripsi</span>
                                        </a>
                                        <a href="https://wa.me/{{ $product->user->wa_number }}/?text=Halo,%20apakah%20produk%20dengan%20nama%20{{ $product->product_name }}%20,%20dengan%20harga%20Rp%20{{ Number::format($product->price_sell) }}%20masih%20ada?"
                                            target="_blank"
                                            class="col-span-1 mt-5 flex align-middle font-medium justify-center transition ease-in-out delay-100 text-teal-950 hover:text-teal-50 text-xl bg-green-200 hover:-translate-y-0.5 hover:scale-110 hover:bg-green-500 duration-300 rounded-lg items-center focus:ring-4 focus:outline-none">
                                            <i class="bi bi-whatsapp"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-4 grid align-middle justify-center sm:col-span-2 md:col-span-3 lg:col-span-5 w-full">
                            <div class="flex justify-center"><img src="{{ asset('assets/svg/no-data.svg') }}" alt="no-data"
                                    class="lg:w-64 md:w-60 sm:w-60"></div>
                            <span class="font-medium text-gray-500">Ups, Data Kosong, Hubungi admin untuk update produk
                                terbaru!</span>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <div class="w-full bg-blue-500">
        @include('partial.footer')
    </div>

    @push('script')
        <script>
            let menu = document.getElementById('menu')
            let tombol = document.getElementById('tombol')

            function Menu(e) {
                e.name === 'menu' ? (e.name = 'close', menu.classList.remove('hidden'), tombol.classList.remove('hidden')) : (e
                    .name = 'menu', menu.classList.add('hidden'), tombol.classList.add('hidden'))
            }
        </script>
        @if (session('success'))
            @push('script')
                <script>
                    Swal.fire({
                        title: 'Sukses',
                        icon: 'success',
                        text: '{{ session('success') }}',
                        timer: 3000
                    })
                </script>
            @endpush
        @endif
    @endpush
@endsection
