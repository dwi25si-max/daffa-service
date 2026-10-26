<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>@yield('title', 'Daffa Service - Bengkel & Servis Mobil Profesional')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Bengkel mobil terpercaya di Pekanbaru" name="description">

    <!-- Partial View: CSS & Fonts Guest -->
    @include('layouts.guest.css')
    @stack('styles')
</head>

<body>
    <!-- Partial View: Topbar -->
    @include('layouts.guest.topbar')

    <!-- Partial View: Navbar -->
    @include('layouts.guest.navbar')

    <!-- Main Content -->
    @yield('content')

    <!-- Partial View: Footer -->
    @include('layouts.guest.footer')

    <!-- Partial View: Scripts -->
    @include('layouts.guest.js')
    @stack('scripts')
</body>

</html>

