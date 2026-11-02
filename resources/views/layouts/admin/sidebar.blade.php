<nav class="col-md-3 col-lg-2 d-md-block sidebar p-3 text-white">
    <div class="d-flex align-items-center pb-3 mb-3 border-bottom border-secondary">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" height="40" class="me-2" style="border-radius: 6px;">
        <span class="fs-5 fw-bold heading-font">Daffa Service</span>
    </div>
    
    <div class="mb-2">
        <small class="text-uppercase text-secondary fw-bold" style="font-size: 0.7rem; letter-spacing: 0.05em;">Menu Utama</small>
    </div>
    <ul class="nav flex-column mb-3">
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fa fa-home me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('pelanggan.index') }}" class="nav-link {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
                <i class="fa fa-users me-2"></i> Pelanggan
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}">
                <i class="fa fa-user me-2"></i> User
            </a>
        </li>
    </ul>

    <div class="mb-2">
        <small class="text-uppercase text-secondary fw-bold" style="font-size: 0.7rem; letter-spacing: 0.05em;">Modul Baru Praktikum</small>
    </div>
    <ul class="nav flex-column mb-3">
        <li class="nav-item">
            <a href="{{ route('layanan.index') }}" class="nav-link {{ request()->routeIs('layanan.*') ? 'active' : '' }}">
                <i class="fa fa-cube me-2 text-danger"></i> Layanan <span class="badge bg-danger ms-1" style="font-size: 0.65rem;">Eloquent</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('teknisi.index') }}" class="nav-link {{ request()->routeIs('teknisi.*') ? 'active' : '' }}">
                <i class="fa fa-database me-2 text-info"></i> Teknisi <span class="badge bg-primary ms-1" style="font-size: 0.65rem;">QueryBuilder</span>
            </a>
        </li>
    </ul>

    <hr class="border-secondary my-3">

    <div class="px-2">
        <small class="text-uppercase text-secondary fw-bold" style="font-size: 0.7rem; letter-spacing: 0.05em;">Halaman Publik</small>
        <ul class="nav flex-column mt-2">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link text-white-50 p-1" style="font-size: 0.9rem;" target="_blank">
                    <i class="fa fa-external-link-alt me-2"></i> Lihat Halaman Guest
                </a>
            </li>
        </ul>
    </div>
</nav>
