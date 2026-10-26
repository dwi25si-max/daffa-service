<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Daffa Service - Guest')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Ubuntu', sans-serif;
            background-color: #f4f6f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .heading-font {
            font-family: 'Barlow', sans-serif;
        }
        .guest-content {
            flex: 1;
        }
        .card-custom {
            border: none;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            background-color: #ffffff;
        }
        .card-header-custom {
            background-color: #1f2937;
            color: #ffffff;
            border-top-left-radius: 14px !important;
            border-top-right-radius: 14px !important;
            padding: 18px 24px;
        }
        .btn-danger-custom {
            background-color: #dc2626;
            border-color: #dc2626;
            color: #ffffff;
        }
        .btn-danger-custom:hover {
            background-color: #b91c1c;
            border-color: #b91c1c;
            color: #ffffff;
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Partial View: Navbar Menu Guest -->
    @include('partials.navbar')

    <!-- Main Content Guest -->
    <main class="guest-content container py-4">
        @yield('content')
    </main>

    <!-- Footer Guest -->
    <footer class="bg-dark text-white-50 text-center py-3 mt-auto small">
        <div class="container">
            &copy; {{ date('Y') }} <strong>Daffa Service</strong>. All rights reserved.
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
