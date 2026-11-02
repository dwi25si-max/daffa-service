@extends('layouts.admin.app')

@section('title', 'Daffa Service | Data User')
@section('page_title', 'Data User Pengguna')
@section('page_subtitle', 'Manajemen akun pengguna sistem Daffa Service')

@section('header_action')
    <a href="{{ route('user.create') }}" class="btn btn-danger">
        <i class="fa fa-user-plus me-1"></i> Tambah User
    </a>
@endsection

@section('content')
    <!-- Notifikasi Flash Sukses -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tabel Data User -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" style="width: 70px;">No</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Tanggal Registrasi</th>
                            <th class="text-center" style="width: 170px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $index => $u)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center me-2" style="width: 34px; height: 34px; font-weight: bold;">
                                            {{ strtoupper(substr($u->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <strong>{{ $u->name }}</strong>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $u->email }}</td>
                                <td>{{ $u->created_at ? $u->created_at->format('d M Y, H:i') : '-' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('user.edit', $u->id) }}" class="btn btn-info btn-sm text-white">
                                        <i class="fa fa-edit me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('user.destroy', $u->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user {{ $u->name }}?')">
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
                                <td colspan="5" class="text-center text-muted py-4">
                                    Belum ada data user. Silakan klik tombol <strong>Tambah User</strong>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
