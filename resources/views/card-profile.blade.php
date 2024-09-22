@extends('layouts.main')

@section('main')
    <div class="bg-white_navy font-sans py-4 mt-10">
        <div class="max-w-4xl mx-auto mt-10 bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-cover bg-center h-56 p-4" style="background-image: url('{{ asset('storage/'. $user->banner) }}');"></div>
            <div class="p-4">
                <div class="text-center">
                    <img class="h-32 w-32 rounded-full mx-auto -mt-16 border-4 border-white"
                        src="{{ asset('storage/'. $user->avatar) }}" alt="Profile Image">
                    <h2 class="text-2xl font-semibold mt-4">{{ $user->name }}</h2>
                    <p class="text-gray-600">'@'{{ $user->username }}</p>
                    <p class="mt-2 text-gray-600">{{ $user->bio }}</p>
                </div>
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Contact Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center space-x-4">
                            <i class="bi bi-envelope"></i>
                            <span>{{ $user->email }}</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <i class="bi bi-whatsapp"></i>
                            <span>{{ $user->wa_number }}</span>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Alamat</h3>
                    <div class="flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 2C8.686 2 6 4.686 6 8c0 3.314 6 12 6 12s6-8.686 6-12c0-3.314-2.686-6-6-6zm0 8a2 2 0 100-4 2 2 0 000 4z" />
                        </svg>
                        <span>{{ $user->alamat->dusun }} {{ $user->alamat->desa }} {{ $user->alamat->kecamatan }} {{ $user->alamat->kabupaten }}</span>
                    </div>
                </div>
                <div class="mt-6 text-center">
                    <div class="flex justify-center space-x-4">
                        <!-- WhatsApp Button -->
                        <a href="https://wa.me/{{ $user->wa_number }}" target="_blank"
                            class="bg-green-400 transition duration-150 ease-out delay-150 hover:ease-in hover:scale-110 hover:-translate-y-1 text-white px-3 py-2 rounded-lg hover:bg-green-600">
                            <i class="bi bi-whatsapp mr-2"></i>
                            Chat WhatsApp
                        </a>
                        @if ($user->role_id = 1 && $user->role_id = 2)
                            <!-- Buat Pesanan Button -->
                            <a href="/order-product/{{ $user->username }}" class="bg-blue-500 delay-150 transition duration-150 ease-out hover:ease-in text-white px-6 py-2 rounded-lg hover:scale-110 hover:-translate-y-1 hover:bg-blue-600">
                                <i class="bi bi-basket mr-2"></i>
                                Buat Pesanan
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
