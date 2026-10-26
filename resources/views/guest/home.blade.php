@extends('layouts.guest')

@section('title', 'Daffa Service | Halaman Utama Guest')

@section('content')
<div class="p-5 mb-4 bg-white rounded-4 shadow-sm border text-center">
    <div class="container-fluid py-3">
        <img src="{{ asset('img/logo.png') }}" alt="Logo Daffa Service" height="85" class="mb-3 rounded shadow-sm">
        <h1 class="display-5 fw-bold heading-font text-dark mb-2">Selamat Datang di Daffa Service</h1>
        <p class="col-md-8 mx-auto fs-5 text-muted mb-4">
            Aplikasi Manajemen Bengkel & Servis Mobil. Terapkan akses cepat untuk mengelola pelanggan dan user atau masuk ke sistem melalui halaman login.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ url('/auth') }}" class="btn btn-danger-custom btn-lg px-4 py-2 fw-bold shadow-sm">
                <i class="fa fa-sign-in-alt me-2"></i> Masuk (Login)
            </a>
            <a href="{{ url('/register') }}" class="btn btn-outline-secondary btn-lg px-4 py-2 fw-bold shadow-sm">
                <i class="fa fa-user-plus me-2"></i> Daftar Akun (Register)
            </a>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-dark btn-lg px-4 py-2 fw-bold shadow-sm">
                <i class="fa fa-tachometer-alt me-2"></i> Dashboard Admin
            </a>
        </div>
    </div>
</div>

<div class="row g-4 text-center">
    <div class="col-md-4">
        <div class="card card-custom h-100 p-4">
            <div class="text-danger mb-3">
                <i class="fa fa-tools fs-1"></i>
            </div>
            <h4 class="fw-bold heading-font">Layanan Perbaikan Mobil</h4>
            <p class="text-muted small mb-0">Perawatan berkala, tune-up, ganti oli, hingga overhaul mesin dengan mekanik berpengalaman.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom h-100 p-4">
            <div class="text-danger mb-3">
                <i class="fa fa-users fs-1"></i>
            </div>
            <h4 class="fw-bold heading-font">Manajemen Pelanggan</h4>
            <p class="text-muted small mb-0">Pendataan data pelanggan bengkel secara terstruktur dan terintegrasi dalam modul admin.</p>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-custom h-100 p-4">
            <div class="text-danger mb-3">
                <i class="fa fa-user-shield fs-1"></i>
            </div>
            <h4 class="fw-bold heading-font">Keamanan Akun Pengguna</h4>
            <p class="text-muted small mb-0">Autentikasi aman dengan enkripsi password menggunakan <code>Hash::make</code>.</p>
        </div>
    </div>
</div>
@endsection
