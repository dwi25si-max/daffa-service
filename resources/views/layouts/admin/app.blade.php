<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Daffa Service | Admin Panel')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <!-- Partial View: CSS & Fonts -->
    @include('layouts.admin.css')
    @stack('styles')
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Partial View: Sidebar Menu -->
            @include('layouts.admin.sidebar')

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')

                <!-- Partial View: Footer -->
                @include('layouts.admin.footer')
            </main>
        </div>
    </div>

    <!-- Partial View: Scripts -->
    @include('layouts.admin.js')
    @stack('scripts')
</body>

</html>

