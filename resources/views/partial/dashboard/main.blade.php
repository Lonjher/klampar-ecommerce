@extends('layouts.dashboard')
<!-- Start Main -->
@section('main-content')
    <div class="col-12">
        <div class="overflow-auto card recent-sales">

            <div class="card-body">
                <h5 class="card-title">Speaking Class <span>| Recent</span></h5>
                @can('admin')
                    <div class="container d-flex justify-content-end">
                        <a class="btn btn-primary"><i class="mx-1 bi bi-plus-circle"></i> Add Book</a>
                    </div>
                @endcan

                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Class</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <th scope="row"><a href="#">1</a></th>
                                <td>{{ $kelas->nama_kelas }}</td>
                                <td><a href="#" class="text-primary">{{ $book->nama_buku }}</a>
                                </td>
                                <td>{{ $book->harga }}</td>
                                <td><a href="{{ $book->src }}" download="{{ $book->nama_buku }}" target="_blank"
                                        class="rounded shadow btn btn-download">Download</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection
<!-- End Main -->
