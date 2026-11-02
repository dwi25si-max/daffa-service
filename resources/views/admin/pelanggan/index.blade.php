@extends('layouts.admin.app')

@section('title', 'Daffa Service | Data Pelanggan')
@section('page_title', 'Data Pelanggan Daffa Service')
@section('page_subtitle', 'List data seluruh pelanggan bengkel mobil')

@section('header_action')
    <a href="{{ route('pelanggan.create') }}" class="btn btn-danger">
        <i class="fa fa-plus me-1"></i> Tambah Pelanggan
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
