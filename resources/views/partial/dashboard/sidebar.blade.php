<!-- Start Utama  Nav -->
<li class="nav-item">
    <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="/">
        <i class="bi bi-house-door"></i>
        <span>Home</span>
    </a>
</li>
<!-- End Utama Nav -->

<!-- Start Dashboard Nav -->
<li class="nav-item">
    <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>
</li>
<!-- End Dashboard Nav -->

{{-- Start Archive Section --}}
{{-- #---------------------# --}}
<li class="py-2 nav-heading text-secondary">PENJUALAN</li>

<!-- Start Produk -->
<li class="nav-item">
    <a class="nav-link {{ Request::is('stock') ? 'active' : '' }}" href="/stock">
        <i class="bi bi-shop"></i>
        <span>Kelola Stok</span>
    </a>
</li>
<!-- End Produk Nav -->

<li class="nav-item">
    <a class="nav-link {{ Request::is('sold') ? 'active' : '' }}" href="{{ route('sold') }}">
        <i class="bi bi-bag-x"></i>
        <span>Produk Terjual</span>
    </a>
</li><!-- End Speaking Page Nav -->

<li class="nav-item">
    <a class="nav-link {{ Request::is('speaking') ? 'active' : '' }}" href="#">
        <i class="bi bi-cash"></i>
        <span>Transaksi</span>
    </a>
</li><!-- End Speaking Page Nav -->

<li class="py-2 nav-heading text-secondary">PEMESANAN</li>

<li class="nav-item">
    <a class="nav-link {{ Request::is('listening') ? 'active' : '' }}" href="/listening">
        <i class="bi bi-basket"></i>
        <span>Pemesanan Produk</span>
    </a>
</li><!-- End Listening Page Nav -->

{{-- <li class="nav-item">
    <a class="nav-link {{ Request::is('reading') ? 'active' : '' }}" href="/reading">
        <i class="bi bi-book"></i>
        <span>Reading</span>
    </a>
</li><!-- End Reading Page Nav --> --}}

{{-- <li class="nav-item">
    <a class="nav-link {{ Request::is('translation') ? 'active' : '' }}" href="/translation">
        <i class="bi bi-translate"></i>
        <span>Translation</span>
    </a>
</li><!-- End Translation Page Nav --> --}}
{{-- #-------------------# --}}
{{-- End Archive Section --}}


{{-- Start Master Section --}}
{{-- #---------------------# --}}
<li class="py-2 nav-heading text-secondary">MASTER</li>

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
