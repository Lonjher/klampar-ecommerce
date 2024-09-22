<!-- ======= Header ======= -->
<header id="header" class="shadow header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="/dashboard" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/img/logo-batik.png') }}" alt="logo">
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
            <div class="mx-2 rounded-circle" style="width: 40px; height: 40px; overflow: hidden;">
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="avatar" style="width: 100%; height: 100%; object-fit: cover;" class="img-fluid rounded-circle">
            </div>
            <div class="d-flex flex-column justify-content-center lh-1 ailgn-items-center profil">
                <span class="fw-bold text-primary">{{ auth()->user()->name }} <br></span>
                <span class="span-text mt-1" style="font-size: 12px">{{ Auth::user()->role->role_name }}</span>
            </div>
        @endauth
    </div>

</header><!-- End Header -->
