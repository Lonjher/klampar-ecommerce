@extends('layouts.dashboard')

@push('main-content')

    <div class="p-3 mb-3 bg-white border rounded border-light-subtle border-top-1 sd-flex align-items-center">
        <div class="flex-row gap-3 p-3 m-0 mb-3 overflow-auto card recent-sales d-flex align-items-center">
            <i class="bi bi-shop fs-3" style="color: #2b99d8"></i>
            <span class="text-primary fw-bold fs-5">Edit Stock</span>
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
        <div class="overflow-auto card recent-sales">
            <div class="modal-body">
                {{-- <form method="POST" action="/update/{{ $product->id_product }}" style="font-size: 12px"
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="product_image" class="form-label">Gambar</label>
                        <input class="form-control form-control-sm input-blue @error('product_image') is-invalid @enderror"
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
                        <input type="text" name="product_name" value="{{ $product->product_name }}"
                            class="form-control input-blue form-control-sm">
                        @error('product_name')
                            <span class="text-danger" style="font-size: 10px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="first_price" class="form-label">Harga Awal</label>
                            <input type="number" name="first_price" value="{{ $product->first_price }}"
                                class="form-control input-blue form-control-sm">
                        </div>
                        <div class="mb-3 col">
                            <label for="price_sell" class="form-label">Harga Jual</label>
                            <input type="number" name="price_sell" value="{{ $product->price_sell }}"
                                class="form-control input-blue form-control-sm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="quantity" class="form-label">Jumlah</label>
                            <input type="number" name="quantity" value="{{ $product->quantity }}"
                                class="form-control input-blue form-control-sm">
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
                </form> --}}
            </div>
        </div>
    </div>
@endpush
