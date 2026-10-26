@extends('layouts.admin.app')

@section('title', 'Daffa Service | Data User')

@section('content')
<!-- Header dengan Judul & Tombol Tambah User -->
<div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom flex-wrap">
    <div class="d-flex align-items-center">
        <div class="bg-danger text-white rounded p-2 me-3 d-none d-sm-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
            <i class="fa fa-user-shield fs-4"></i>
        </div>
        <div>
            <h2 class="h4 heading-font fw-bold mb-0 text-dark">Data Pengguna (User)</h2>
            <small class="text-muted">Kelola akun pengguna dan administrator Daffa Service</small>
        </div>
    </div>
    <div class="mt-2 mt-sm-0">
        <a href="{{ route('user.create') }}" class="btn btn-danger">
            <i class="fa fa-user-plus me-1"></i> Tambah User Baru
        </a>
    </div>
</div>

<!-- Notifikasi Flash Sukses -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
        <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Tabel User -->
<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 70px;">ID</th>
                        <th>Nama Pengguna</th>
                        <th>Email</th>
                        <th>Status Password</th>
                        <th>Terdaftar Sejak</th>
                        <th class="text-center" style="width: 170px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataUser as $item)
                        <tr>
                            <td>
                                <span class="badge bg-secondary">#{{ $item->id }}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center me-2 fw-bold" style="width: 34px; height: 34px; font-size: 0.85rem;">
                                        {{ strtoupper(substr($item->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <strong class="d-block text-dark">{{ $item->name }}</strong>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <i class="fa fa-envelope text-muted me-1 small"></i> {{ $item->email }}
                            </td>
                            <td>
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2 py-1">
                                    <i class="fa fa-lock me-1"></i> Terenkripsi (Hash)
                                </span>
                            </td>
                            <td>
                                <small class="text-muted">
                                    {{ $item->created_at ? $item->created_at->format('d M Y, H:i') : '-' }}
                                </small>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('user.edit', $item->id) }}" class="btn btn-info btn-sm text-white me-1">
                                    <i class="fa fa-edit me-1"></i> Edit
                                </a>
                                <form action="{{ route('user.destroy', $item->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user: {{ $item->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash me-1"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                <i class="fa fa-users-slash fs-2 d-block mb-2 text-secondary"></i>
                                Belum ada user terdaftar. Silakan klik tombol <strong>Tambah User Baru</strong>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

