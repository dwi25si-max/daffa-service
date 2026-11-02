<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Daffa Service - Car Repair & Auto Care Center')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="bengkel mobil, servis mobil, ganti oli, tune up, daffa service" name="keywords">
    <meta content="Daffa Service - Pusat Perawatan & Perbaikan Mobil Terpercaya" name="description">

    @include('layouts.guest.css')
    @stack('styles')
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Partial View -->
    @include('layouts.guest.topbar')

    <!-- Navbar Partial View -->
    @include('layouts.guest.navbar')

    <!-- Main Content Yield -->
    @yield('content')

    <!-- Footer Partial View -->
    @include('layouts.guest.footer')

    <!-- JavaScript Partial View -->
    @include('layouts.guest.js')
    @stack('scripts')
</body>

</html>
