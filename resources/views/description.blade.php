<!-- Main modal -->
{{-- @foreach ($products as $product)
    <div id="desc-modal{{ $product->id_product }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Deskripsi Produk
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="desc-modal{{ $product->id_product }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <div class="grid grid-cols-3 gap-3 w-full">
                        <div class="col-span-1 flex flex-1 h-80 rounded-l-lg"
                            style="background-image: url(storage/{{ $product->product_image }});
                                       background-size: cover;
                                       background-repeat: no-repeat;
                                ">
                        </div>
                        <div class="col-span-2">
                            <div class="border-b border-gray-400 pb-3">
                                <h1 class="text-2xl font-sans">{{ $product->product_name }}</h1>
                                <span class="flex flex-row justify-between gap-10 w-full">
                                    <span>Kabupaten Pamekasan</span>
                                    @if ($product->status)
                                        <span class="text-center text-white rounded small p-1 mr-5"
                                            style="background-color: #08ca42; font-size: 11px">Tersedia</span>
                                    @else
                                        <span class="p-1 text-center text-white rounded small mr-5"
                                            style="background-color: #fa1212; font-size: 11px;">Habis</span>
                                    @endif
                                </span>
                            </div>
                            <div class="flex flex-row gap-6 align-middle items-center mt-3">
                                <span
                                    class="text-center font-semibold text-sm flex items-center text-gray-600">HARGA</span>
                                <span class="text-2xl font-bold text-red-500">Rp.
                                    {{ Number::format($product->price_sell) }}</span>
                            </div>
                            <div class="flex flex-row gap-6 align-middle items-start my-3">
                                <span
                                    class="text-center font-semibold text-sm flex items-center text-gray-600">JUMLAH</span>
                                <span class="text-sm">{{ $product->quantity }} Stok</span>
                            </div>
                            <div class="flex flex-row gap-6 align-middle items-start border-t border-gray-400 pt-3">
                                <span
                                    class="text-center font-semibold text-sm flex items-center text-gray-600">DESKRIPSI</span>
                                <span class="text-sm">{{ $product->description }}</span>
                            </div>
                            <div class="w-full flex justify-end align-middle items-center">
                                <a href="https://wa.me/6281937331166" target="_blank"
                                    class="mt-5 flex align-middle font-medium justify-center transition ease-in-out delay-100 py-1 px-10 text-teal-950 hover:text-teal-50 text-xl bg-green-200 hover:bg-green-500 duration-300 rounded-lg items-center focus:ring-4 focus:outline-none">
                                    <span class="mr-3 text-sm">Chat Penjual</span>
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach --}}

@extends('layouts.main')

@section('main')
    <div class="bg-white_navy">

        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden mt-[90px] p-4">
            <div class="flex flex-col md:flex-row md:space-x-4">
                <!-- Product Image -->
                <img class="w-full h-60 md:w-1/3 md:h-80 object-cover rounded-lg"
                    src="{{ asset('storage/' . $product->product_image) }}" alt="Product Image">

                <!-- Product Content -->
                <div class="p-6 w-full md:w-2/3">
                    <!-- Product Name -->
                    <h2 class="text-2xl font-bold text-blue-500 mb-4">{{ $product->product_name }}</h2>

                    <!-- Product Price -->
                    <p class="text-xl font-semibold mb-4 text-gray-600">Rp,
                        {{ Number::format($product->price_sell) }}</p>

                    <!-- Stock Info -->
                    <div class="flex items-center space-x-2 mb-4">
                        <span class="text-green-600 font-medium">Stok Tersedia</span>
                        <span class="text-gray-500">({{ $product->quantity }})</span>
                    </div>

                    <!-- Product Description -->
                    <p class="text-gray-600 text-sm mb-6">{{ $product->description }}</p>

                    <!-- Seller Information -->
                    <div class="border-t pt-4 mt-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Informasi Penjual</h3>
                        <div class="flex items-center space-x-3">
                            <img class="w-12 h-12 rounded-full object-cover"
                                src="{{ asset('storage/' . $product->user->avatar) }}" alt="Seller Profile Picture">
                            <div>
                                <a href="">
                                    <p class="font-medium text-blue-600 hover:text-blue-500">{{ $product->user->name }}</p>
                                </a>
                                <p class="text-sm text-gray-500">Diupload pada:
                                    {{ $product->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Chat Seller Button -->
                    <a href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20memesan%20produk%20Nama%20Produk%20seharga%20Rp%20150.000"
                        target="_blank">
                        <button
                            class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600 mt-6">
                            Chat Penjual
                        </button>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
