<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Alamat Kami</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Umban Sari No. 1, Rumbai, Pekanbaru</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 812-3456-7890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>bengkel@daffaservice.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Jam Operasional</h4>
                <h6 class="text-light">Senin - Jumat:</h6>
                <p class="mb-4">08.00 WIB - 17.00 WIB</p>
                <h6 class="text-light">Sabtu:</h6>
                <p class="mb-0">08.00 WIB - 15.00 WIB (Minggu Libur)</p>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Layanan Populer</h4>
                <a class="btn btn-link" href="#services">Diagnostic Scan ECU</a>
                <a class="btn btn-link" href="#services">Engine Tune Up</a>
                <a class="btn btn-link" href="#services">Spooring & Balancing</a>
                <a class="btn btn-link" href="#services">Ganti Oli Mesin</a>
                <a class="btn btn-link" href="#services">Servis AC & Evaporator</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Tentang Daffa Service</h4>
                <p>Bengkel spesialis perawatan dan perbaikan mobil terpercaya dengan teknisi profesional, suku cadang original, dan peralatan modern berstandar resmi.</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-primary w-100 py-2">
                        <i class="fa fa-lock me-1"></i> Masuk Dashboard Admin
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; {{ date('Y') }} <a class="border-bottom" href="#">Daffa Service</a>, All Right Reserved.
                    Dirancang untuk Project Praktikum Framework Web.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{ url('/') }}">Home</a>
                        <a href="#services">Layanan (Eloquent)</a>
                        <a href="#technicians">Teknisi (QueryBuilder)</a>
                        <a href="{{ route('pelanggan.index') }}">Admin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
