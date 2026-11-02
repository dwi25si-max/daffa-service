@extends('layouts.admin.app')

@section('title', 'Daffa Service | Data Layanan (Eloquent)')
@section('page_title', 'Data Layanan Bengkel')
@section('page_subtitle', 'Modul CRUD Layanan menggunakan Eloquent ORM Laravel')

@section('header_action')
    <a href="{{ route('layanan.create') }}" class="btn btn-danger">
        <i class="fa fa-plus me-1"></i> Tambah Layanan
    </a>
@endsection

@section('content')
    <!-- Banner Info Eloquent -->
    <div class="alert alert-light border shadow-sm mb-4">
        <div class="d-flex align-items-center">
            <span class="badge bg-danger p-2 me-3"><i class="fa fa-cube fa-lg"></i></span>
            <div>
                <strong class="text-dark">Modul Eloquent ORM:</strong>
                <span class="text-muted"> Data di halaman ini dikelola menggunakan Model <code>App\Models\Layanan</code> dengan method <code>all()</code>, <code>create()</code>, <code>update()</code>, <code>delete()</code>, serta relasi <code>hasMany(Teknisi)</code>.</span>
            </div>
        </div>
    </div>

    <!-- Flash Message Sukses -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tabel Layanan -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" style="width: 60px;">No</th>
                            <th>Layanan</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Estimasi Waktu</th>
                            <th class="text-center">Teknisi Tersedia</th>
                            <th class="text-center" style="width: 170px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($layanan as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded bg-light text-danger d-flex align-items-center justify-content-center me-3 border" style="width: 40px; height: 40px;">
                                            <i class="fa {{ $item->ikon ?: 'fa-tools' }} fs-5"></i>
                                        </div>
                                        <div>
                                            <strong>{{ $item->nama_layanan }}</strong>
                                            <div class="small text-muted text-truncate" style="max-width: 320px;">{{ $item->deskripsi }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="badge bg-secondary">{{ $item->kategori }}</span></td>
                                <td><strong class="text-danger">Rp {{ number_format($item->harga, 0, ',', '.') }}</strong></td>
                                <td><i class="far fa-clock text-muted me-1"></i> {{ $item->estimasi_waktu }}</td>
                                <td class="text-center">
                                    <span class="badge bg-info text-dark">
                                        <i class="fa fa-users-cog me-1"></i> {{ $item->teknisi_count ?? $item->teknisi->count() ?? 0 }} Teknisi
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('layanan.edit', $item->id) }}" class="btn btn-info btn-sm text-white">
                                        <i class="fa fa-edit me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('layanan.destroy', $item->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan {{ $item->nama_layanan }}?')">
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
                                    Belum ada data layanan. Silakan klik tombol <strong>Tambah Layanan</strong>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
