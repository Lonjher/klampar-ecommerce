@extends('layouts.main')

@section('main')
    <div class="pb-8 pl-8 pr-8 bg-white border rounded-lg mt-11 md:mt-20 md:m-3">
        <div class="flex items-center gap-3 py-3 mb-3 border-b-2 border-blue-300">
            <img src="{{ asset('assets/img/logo.png') }}" alt="logo" width="50">
            <h1 class="font-medium md:text-lg sm:text-sm text-slate-600">Pemesanan</h1>
        </div>
        <div class="flex items-center">
            <div class="hidden md:items-center md:block" style="width: 80%">
                <img src="{{ asset('assets/img/order.png') }}" alt="order">
            </div>
            <div class="w-full">
                <form class="grid-flow-row p-4 mx-auto md:grid" action="{{ route('shop-reservation') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="col-span-2 mb-7">
                        <label class="block mb-2 text-sm text-gray-900 dark:text-white" for="sample">Contoh
                            Pesanan</label>
                        <input
                            class="block w-full text-xs text-gray-600 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            id="sample" type="file" name="sample" onchange="previewImage()" required>
                        <img class="w-32 mt-2 img-preview img-fluid col-sm-3 md:w-60">
                        @error('sample')
                            <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="mb-3">
                        <label for="description" class="block mb-2 text-sm text-gray-900 dark:text-white">Uraian
                            Pesanan</label>
                        <textarea id="description" rows="5"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Jelaskan uraian singkat pesanan anda" name="description" required></textarea>
                        @error('description')
                            <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col justify-center align-middle md:ml-6">
                        <div class="mb-3">
                            <label for="quantity" class="block mb-2 text-sm gray-900 text- dark:text-white">Jumlah
                                Pesanan</label>
                            <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required />
                            @error('quantity')
                                <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="w-full mb-3">
                            <label for="deadline" class="block mb-2 text-sm text-gray-900 dark:text-white">Tanggal
                                Ambil</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input datepicker id="default-datepicker" type="text" name="deadline"
                                    value="{{ old('deadline') }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Pilih taggal" datepicker-autohide datepicker-format="d.m.yyyy" required>
                            </div>

                        </div>
                    </div>
                    <div class="flex justify-center col-span-2 mt-3">
                        <button type="submit"
                            class="text-white flex-1 col-span-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('partial.footer')
    @push('script')
        <script>
            function previewImage() {
                const image = document.querySelector('#sample');
                // const old_img = document.querySelector('#old_image');
                const imgPreview = document.querySelector('.img-preview');

                // old_img.style.display = 'none';
                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }
        </script>
    @endpush
@endsection
