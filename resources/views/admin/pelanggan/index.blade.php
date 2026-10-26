@extends('layouts.admin.app')

@section('title', 'Daffa Service | Data Pelanggan')

@section('content')
<!-- Header dengan Logo & Info Mobil -->
<div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom flex-wrap">
    <div class="d-flex align-items-center">
        <img src="{{ asset('img/carousel-1.png') }}" alt="Mobil Daffa Service" style="height: 50px;" class="me-3 d-none d-sm-block">
        <div>
            <h2 class="h4 heading-font fw-bold mb-0 text-dark">Data Pelanggan Daffa Service</h2>
            <small class="text-muted">List data seluruh pelanggan bengkel mobil</small>
        </div>
    </div>
    <div class="mt-2 mt-sm-0">
        <a href="{{ route('pelanggan.create') }}" class="btn btn-danger">
            <i class="fa fa-plus me-1"></i> Tambah Pelanggan
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

<!-- Tabel Pelanggan -->
<div class="card shadow-sm border-0">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Birthday</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th class="text-center" style="width: 160px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataPelanggan as $item)
                        <tr>
                            <td>{{ $item->first_name }}</td>
                            <td>{{ $item->last_name }}</td>
                            <td>{{ $item->birthday ? date('d-m-Y', strtotime($item->birthday)) : '-' }}</td>
                            <td>{{ $item->gender ?? '-' }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone ?? '-' }}</td>
                            <td class="text-center">
                                <a href="{{ route('pelanggan.edit', $item->pelanggan_id) }}" class="btn btn-info btn-sm text-white">
                                    <i class="fa fa-edit me-1"></i> Edit
                                </a>
                                <form action="{{ route('pelanggan.destroy', $item->pelanggan_id) }}" method="POST" style="display:inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
                            <td colspan="7" class="text-center text-muted py-4">
                                Belum ada data pelanggan. Silakan klik tombol <strong>Tambah Pelanggan</strong>.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
