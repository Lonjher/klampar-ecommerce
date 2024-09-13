@extends('layouts.dashboard')

@push('main-content')
    <div class="p-3 mb-3 bg-white border rounded border-light-subtle border-top-1 sd-flex align-items-center">
        <div class="p-3 m-0 mb-2 overflow-auto card recent-sales d-flex justify-content-center">
            <span class="text-primary fw-bold fs-5">Barang Terjual</span>
        </div>
        <div class="overflow-auto card recent-sales">
            <div class="card-body">
                <table class="table table-borderless datatable" style="font-size: 80%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Harga Awal</th>
                            <th scope="col">Harga Jual</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><a href="#">1</a></th>
                            <td>Batik Madura</td>
                            <td><a href="#" class="text-primary">50000</a>
                            </td>
                            <td>90000</td>
                            <td><a href="#" target="_blank" class="rounded shadow btn btn-download">Download</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endpush
