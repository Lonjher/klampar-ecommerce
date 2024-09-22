<!-- Main modal -->
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
                                <a href="/profil/{{ $product->user->username }}">
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
