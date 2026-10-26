<!-- Partial View: Navbar Guest -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img src="{{ asset('img/logo.png') }}" alt="Daffa-Service" style="height: 45px; width: 45px; object-fit: cover; border-radius: 8px;">
        <h2 class="m-0 text-primary ms-2 heading-font fw-bold">Daffa Service</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0 align-items-lg-center">
            <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">
                <i class="fa fa-home me-1"></i> Home
            </a>
            <a href="{{ route('login') }}" class="nav-item nav-link {{ request()->is('auth*') ? 'active' : '' }}">
                <i class="fa fa-sign-in-alt me-1"></i> Login
            </a>
            <a href="{{ route('register') }}" class="nav-item nav-link {{ request()->is('register*') ? 'active' : '' }}">
                <i class="fa fa-user-plus me-1"></i> Register
            </a>
            <div class="ms-lg-3 my-2 my-lg-0 pe-4">
                <a href="{{ route('dashboard') }}" class="btn btn-danger py-2 px-3 rounded-pill text-white fw-bold">
                    <i class="fa fa-tachometer-alt me-1"></i> Admin Panel
                </a>
            </div>
        </div>
    </div>
</nav>

