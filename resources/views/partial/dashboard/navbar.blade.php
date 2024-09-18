<!-- ======= Header ======= -->
<header id="header" class="shadow header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="/dashboard" class="logo d-flex align-items-center">
            <img src="assets/img/logo-batik.png" alt="logo">
            {{-- <span class="d-none d-lg-block text-primary">Klampar <span class="span-text"><br>Kabuppaten Proppo
                    Pamekasan</span></span> --}}
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li>
        </ul>
    </nav><!-- End Icons Navigation -->

    <div class="mx-5 d-flex justify-content-center align-items-center">
        @auth
            <div class="mx-2 rounded-circle">
                <img src="{{ auth()->user()->avatar }}" alt="avatar" width="30px" class="rounded-circle">
            </div>
            <div class="d-flex flex-column justify-content-center lh-1 ailgn-items-center profil">
                <span class="fw-bold text-primary">{{ auth()->user()->name }} <br></span>
                @if (auth()->user()->role_id == 1)
                    <span class="span-text" style="font-size: 12px">Admin</span>
                @elseif (auth()->user()->role_id == 2)
                    <span class="span-text" style="font-size: 12px">Seller</span>
                @endif
            </div>
        @endauth
    </div>

</header><!-- End Header -->
