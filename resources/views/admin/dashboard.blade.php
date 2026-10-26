@extends('layouts.admin.app')

@section('title', 'Daffa Service | Dashboard Admin')

@section('content')
<!-- Topbar Header Dashboard -->
<div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom flex-wrap">
    <div class="d-flex align-items-center">
        <div class="bg-danger text-white rounded p-2 me-3 d-none d-sm-flex align-items-center justify-content-center" style="width: 48px; height: 48px;">
            <i class="fa fa-tachometer-alt fs-4"></i>
        </div>
        <div>
            <h2 class="h4 heading-font fw-bold mb-0 text-dark">Dashboard Administrator</h2>
            <small class="text-muted">Selamat datang di Panel Kontrol Bengkel Daffa Service</small>
        </div>
    </div>
    <div class="mt-2 mt-sm-0">
        <a href="{{ url('/') }}" target="_blank" class="btn btn-outline-secondary btn-sm me-2">
            <i class="fa fa-external-link-alt me-1"></i> Buka Website
        </a>
        <a href="{{ route('pelanggan.create') }}" class="btn btn-danger btn-sm">
            <i class="fa fa-plus me-1"></i> Tambah Pelanggan
        </a>
    </div>
</div>

<!-- Notifikasi Flash Sukses (misal setelah login) -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Welcome Card Banner -->
<div class="card shadow-sm border-0 bg-dark text-white mb-4 p-4" style="background: linear-gradient(135deg, #111827 0%, #1f2937 50%, #dc2626 100%);">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h3 class="fw-bold heading-font mb-1">
                Halo, {{ session('logged_user', 'Admin') }}! 👋
            </h3>
            <p class="mb-0 text-white-50">
                Anda berhasil masuk ke sistem manajemen bengkel <strong>Daffa Service</strong>. Kelola data pelanggan dan pengguna sistem dengan mudah.
            </p>
        </div>
        <div class="col-md-4 text-md-end mt-3 mt-md-0">
            <span class="badge bg-danger fs-6 px-3 py-2 shadow-sm">
                <i class="fa fa-shield-alt me-1"></i> Status: Administrator
            </span>
        </div>
    </div>
</div>

<!-- Grid Kartu Statistik -->
<div class="row g-3 mb-4">
    <!-- Stat 1: Total Pelanggan -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body p-4 d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small text-uppercase fw-bold">Total Pelanggan</span>
                    <h2 class="fw-bold heading-font text-dark mb-0 mt-1">{{ $totalPelanggan ?? 0 }}</h2>
                    <a href="{{ route('pelanggan.index') }}" class="text-danger small fw-bold text-decoration-none mt-2 d-inline-block">
                        Lihat Data Pelanggan <i class="fa fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="rounded-circle bg-danger bg-opacity-10 text-danger d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                    <i class="fa fa-users fs-3"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stat 2: Total User -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body p-4 d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small text-uppercase fw-bold">Total Pengguna (User)</span>
                    <h2 class="fw-bold heading-font text-dark mb-0 mt-1">{{ $totalUser ?? 0 }}</h2>
                    <a href="{{ route('user.index') }}" class="text-danger small fw-bold text-decoration-none mt-2 d-inline-block">
                        Lihat Data User <i class="fa fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="rounded-circle bg-danger bg-opacity-10 text-danger d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                    <i class="fa fa-user-shield fs-3"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Stat 3: Status Bengkel -->
    <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body p-4 d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small text-uppercase fw-bold">Status Bengkel</span>
                    <h4 class="fw-bold text-success mb-0 mt-1">
                        <i class="fa fa-circle fs-6 me-1 text-success"></i> Aktif Beroperasi
                    </h4>
                    <span class="text-muted small mt-2 d-inline-block">Bengkel Mobil Daffa Service</span>
                </div>
                <div class="rounded-circle bg-success bg-opacity-10 text-success d-flex align-items-center justify-content-center" style="width: 55px; height: 55px;">
                    <i class="fa fa-wrench fs-3"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Pelanggan Terbaru -->
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold heading-font">
            <i class="fa fa-history text-danger me-2"></i> Pelanggan Terbaru Terdaftar
        </h5>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-sm btn-outline-danger">
            Lihat Semua Pelanggan
        </a>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>No. Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentPelanggan as $item)
                        <tr>
                            <td>
                                <strong>{{ $item->first_name }} {{ $item->last_name }}</strong>
                            </td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->gender ?? '-' }}</td>
                            <td>{{ $item->phone ?? '-' }}</td>
                            <td>
                                <a href="{{ route('pelanggan.edit', $item->pelanggan_id) }}" class="btn btn-sm btn-info text-white">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Belum ada pelanggan tercatat.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

