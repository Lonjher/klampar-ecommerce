@extends('layouts.main')

@section('main')
    <div class="bg-white_navy font-sans py-4 mt-10">
        <div class="max-w-4xl mx-auto mt-10 bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="bg-cover bg-center h-56 p-4" style="background-image: url('https://via.placeholder.com/1200x400');">
                <div class="flex justify-end">
                    @auth
                        <button class="text-white bg-gray-800 bg-opacity-50 px-4 py-2 rounded-lg hover:bg-blue-500">
                            Edit Profile
                        </button>
                    @endauth
                </div>
            </div>
            <div class="p-4">
                <div class="text-center">
                    <img class="h-32 w-32 rounded-full mx-auto -mt-16 border-4 border-white"
                        src="https://via.placeholder.com/150" alt="Profile Image">
                    <h2 class="text-2xl font-semibold mt-4">John Doe</h2>
                    <p class="text-gray-600">Software Developer</p>
                    <p class="mt-2 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus lacinia
                        odio vitae vestibulum vestibulum.</p>
                </div>
                <div class="mt-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Contact Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 8c0 2.2-1.8 4-4 4s-4-1.8-4-4 1.8-4 4-4 4 1.8 4 4zM4 8v5c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8M4 15v1a3 3 0 003 3h10a3 3 0 003-3v-1" />
                            </svg>
                            <span>johndoe@example.com</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 10l1.4 9.4c.1.8.8 1.4 1.6 1.4h12c.8 0 1.5-.6 1.6-1.4L21 10m-9-5v4m0 0L5 9M4 10h16" />
                            </svg>
                            <span>+123 456 7890</span>
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
                        <span>123 Main Street, Jakarta, Indonesia, 12345</span>
                    </div>
                </div>
                <div class="mt-6 text-center">
                    <div class="flex justify-center space-x-4">
                        <!-- WhatsApp Button -->
                        <a href="https://wa.me/1234567890" target="_blank"
                            class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                            Hubungi via WhatsApp
                        </a>
                        <!-- Buat Pesanan Button -->
                        <a href="#" class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600">
                            Buat Pesanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
