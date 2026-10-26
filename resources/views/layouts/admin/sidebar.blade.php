<!-- Partial View: Sidebar Menu Admin Daffa Service -->
<nav class="col-md-3 col-lg-2 d-md-block sidebar p-3 text-white">
    <!-- Brand / Logo -->
    <div class="d-flex align-items-center pb-3 mb-3 border-bottom border-secondary">
        <img src="{{ asset('img/logo.png') }}" alt="Logo Daffa Service" height="40" class="me-2 rounded">
        <div>
            <span class="fs-5 fw-bold heading-font d-block text-white leading-tight">Daffa Service</span>
            <small class="text-secondary" style="font-size: 0.72rem; letter-spacing: 0.05em;">ADMIN PANEL</small>
        </div>
    </div>

    <!-- Navigation Menu -->
    <ul class="nav flex-column">
        <li class="nav-header">Utama</li>
        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fa fa-tachometer-alt me-2" style="width: 20px;"></i> Dashboard
            </a>
        </li>

        <li class="nav-header">Manajemen Data</li>
        <li class="nav-item">
            <a href="{{ route('pelanggan.index') }}" class="nav-link {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}">
                <i class="fa fa-users me-2" style="width: 20px;"></i> Data Pelanggan
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}">
                <i class="fa fa-user-shield me-2" style="width: 20px;"></i> Data User
            </a>
        </li>

        <li class="nav-header">Navigasi Luar</li>
        <li class="nav-item">
            <a href="{{ url('/') }}" target="_blank" class="nav-link text-white-50">
                <i class="fa fa-external-link-alt me-2" style="width: 20px;"></i> Lihat Website
            </a>
        </li>
    </ul>

    <!-- Info Footer Sidebar -->
    <div class="mt-auto pt-4 border-top border-secondary text-secondary small d-none d-md-block" style="font-size: 0.75rem;">
        <i class="fa fa-wrench text-danger me-1"></i> Bengkel & Servis Mobil
    </div>
</nav>

