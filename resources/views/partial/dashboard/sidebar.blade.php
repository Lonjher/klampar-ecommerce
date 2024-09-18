<!-- Start Utama  Nav -->
<li class="nav-item">
    <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">
        <i class="bi bi-house-door"></i>
        <span>Home</span>
    </a>
</li>
<!-- End Utama Nav -->

<!-- Start Dashboard Nav -->
<li class="nav-item">
    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>
</li>
<!-- End Dashboard Nav -->

{{-- Start Archive Section --}}
{{-- #---------------------# --}}
<li class="py-2 nav-heading text-secondary">PEMASARAN</li>

<!-- Start Produk -->
<li class="nav-item">
    <a class="nav-link {{ Request::is('stock') ? 'active' : '' }}" href="{{ route('product') }}">
        <i class="bi bi-shop"></i>
        <span>Kelola Stok</span>
    </a>
</li>
<!-- End Produk Nav -->

<li class="py-2 nav-heading text-secondary">PEMESANAN</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('reservation*') ? 'active' : '' }}" href="/reservation">
        <i class="bi bi-basket"></i>
        <span>Pemesanan Produk</span>
    </a>
</li><!-- End Listening Page Nav -->

{{-- Start Master Section --}}
{{-- #---------------------# --}}
<li class="py-2 nav-heading text-secondary">MASTER</li>
@can('admin')
    <li class="nav-item">
        <a class="nav-link {{ Request::is('users') ? 'active' : '' }}" href="{{ route('users') }}">
            <i class="bi bi-people"></i>
            <span>Pengguna</span>
        </a>
    </li>
@endcan
@if (Route::has('login') && Route::has('logout'))
    @auth
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="nav-link button {{ Request::is('login') ? 'active' : '' }}">
                    <i class="bi bi-box-arrow-in-right"></i>Logout</button>
        </li>
        </form>
    @else
        <li class="nav-item">
            <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>Login</span>
            </a>
        </li>
    @endauth
@endif

{{-- Start Master Section --}}
{{-- #---------------------# --}}
