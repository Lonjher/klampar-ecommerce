@extends('layouts.dashboard')


@push('main-content')
    @section('style')
        <style>
            .btn-delete {
                border: 0.5px solid #2b99d8;
                width: 2rem;
                display: flex;
                justify-content: center;
                align-items: center;
                color: red;
                transition: background-color 0.5s;
                transition: color 0.5s;
            }

            .btn-edit {
                border: 0.5px solid #2b99d8;
                width: 2rem;
                display: flex;
                justify-content: center;
                align-items: center;
                color: blue;
                transition: background-color 0.5s;
                transition: color 0.5s;
            }

            .btn-delete:hover {
                background-color: #2b99d8;
                color: #ffffff;
            }

            .btn-edit:hover {
                background-color: #2b99d8;
                color: #ffffff;
            }

            .input-blue {
                border: 0.5px solid #2b99d8;
            }

            .dt-length {
                font-size: 12px;
            }

            .dt-search .dt-input {
                height: 30px;
                border-color: blue;
                font-size: 13px;
            }

            .dt-search label {
                font-size: 14px;
            }

            .dt-info {
                font-size: 12px;
            }
        </style>
        <link rel="stylesheet" href="//cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">
    @endsection
    @push('nav-bar')
        @include('partial.dashboard.navbar')
    @endpush
    <div class="p-3 mb-3 bg-white border rounded border-light-subtle border-top-1 sd-flex align-items-center">
        <div class="flex-row gap-3 p-3 m-0 mb-3 overflow-auto card recent-sales d-flex align-items-center">
            <img src="{{ asset('assets/svg/stock.png') }}" class="mx-4" alt="stock" width="5%">
            <span class="text-primary fw-bold fs-5">Kelola Stok Barang</span>
        </div>
        <div class="overflow-auto card recent-sales">
            <div class="card-body">
                <div class="container d-flex justify-content-between align-items-center">
                    <h6 class="card-title" style="12px">Stock Produk <span style="21px">| Recent</span></h6>
                    <div>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#tambah-produk"><i class="bi bi-plus-circle" data-bs-toggle="modal"
                                data-bs-target="#tambah-produk"></i>
                            Tambah
                            Produk</button>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="container alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <table class="table table-borderless datatable" style="font-size: 80%" id="stock-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Harga Awal</th>
                            <th>Harga Jual</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $no => $product)
                            <tr>
                                <td class="text-center">{{ $no + 1 }}</td>
                                <td><img src="{{ asset('storage/' . $product->product_image) }}" alt="Image"
                                        width="40px"></td>
                                <td>{{ $product->product_name }}</td>
                                <td class="text-center">{{ $product->first_price }}</td>
                                <td class="text-center">{{ $product->price_sell }}</td>
                                <td class="text-center">{{ $product->quantity }}</td>
                                <td>
                                    @if ($product->status)
                                        <span class="p-1 text-center text-white rounded small"
                                            style="background-color: #08ca42;">Tersedia</span>
                                    @else
                                        <span class="w-auto p-1 text-center text-white rounded small"
                                            style="background-color: #fa1212;">Habis</span>
                                    @endif
                                </td>
                                <td class="flex-row gap-2 d-flex">
                                    <form method="POST" action="/delete/{{ $product->id }}">
                                        @csrf
                                        <button class="rounded shadow btn btn-delete">
                                            <i class="bi bi-trash" style="font-size: 12px;"></i>
                                        </button>
                                    </form>
                                    <a data-bs-toggle="modal" data-bs-target="#update-produk{{ $product->id }}"
                                        class="rounded shadow btn btn-edit">
                                        <i class="bi bi-pencil" style="font-size: 12px;"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <div class="w-full">
                                <div style="background-color: #f7d5d5" class="p-2 rounded">
                                    <div class="flex-row gap-2 d-flex align-items-center justify-content-center fs-5">
                                        <i class="bi bi-database-dash"></i>
                                        <span class="fs-6">Data Produk Kosong</span>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>

    <!-- Modal Tambah -->
    @include('dashboard.create-stock')
    <!-- Modal Update -->
    @include('dashboard.update-stock')

    @push('script')
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
        <script>
            new DataTable('#stock-table');
        </script>
    @endpush
@endpush
