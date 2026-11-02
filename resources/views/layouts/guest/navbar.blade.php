<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <img src="{{ asset('img/logo.png') }}" alt="Daffa-Service" style="height: 45px; width: 45px; object-fit: cover; border-radius: 8px; mix-blend-mode: normal;">
        <h2 class="m-0 text-primary ms-2">Daffa Service</h2>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0 align-items-center">
            <a href="{{ url('/') }}#home" class="nav-item nav-link active">Home</a>
            <a href="{{ url('/') }}#about" class="nav-item nav-link">About</a>
            <a href="{{ url('/') }}#services" class="nav-item nav-link">
                Layanan <span class="badge bg-danger text-white rounded-pill ms-1" style="font-size: 0.65rem;">Eloquent</span>
            </a>
            <a href="{{ url('/') }}#technicians" class="nav-item nav-link">
                Teknisi <span class="badge bg-primary text-white rounded-pill ms-1" style="font-size: 0.65rem;">QueryBuilder</span>
            </a>
            <a href="{{ url('/') }}#contact" class="nav-item nav-link">Contact</a>
            
            <div class="ms-lg-3 my-2 my-lg-0">
                <a href="{{ route('pelanggan.index') }}" class="btn btn-danger py-2 px-3 fw-bold">
                    <i class="fa fa-tachometer-alt me-1"></i> Admin Panel
                </a>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->
