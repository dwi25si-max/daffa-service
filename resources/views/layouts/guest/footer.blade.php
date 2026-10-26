<!-- Partial View: Footer Guest -->
<div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <h4 class="text-light mb-4">Daffa Service</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3 text-primary"></i>Jl. Umban Sari No. 1, Rumbai, Pekanbaru</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3 text-primary"></i>+62 812-3456-7890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3 text-primary"></i>info@daffaservice.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="text-light mb-4">Jam Operasional</h4>
                <h6 class="text-light">Senin - Jumat:</h6>
                <p class="mb-3">08.00 WIB - 17.00 WIB</p>
                <h6 class="text-light">Sabtu:</h6>
                <p class="mb-0">08.00 WIB - 14.00 WIB</p>
            </div>
            <div class="col-lg-4 col-md-6">
                <h4 class="text-light mb-4">Layanan Utama</h4>
                <a class="btn btn-link" href="">Servis Mesin Mobil</a>
                <a class="btn btn-link" href="">Ganti Oli & Tune Up</a>
                <a class="btn btn-link" href="">Ganti Ban & Spooring Balancing</a>
                <a class="btn btn-link" href="">Perbaikan Rem & Kaki-kaki</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; {{ date('Y') }} <a class="border-bottom" href="{{ route('home') }}">Daffa Service</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                        <a href="{{ route('dashboard') }}">Admin</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

