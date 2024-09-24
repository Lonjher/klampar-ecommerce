@extends('layouts.main')

@section('main')
    @push('style')
        <style>
            .circle {
                position: absolute;
                width: 50px;
                height: 50px;
                background-color: rgba(240, 255, 255, 0.3);
                border-radius: 50%;
                animation: move 10s infinite alternate ease-in-out;
                z-index: 0;
            }

            /* Defining the movement for both X and Y axes */
            @keyframes move {
                0% {
                    transform: translate(0, 0);
                }

                25% {
                    transform: translate(200px, 50px);
                }

                50% {
                    transform: translate(-100px, 150px);
                }

                75% {
                    transform: translate(300px, -50px);
                }

                100% {
                    transform: translate(-150px, -150px);
                }
            }

            /* Additional circles with different durations */
            .circle-1 {
                animation-duration: 8s;
            }

            .circle-2 {
                animation-duration: 12s;
            }

            .circle-3 {
                animation-duration: 15s;
            }

            .circle-4 {
                animation-duration: 18s;
            }

            .gallery-grid {
                display: grid;
                grid-template-columns: repeat(12, 1fr);
                /* Menggunakan 12 kolom */
                grid-auto-rows: 120px;
                /* Mengatur tinggi gambar lebih kecil */
                gap: 1rem;
            }

            /* Menyesuaikan ukuran untuk variasi random yang lebih seimbang */
            .gallery-item {
                position: relative;
                background-color: white;
                border-radius: 0.75rem;
                box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .gallery-item-large {
                grid-column: span 5;
                /* Ukuran besar tetap, tapi lebih seimbang */
                grid-row: span 3;
                /* Mengatur lebih tinggi tapi tidak terlalu besar */
            }

            .gallery-item-medium {
                grid-column: span 4;
                grid-row: span 2;
            }

            .gallery-item-small {
                grid-column: span 3;
                grid-row: span 1.5;
            }

            .gallery-item img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .gallery-info {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background: rgba(79, 152, 235, 0.6);
                color: white;
                padding: 0.5rem;
                font-size: 0.75rem;
            }

            .gallery-item:hover {
                transform: scale(1.05);
                box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            }

            /* Responsif */
            @media (max-width: 1024px) {
                .gallery-grid {
                    grid-template-columns: repeat(8, 1fr);
                    /* Kolom lebih sedikit di layar kecil */
                }
            }

            @media (max-width: 768px) {
                .gallery-grid {
                    grid-template-columns: repeat(6, 1fr);
                }
            }

            @media (max-width: 640px) {
                .gallery-grid {
                    grid-template-columns: repeat(4, 1fr);
                }
            }
        </style>
    @endpush
    <div class="bg-gray-100 text-gray-800">
        <section class="bg-gradient-to-br from-blue-500 to-blue-300 w-auto text-white py-24 mt-16 relative overflow-hidden">
            <!-- Rombuh Bunter -->
            <div class="circle circle-1" style="top: 20%; left: 10%;"></div>
            <div class="circle circle-2" style="top: 60%; left: 30%;"></div>
            <div class="circle circle-3" style="top: 40%; left: 70%;"></div>
            <div class="circle circle-4" style="top: 60%; left: 80%;"></div>
            <div class="circle" style="top: 80%; left: 80%; animation-duration: 15s;"></div>
            <div class="container mx-auto px-6 flex flex-col w-full items-center z-10">
                <div class="flex items-center justify-evenly w-full">
                    <div> <!-- Logo Kiri -->
                        <img src="{{ asset('assets/img/ua-logo.png') }}" alt="Logo Kiri" class="w-64 animate-bounce"
                            style="animation: bounce 1s infinite;">
                    </div>
                    <div class="text-center mx-5">
                        <h2 class="text-3xl font-extrabold mb-4 tracking-tight">Laporan Kuliah Kerja Nyata (KKN) Posko
                            50</h2>
                        <p class="text-lg mb-8 max-w-3xl mx-auto">Laporan ini mendokumentasikan setiap Program Kerja KKN
                            Posko 50 berlokasi di Desa Klampar Kecamatan Proppo Kabupaten Pamekasan.</p>
                        <p class="text-lg mb-8 max-w-3xl mx-auto">Dosen Pembimbing Lapangan : Dr. Mahmudi, M.Fil.I</p>
                        <a href="#pendahuluan"
                            class="bg-white text-blue-600 hover:text-white_navy px-8 py-3 rounded-full font-semibold shadow-lg hover:bg-blue-500 hover:shadow-xl transition duration-300 transform hover:scale-105">Lihat
                            Detail</a>
                    </div>
                    <div> <!-- Logo Kanan -->
                        <img src="{{ asset('assets/img/kkn-logo.png') }}" alt="Logo Kanan" class="w-48 animate-bounce"
                            style="animation: bounce 1s infinite;">
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <main class="container mx-auto px-6 py-16 space-y-16">

            <!-- Section 1: Pendahuluan -->
            <section id="pendahuluan" class="text-center">
                <h2 class="text-4xl font-bold mb-6 text-gray-600">Pendahuluan</h2>
                <p class="text-lg max-w-4xl text-center leading-relaxed mx-auto px-10 text-gray-600">Pengabdian Kuliah
                    Kerja Nyata (KKN) tahun ajaran 2024/2025 posko 50 berlokasi di desa Klampar yang terletak di
                    Kecamatan Proppo, Kabupaten
                    Pamekasan, Provinsi Jawa Timur. Masyarakat Desa Klampar sebagian besar berfrofesi sebagai Petani
                    dan
                    pengrajin batik yang diliputi daerah utara Kec.Palengaan, daerah seletah desa Samatan, sebelum
                    timur
                    Kec. kota, sebelah daya desa Rangpereng Daya.</p>
            </section>

            <!-- Section 2: Dokumentasi -->
            <section id="gambar">
                <h2 class="text-4xl font-bold text-center mb-10 text-gray-600">Dokumentasi</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <!-- Gambar 1 -->
                    <div
                        class="group relative overflow-hidden rounded-lg shadow-lg bg-white transform transition duration-300 hover:shadow-xl">
                        <img src="{{ asset('assets/img/documentation/penyerahan.jpeg') }}" alt="Gambar 1"
                            class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-blue-700 to-transparent opacity-50 group-hover:opacity-75 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-white font-bold text-xl">Penyerahan</span>
                        </div>
                    </div>

                    <!-- Gambar 2 -->
                    <div
                        class="group relative overflow-hidden rounded-lg shadow-lg bg-white transform transition duration-300 hover:shadow-xl">
                        <img src="{{ asset('assets/img/documentation/eco-brick.jpeg') }}" alt="Gambar 2"
                            class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-blue-700 to-transparent opacity-50 group-hover:opacity-75 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-white font-bold text-xl">Pembuatan Eco Brick</span>
                        </div>
                    </div>

                    <!-- Gambar 3 -->
                    <div
                        class="group relative overflow-hidden rounded-lg shadow-lg bg-white transform transition duration-300 hover:shadow-xl">
                        <img src="{{ asset('assets/img/documentation/seminar-foto-bersama.jpeg') }}" alt="Gambar 3"
                            class="w-full h-56 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-blue-700 to-transparent opacity-50 group-hover:opacity-75 transition-opacity duration-300 flex items-center justify-center">
                            <span class="text-white font-bold text-xl">Seminar Technoprenuership</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section 3: Program Kerja -->
            <section id="artikel" x-data="{ open: false }" class="text-center">
                <h2 class="text-4xl font-bold mb-6 text-gray-600">Program Kerja</h2>
                <p class="text-lg leading-relaxed max-w-2xl mx-auto mb-8 text-gray-600">Program kerja yang kami pilih
                    berorientasi pada pendampingan peningkatan pemasaran produk batik masyarakat dengan
                    pemanfaatan Teknologi.
                </p>
                <button @click="open = !open"
                    class="bg-blue-600 text-white px-8 py-3 rounded-full hover:bg-blue-500 shadow-lg transition duration-300 transform hover:scale-105">Baca
                    Selengkapnya</button>

                <div x-show="open" x-transition class="mt-8 max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg text-left">
                    <span class="text-2xl font-semibold mb-4 flex items-center">
                        <ion-icon name="arrow-forward-circle-outline"></ion-icon>
                        <span class="ml-3">Program Tambahan</span>
                    </span>
                    <p class="text-lg text-gray-600 mb-6">Dalam kaitannya dengan program diatas, kami juga menyusun
                        beberapa
                        program sebagai program dukungan pendampingan terhadap masyarakat Klampar, salah satunya:</p>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Pendampingan rancang bangun Sistem Informasi Pemasaran Batik Tulis Klampar.</li>
                        <li>Seminar Technoprenuership.</li>
                        <li>Sosialisai Aplikasi.</li>
                        <li>Pembuatan Eco Brick Balai Desa Klampar.</li>
                    </ul>
                </div>
            </section>

            <!-- Gallery Section -->
            <section class="py-12">
                <div class="container mx-auto px-4">
                    <h2 class="text-4xl font-bold text-center mb-12 text-gray-600">Galeri</h2>

                    <div class="gallery-grid">
                        <!-- Gallery Item 1 -->
                        <div class="gallery-item gallery-item-large">
                            <img src="{{ asset('assets/img/documentation/observasi-batik.jpeg') }}" alt="Kegiatan 1">
                            <div class="gallery-info">
                                <h3>Observasi Pemasaran Batik</h3>
                                <p>01 September 2024</p>
                                <p>Observasi mahasiswa KKN terkait pemasaran batik desa Klampar pada salah satu Pengelola
                                    batik tulis Klampar.</p>
                            </div>
                        </div>

                        <!-- Gallery Item 2 -->
                        <div class="gallery-item gallery-item-small">
                            <img src="{{ asset('assets/img/documentation/survei-batik-tulis.jpeg') }}" alt="Kegiatan 2">
                            <div class="gallery-info">
                                <h3>Survei Produksi Batik Tulis</h3>
                                <p>05 September 2024</p>
                                <p>Survei terhadap salah satu pengrajin batik tulis desa Klampar.</p>
                            </div>
                        </div>

                        <!-- Gallery Item 3 -->
                        <div class="gallery-item gallery-item-medium">
                            <img src="{{ asset('assets/img/documentation/survei-batik.jpeg') }}" alt="Kegiatan 3">
                            <div class="gallery-info">
                                <h3>Observasi Produksi Batik</h3>
                                <p>13 September 2024</p>
                                <p>Kegiatan observasi anggota KKN terhadap produksi batik desa Klampar.</p>
                            </div>
                        </div>

                        <!-- Gallery Item 4 -->
                        <div class="gallery-item gallery-item-small">
                            <img src="{{ asset('assets/img/documentation/seminar1.jpeg') }}" alt="Kegiatan 4">
                            <div class="gallery-info">
                                <h3>Seminar Technoprenuership</h3>
                                <p>09 September 2024</p>
                                <p>Seminar Technoprenuership terhadap masyarakat, siswa, serta aparat desa Klampar.
                                </p>
                            </div>
                        </div>

                        <!-- Gallery Item 5 -->
                        <div class="gallery-item gallery-item-large">
                            <img src="{{ asset('assets/img/documentation/seminar-cinderamata.jpeg') }}" alt="Kegiatan 5">
                            <div class="gallery-info">
                                <h3>Penyerahan Cinderamata kepada Penyaji</h3>
                                <p>09 September 2024</p>
                                <p>Penyerahan kenang-kenangan dari anggota KKN kepada penyaji pada kegiatan Seminar
                                    Technoprenuership.</p>
                            </div>
                        </div>

                        <!-- Gallery Item 6 -->
                        <div class="gallery-item gallery-item-medium">
                            <img src="{{ asset('assets/img/documentation/sosialisai-aplikasi.jpeg') }}" alt="Kegiatan 6">
                            <div class="gallery-info">
                                <h3>Sosialisasi Aplikasi</h3>
                                <p>20 September 2024</p>
                                <p>Sosialisai penggunaan aplikasi dan evaluasi aplikasi dari salah satu pengelola batik
                                    tulis desa Klampar.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section 4: Kesimpulan -->
            <section id="kesimpulan" class="text-center">
                <h2 class="text-4xl font-bold mb-6 text-gray-600">Kesimpulan</h2>
                <p class="text-lg leading-relaxed max-w-2xl mx-auto text-gray-600">Pengabdian yang dilaksanakan di desa
                    Klampar Kecamatan Proppo mengusung program kerja pengabdian dan pendampingan masyarakat, yang sebagian
                    besar berprofesi sebagai pengrajin batik, dalam
                    meningkatkan pemasaran produk batik tulis mereka dengan pemanfaatan teknologi. Sebagai hasil dari
                    keseluruhan program kerja yang disusun, masyarakat dapat mengimplemtasikan beberapa hal terkait
                    Technoprenueship dalam usaha produktifitas batik mereka.</p>
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
