<!-- Partial View: Navbar Guest -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-danger d-flex align-items-center" href="{{ url('/') }}">
            <i class="fa fa-car me-2"></i> Daffa Service
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#guestNav" aria-controls="guestNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="guestNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active fw-bold text-white' : '' }}" href="{{ url('/') }}">
                        <i class="fa fa-home me-1"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('auth*') ? 'active fw-bold text-white' : '' }}" href="{{ url('/auth') }}">
                        <i class="fa fa-sign-in-alt me-1"></i> Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('register*') ? 'active fw-bold text-white' : '' }}" href="{{ url('/register') }}">
                        <i class="fa fa-user-plus me-1"></i> Register
                    </a>
                </li>
                <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                    <a class="btn btn-outline-danger btn-sm" href="{{ route('admin.dashboard') }}">
                        <i class="fa fa-tachometer-alt me-1"></i> Dashboard Admin
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
