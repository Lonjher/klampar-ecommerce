@extends('layouts.dashboard')

@push('main-content')
@section('style')
<style>
    .body {
        background-color: #f8f9fa;
    }
    .profile-container {
        max-width: 600px; /* Lebar maksimum yang lebih besar */
        margin: auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .avatar {
        width: 120px; /* Ukuran avatar yang lebih besar */
        height: 120px;
        border-radius: 50%;
    }
    .banner {
        width: 100%;
        height: 200px; /* Ukuran banner yang lebih besar */
        border-radius: 10px;
        object-fit: cover;
    }
</style>
@endsection
@include('partial.dashboard.navbar')
<div style="background-color: #fefefefe" class=" rounded shadow">
    <div class="container mt-3 p-4">
        <div style="margin-bottom: 50px">
            <div class="d-flex jusify-content-center align-items-center flex-column position-relative">
                <img src="{{ asset('storage/' . $user->banner) }}" alt="Banner" class="banner mb-2">
                <div class="mx-2 rounded-circle position-absolute border border-5 border-white" style="width: 110px; height: 110px; overflow: hidden;top: 60%">
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="avatar" style="width: 100%; height: 100%; object-fit: cover;" class="img-fluid rounded-circle">
                </div>
            </div>
        </div>

        <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="mb-3 col">
                    <label for="formFile" class="form-label">Pilih File Banner</label>
                    <input class="form-control" type="file" name="banner">
                </div>
                <div class="mb-3 col">
                    <label for="formFile" class="form-label">Pilih File Avatar</label>
                    <input class="form-control" type="file" name="avatar">
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group mb-4">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
            </div>
            <div class="form-group mb-4">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="form-group mb-4">
                <label for="whatsapp">Nomor WhatsApp</label>
                <input type="text" name="wa_number" class="form-control" value="{{ $user->wa_number }}" required>
            </div>
            <div class="form-group mb-4">
                <label for="bio">Bio</label>
                <textarea name="bio" class="form-control" rows="4">{{ $user->bio }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
        </form>
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
</div>
@endpush
