@extends('layouts.dashboard')

@push('main-content')
@include('partial.dashboard.navbar')
@section('style')
    <style>
        .user-row {
            padding: 10px 0px 10px 0px;
            border-bottom: 1px solid #ddd;
        }

        .cetak{
            border-bottom: 1px solid #ddd;
            padding-bottom: 12px;
        }

        .user-row:last-child {
            border-bottom: none;
        }

        .user-actions {
            text-align: right;
        }

        .user-actions .btn {
            margin-left: 10px;
        }
    </style>
@endsection
<div class="container shadow rounded p-2 d-flex bg-white justify-content-start align-items-center">
    <img src="{{ asset('assets/svg/users-list.png') }}" class="mx-4" alt="list-users">
    <span class="text-primary fw-bold fs-5">List Pengguna</span>
</div>
<div class="container rounded shadow bg-white">
    <div class="container mt-3 p-4">
        <div>
            {{-- Header --}}
            <div class="row cetak">
                <div class="col-md-3">
                    <strong>Nama</strong>
                </div>
                <div class="col-md-3">
                    <strong>Email</strong>
                </div>
                <div class="col-md-2">
                    <strong>Nomor WA</strong>
                </div>
                <div class="col-md-2">
                    <strong>Sebagai</strong>
                </div>
                <div class="col-md-2">
                    <strong>Aksi</strong>
                </div>
            </div>
            {{-- User List --}}
            @foreach ($users as $user)
            <div class="row user-row">
                <div class="col-md-3">
                    <span>{{ $user->name }}</span>
                </div>
                <div class="col-md-3">
                    <span>{{ $user->email }}</span>
                </div>
                <div class="col-md-2">
                    <span>{{ $user->wa_number }}</span>
                </div>
                <div class="col-md-2">
                    <Span>{{ $user->role->role_name }}</Span>
                </div>
                <div class="col-md-2 user-actions d-flex justify-content-start">
                    <button class="btn btn-primary btn-sm">Admin</button>
                    <form action="" method="POST">
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
        <!-- Tambahkan pengguna lainnya di sini -->
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
</div>
@endpush
