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
        </style>
        <link rel="stylesheet" href="//cdn.datatables.net/2.1.5/css/dataTables.dataTables.min.css">
    @endsection
    <div class="p-3 mb-3 bg-white border rounded border-light-subtle border-top-1 sd-flex align-items-center">
        <div class="flex-row gap-3 p-3 m-0 mb-3 overflow-auto card recent-sales d-flex align-items-center">
            <img src="{{ asset('assets/img/reservation.svg') }}" alt="reservation" width="50">
            <span class="text-primary fw-bold fs-5">Kelola Pesanan Batik</span>
        </div>
        <div class="overflow-auto card recent-sales">
            <div class="card-body">
                <div class="container d-flex justify-content-between align-items-center">
                    <h6 class="card-title" style="12px">Pemesan <span style="21px">| Recent</span></h6>
                    <div>
                        <a href="" class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i>
                            Tambah
                            Pesanan</a>
                    </div>
                </div>

                <table class="table table-borderless datatable" style="font-size: 80%" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Contoh</th>
                            <th scope="col">User Id</th>
                            <th scope="col">Uraian</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Tgl. Ambil</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $no => $order)
                            <tr>
                                <th class="text-center" scope="row">{{ $no + 1 }}</th>
                                <td><img src="storage/{{ $order->sample }}" alt="Image" width="50px"></td>
                                <td>{{ $order->user_id }}</td>
                                <td><a href="#" class="text-primary">{{ $order->description }}</a>
                                </td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->deadline }}</td>
                                <td>
                                    @if ($order->status)
                                        <span class="p-1 text-center text-white rounded small"
                                            style="background-color: #d7f04c;">Pending</span>
                                    @else
                                        <span class="w-auto p-1 text-center text-white rounded small"
                                            style="background-color: #fa1212;">Selesai</span>
                                    @endif
                                </td>
                                <td class="flex-row gap-2 d-flex">
                                    <form method="POST" action="reservation/{{ $order->id_reservation }}">
                                        @method('DELETE')
                                        @csrf
                                        <button class="rounded shadow btn btn-delete">
                                            <i class="bi bi-trash" style="font-size: 12px;"></i>
                                        </button>
                                    </form>
                                    <a data-bs-toggle="modal" data-bs-target="#update-pemesan{{ $order->id_product }}"
                                        class="rounded shadow btn btn-edit">
                                        <i class="bi bi-pencil" style="font-size: 12px;"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="background-color: #f7d5d5" class="p-2 rounded">
                                    <div class="flex-row gap-2 d-flex align-items-center justify-content-center fs-5">
                                        <i class="bi bi-database-dash"></i>
                                        <span class="fs-6">Data Pesanan Kosong</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>
    </div>
    @push('script')
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script src="//cdn.datatables.net/2.1.5/js/dataTables.min.js"></script>
        <script>
            let table = new DataTable('#myTable', {
                columns: [
                    null,
                    null,
                    null,
                    {
                        data: 'office', // can be null or undefined
                        defaultContent: ''
                    }
                ]
            });
        </script>
    @endpush
@endpush
