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
    <a class="nav-link {{ Request::is('dashboard/' . Auth::user()->username) ? 'active' : '' }}"
        href="/dashboard/{{ Auth::user()->username }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>
</li>
<!-- End Dashboard Nav -->

{{-- Start Archive Section --}}
{{-- #---------------------# --}}
@canany(['admin', 'seller'])
    <li class="py-2 nav-heading text-secondary">PEMASARAN</li>

    <!-- Start Produk -->
    <li class="nav-item">
        <a class="nav-link {{ Request::is('product/' . Auth::user()->username) ? 'active' : '' }}"
            href="/product/{{ Auth::user()->username }}">
            <i class="bi bi-shop"></i>
            <span>Kelola Stok</span>
        </a>
    </li>
    <!-- End Produk Nav -->
@endcanany

<li class="py-2 nav-heading text-secondary">PEMESANAN</li>
@canany(['admin', 'seller'])
    <li class="nav-item">
        <a class="nav-link {{ Request::is('reservation*') ? 'active' : '' }}"
            href="/reservation/{{ Auth::user()->username }}">
            <i class="bi bi-basket"></i>
            <span>Pemesanan Produk</span>
        </a>
    </li>
@endcanany
@if (Auth::user()->role_id == 3)
    <li class="nav-item">
        <a class="nav-link {{ Request::is('user-order*') ? 'active' : '' }}"
            href="/user-order/{{ Auth::user()->username }}">
            <i class="bi bi-basket"></i>
            <span>Pemesanan Produk</span>
        </a>
    </li>
@endif

{{-- Start Master Section --}}
{{-- #---------------------# --}}
<li class="py-2 nav-heading text-secondary">MASTER</li>
@can('admin')
    <li class="nav-item">
        <a class="nav-link {{ Request::is('user-list*') ? 'active' : '' }}" href="{{ route('users') }}">
            <i class="bi bi-people"></i>
            <span>Pengguna</span>
        </a>
    </li>
@endcan
<li class="nav-item">
    <a class="nav-link {{ Request::is('user-profil*') ? 'active' : '' }}"
        href="/user-profile/{{ Auth::user()->username }}">
        <i class="bi bi-person-lines-fill"></i>
        <span>Profil Pengguna</span>
    </a>
</li>
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
