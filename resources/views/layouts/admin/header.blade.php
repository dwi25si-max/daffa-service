<div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom flex-wrap">
    <div class="d-flex align-items-center">
        <img src="{{ asset('img/carousel-1.png') }}" alt="Mobil Daffa Service" style="height: 48px;" class="me-3 d-none d-sm-block">
        <div>
            <h2 class="h4 heading-font fw-bold mb-0 text-dark">@yield('page_title', 'Daffa Service Admin')</h2>
            <small class="text-muted">@yield('page_subtitle', 'Panel Pengelolaan Bengkel Daffa Service')</small>
        </div>
    </div>
    <div class="mt-2 mt-sm-0">
        @yield('header_action')
    </div>
</div>
