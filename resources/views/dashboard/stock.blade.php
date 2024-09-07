@extends('layouts.dashboard')


@section('main-content')
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
    </style>
@endsection
<div class="p-3 mb-3 bg-white border rounded border-light-subtle border-top-1 sd-flex align-items-center">
    <div class="flex-row gap-3 p-3 m-0 mb-3 overflow-auto card recent-sales d-flex align-items-center">
        <i class="bi bi-shop fs-3" style="color: #2b99d8"></i>
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

            <table class="table table-borderless datatable" style="font-size: 80%">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Harga Awal</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $no => $product)
                        <tr>
                            <th class="align-middle" scope="row">{{ $no + 1 }}</th>
                            <td><img src="storage/{{ $product->product_image }}" alt="Image" width="40px"></td>
                            <td class="align-middle">{{ $product->product_name }}</td>
                            <td class="align-middle"><a href="#"
                                    class="text-primary">{{ $product->first_price }}</a>
                            </td>
                            <td class="align-middle">{{ $product->price_sell }}</td>
                            <td class="align-middle">{{ $product->quantity }}</td>
                            <td class="flex-row gap-2 d-flex">
                                <form method="POST" action="/delete/{{ $product->id_product }}">
                                    @csrf
                                    <button class="rounded shadow btn btn-delete">
                                        <i class="bi bi-trash" style="font-size: 12px;"></i>
                                    </button>
                                </form>
                                <a href="/edit/{{ $product->id_product }}" class="rounded shadow btn btn-edit">
                                    <i class="bi bi-pencil" style="font-size: 12px;"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="background-color: #f7d5d5" class="p-2 rounded">
                                <div class="flex-row gap-2 d-flex align-items-center justify-content-center fs-5">
                                    <i class="bi bi-database-dash"></i>
                                    <span class="fs-6">Data Produk Kosong</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambah-produk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    @if ($errors->any())
        <div class="container alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('create-stock') }}" style="font-size: 12px"
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="product_image" class="form-label">Gambar</label>
                        <input
                            class="form-control form-control-sm input-blue @error('product_image') is-invalid @enderror"
                            id="product_image" type="file" name="product_image" style="font-size: 12px" required
                            onchange="previewImage()">
                        <img class="mt-2 img-preview img-fluid col-sm-3">
                        @error('product_image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="product_name" class="form-label">Nama Produk</label>
                        <input type="text" name="product_name" class="form-control input-blue form-control-sm">
                        @error('product_name')
                            <span class="text-danger" style="font-size: 10px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="first_price" class="form-label">Harga Awal</label>
                            <input type="number" name="first_price" class="form-control input-blue form-control-sm">
                        </div>
                        <div class="mb-3 col">
                            <label for="price_sell" class="form-label">Harga Jual</label>
                            <input type="number" name="price_sell" class="form-control input-blue form-control-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="quantity" class="form-label">Jumlah</label>
                            <input type="number" name="quantity" class="form-control input-blue form-control-sm">
                        </div>
                        <div class="col">
                            <label for="status" class="mb-2">Status Produk</label>
                            <select name="status" id="status" class="form-select form-select-sm input-blue"
                                style="font-size: 12px">
                                <option value="">Status</option>
                                <option value=1>Tersedia</option>
                                <option value=0>Habis</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Detail</label>
                        <textarea name="description" class="form-control input-blue form-control-sm" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </div>
                </form>
            </div>

            {{-- <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-sm">Save</button> --}}

        </div>
    </div>
</div>
<script>
    function previewImage() {
        const image = document.querySelector('#product_image');
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
@endsection
