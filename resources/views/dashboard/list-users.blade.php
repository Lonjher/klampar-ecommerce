@extends('layouts.dashboard')

@push('main-content')
    @include('partial.dashboard.navbar')
    @section('style')
        <style>
            .user-row {
                padding: 10px 0px 10px 0px;
                border-bottom: 1px solid #ddd;
            }

            .cetak {
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
                            <form action="/makeAdmin/{{ $user->username }}" method="POST">
                                @csrf
                                <button class="btn btn-primary btn-sm confirm-admin">Admin</button>
                            </form>
                            <form action="/makeSeller/{{ $user->username }}" method="POST">
                                @csrf
                                <button class="btn btn-warning btn-sm confirm-seller">Seller</button>
                            </form>
                            <form action="/makeUser/{{ $user->username }}" method="POST">
                                @csrf
                                <button class="btn btn-success btn-sm confirm-user">User</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Tambahkan pengguna lainnya di sini -->
        </div>
    </div>
    @push('script')
        @if (session('success'))
            <script>
                Swal.fire({
                    title: 'Sukses',
                    icon: 'success',
                    text: '{{ session('success') }}',
                    timer: 3000
                })
            </script>
        @endif
        <script>
            Swal.fire({
                title: 'Hati Hati!',
                icon: 'warning',
                text: 'Mohon hati-hati dalam mengubah data Pengguna',
            })
        </script>
        @if (session('warning'))
            <script>
                Swal.fire({
                    title: 'Gagal',
                    icon: 'error',
                    text: '{{ session('warning') }}',
                    timer: 3000
                })
            </script>
        @endif
        <script>
            $('.confirm-admin').on('click', function(event) {
                let form = $(this).closest('form')
                event.preventDefault()
                Swal.fire({
                    title: "Anda yakin?",
                    text: "menjadikan Pengguna sebagai Admin!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit()
                    }
                });
            })
            $('.confirm-seller').on('click', function(event) {
                let form = $(this).closest('form')
                event.preventDefault()
                Swal.fire({
                    title: "Anda yakin?",
                    text: "menjadikan Pengguna sebagai Penjual!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit()
                    }
                });
            })
            $('.confirm-user').on('click', function(event) {
                let form = $(this).closest('form')
                event.preventDefault()
                Swal.fire({
                    title: "Anda yakin?",
                    text: "menjadikan Pengguna sebagai User Biasa!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit()
                    }
                });
            })
        </script>
    @endpush
@endpush
