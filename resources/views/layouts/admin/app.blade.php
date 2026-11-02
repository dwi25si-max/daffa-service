<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Daffa Service | Admin Dashboard')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    @include('layouts.admin.css')
    @stack('styles')
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            @include('layouts.admin.sidebar')

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @include('layouts.admin.header')

                {{-- Start Main Content --}}
                @yield('content')
                {{-- End Main Content --}}

                @include('layouts.admin.footer')
            </main>
        </div>
    </div>

    @include('layouts.admin.js')
    @stack('scripts')
</body>

</html>
