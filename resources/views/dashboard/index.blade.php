@extends('layouts.dashboard')

@section('welcome-dashboard')
@section('style')
    <style>
        .cardo:hover {
            background-color: #f5f4f4de;
            color: blue;
        }
    </style>
@endsection
@push('nav-bar')
    @include('partial.dashboard.navbar')
@endpush
<div class="container p-3 mb-3 bg-white rounded shadow d-flex align-items-center">
    <img src="{{ asset('assets/svg/dashboard.svg') }}" alt="dashboard" width="90px">
    <div class="mx-3">
        <h4 class="text-primary fw-bold fz-12">Selamat Datang!</h6>
            <h6>Sistem Informasi Management Produk Batik Klampar</h6>
    </div>
</div>
<div class="container p-4 mb-4 bg-white d-flex align-items-center justify-content-center">
    <div class="container gap-3 row">
        @can('admin')
            <div class="px-3 py-1 border-2 rounded shadow col d-flex align-items-center border-top border-primary cardo">
                <div><img src="{{ asset('assets/svg/user-vector.svg') }}" width="90"></div>
                <div class="px-4 d-flex flex-column justify-content-center">
                    <span class="mb-0 fw-bold h2">{{ $userCount }}</span>
                    <small>{{ __('Total User') }}</small>
                </div>
            </div>
        @endcan
        @canany(['admin', 'seller'])
            <div class="px-3 py-1 border-2 rounded shadow col d-flex align-items-center border-top border-primary cardo">
                <div><img src="{{ asset('assets/svg/stock-vector.svg') }}" width="90"></div>
                <div class="px-4 d-flex flex-column justify-content-center">
                    <span class="mb-0 h2 fw-bold">{{ $stockCount }}</span>
                    <small>{{ __('Total Stok') }}</small>
                </div>
            </div>
        @endcanany
        <div class="px-3 py-1 border-2 rounded shadow col d-flex align-items-center border-top border-primary cardo">
            <div><img src="{{ asset('assets/svg/order.png') }}" width="90"></div>
            <div class="px-4 d-flex flex-column justify-content-center">
                <span class="mb-0 h2 fw-bold">
                    @if (Auth::user()->role_id == 3)
                        {{ $userOrderCount }}
                    @else
                        {{ $orderCount }}
                    @endif
                </span>
                <small>{{ __('Total Pesanan') }}</small>
            </div>
        </div>
    </div>
</div>
@endsection
