@extends('layouts.main')

@section('main')
    <div class="bg-gray-100 text-gray-800">

        <!-- Header with Navbar -->
        <header class="bg-gradient-to-r from-purple-600 to-blue-600 text-white shadow-lg">
            <div class="container mx-auto px-6 py-6 flex justify-between items-center">
                <h1 class="text-4xl font-extrabold tracking-tight">Laporan Dokumentasi</h1>
                <nav>
                    <ul class="flex space-x-6 text-lg">
                        <li><a href="#pendahuluan" class="hover:underline transition duration-300">Pendahuluan</a></li>
                        <li><a href="#gambar" class="hover:underline transition duration-300">Gambar</a></li>
                        <li><a href="#artikel" class="hover:underline transition duration-300">Artikel</a></li>
                        <li><a href="#kesimpulan" class="hover:underline transition duration-300">Kesimpulan</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="bg-gradient-to-r from-blue-500 to-teal-500 w-auto text-white py-24">
            <div class="container mx-auto px-6 flex flex-col w-full items-center">
                <div class="flex items-center justify-between w-full  max-w-3xl">
                    <div class="mr-10"> <!-- Logo Kiri -->
                        <img src="logo_kiri.png" alt="Logo Kiri" class="w-32 animate-bounce"
                            style="animation: bounce 1s infinite;">
                    </div>
                    <div class="text-center mx-5 bg-red-500">
                        <h2 class="text-5xl font-extrabold mb-4 tracking-tight">Dokumentasi Aplikasi Terbaru</h2>
                        <p class="text-lg mb-8 max-w-3xl mx-auto">Laporan ini mendokumentasikan setiap langkah dalam
                            pengembangan aplikasi modern dengan teknologi terbaru.</p>
                        <a href="#pendahuluan"
                            class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold shadow-lg hover:bg-gray-100 hover:shadow-xl transition duration-300 transform hover:scale-105">Lihat
                            Detail</a>
                    </div>
                    <div class="ml-10"> <!-- Logo Kanan -->
                        <img src="logo_kanan.png" alt="Logo Kanan" class="w-32 animate-bounce"
                            style="animation: bounce 1s infinite;">
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <main class="container mx-auto px-6 py-16 space-y-16">

            <!-- Section 1: Pendahuluan -->
            <section id="pendahuluan" class="text-center">
                <h2 class="text-4xl font-bold mb-6">Pendahuluan</h2>
                <p class="text-lg leading-relaxed max-w-2xl mx-auto text-gray-600">Laporan ini disusun untuk
                    mendokumentasikan setiap tahap pengembangan aplikasi. Pendahuluan ini mencakup ruang lingkup dan
                    metodologi yang diterapkan dalam proyek ini.</p>
            </section>

            <!-- Section 2: Gambar dengan Hover Effect -->
            <section id="gambar">
                <h2 class="text-4xl font-bold text-center mb-10">Gambar Ilustrasi</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <!-- Gambar 1 -->
                    <div
                        class="group relative overflow-hidden rounded-lg shadow-lg bg-white transform transition duration-300 hover:shadow-xl">
                        <img src="gambar1.jpg" alt="Gambar 1"
                            class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-blue-700 to-transparent opacity-50 group-hover:opacity-75 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-white font-bold text-xl">Tampilan Aplikasi</span>
                        </div>
                    </div>

                    <!-- Gambar 2 -->
                    <div
                        class="group relative overflow-hidden rounded-lg shadow-lg bg-white transform transition duration-300 hover:shadow-xl">
                        <img src="gambar2.jpg" alt="Gambar 2"
                            class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-blue-700 to-transparent opacity-50 group-hover:opacity-75 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-white font-bold text-xl">Diagram Alur Kerja</span>
                        </div>
                    </div>

                    <!-- Gambar 3 -->
                    <div
                        class="group relative overflow-hidden rounded-lg shadow-lg bg-white transform transition duration-300 hover:shadow-xl">
                        <img src="gambar3.jpg" alt="Gambar 3"
                            class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-blue-700 to-transparent opacity-50 group-hover:opacity-75 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-white font-bold text-xl">Arsitektur Backend</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section 3: Artikel Interaktif -->
            <section id="artikel" x-data="{ open: false }" class="text-center">
                <h2 class="text-4xl font-bold mb-6">Artikel Penjelasan</h2>
                <p class="text-lg leading-relaxed max-w-2xl mx-auto mb-8 text-gray-600">Klik tombol di bawah ini untuk
                    melihat detail artikel lengkap tentang fitur dan teknologi yang digunakan dalam pengembangan aplikasi.
                </p>
                <button @click="open = !open"
                    class="bg-blue-600 text-white px-8 py-3 rounded-full hover:bg-blue-500 shadow-lg transition duration-300 transform hover:scale-105">Baca
                    Selengkapnya</button>

                <div x-show="open" x-transition class="mt-8 max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg text-left">
                    <h3 class="text-2xl font-semibold mb-4">Fitur dan Teknologi</h3>
                    <p class="text-lg text-gray-600 mb-6">Aplikasi ini dibangun menggunakan teknologi modern seperti
                        Laravel, Vue.js, dan Tailwind CSS. Penggunaan framework tersebut membuat pengembangan lebih cepat
                        dan efisien.</p>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Sistem manajemen pengguna yang aman dengan otentikasi menggunakan Laravel Sanctum.</li>
                        <li>Laporan real-time untuk monitoring data.</li>
                        <li>Desain UI responsif dengan Tailwind CSS yang memudahkan kustomisasi.</li>
                        <li>API terintegrasi untuk komunikasi data eksternal.</li>
                    </ul>
                </div>
            </section>

            <!-- Section 4: Kesimpulan -->
            <section id="kesimpulan" class="text-center">
                <h2 class="text-4xl font-bold mb-6">Kesimpulan</h2>
                <p class="text-lg leading-relaxed max-w-2xl mx-auto text-gray-600">Laporan ini mendokumentasikan
                    pengembangan aplikasi dari awal hingga selesai. Penggunaan teknologi seperti Laravel, Vue.js, dan
                    Tailwind CSS membantu dalam menciptakan aplikasi yang cepat, aman, dan efisien.</p>
            </section>

        </main>

        <!-- Footer -->
        <footer class="bg-gradient-to-r from-blue-600 to-purple-600 text-white py-8">
            <div class="container mx-auto px-6 text-center">
                <p>&copy; 2024 Laporan Dokumentasi. Dibuat dengan <span class="font-bold">Tailwind CSS</span> & <span
                        class="font-bold">Alpine.js</span>.</p>
            </div>
        </footer>

    </div>
@endsection
