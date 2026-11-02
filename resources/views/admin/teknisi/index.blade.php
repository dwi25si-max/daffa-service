@extends('layouts.admin.app')

@section('title', 'Daffa Service | Data Teknisi (Query Builder)')
@section('page_title', 'Data Teknisi & Mekanik')
@section('page_subtitle', 'Modul CRUD Teknisi menggunakan Laravel Query Builder (DB Facade)')

@section('header_action')
    <a href="{{ route('teknisi.create') }}" class="btn btn-danger">
        <i class="fa fa-user-plus me-1"></i> Tambah Teknisi
    </a>
@endsection

@section('content')
    <!-- Banner Info Query Builder -->
    <div class="alert alert-light border shadow-sm mb-4">
        <div class="d-flex align-items-center">
            <span class="badge bg-primary p-2 me-3"><i class="fa fa-database fa-lg"></i></span>
            <div>
                <strong class="text-dark">Modul Query Builder:</strong>
                <span class="text-muted"> Data di halaman ini diambil menggunakan <code>DB::table('teknisi')->join('layanan', 'teknisi.layanan_id', '=', 'layanan.id')->get()</code> tanpa melalui Eloquent ORM.</span>
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

    <!-- Tabel Teknisi -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" style="width: 60px;">No</th>
                            <th>Teknisi</th>
                            <th>Jabatan</th>
                            <th>Spesialisasi Layanan (JOIN)</th>
                            <th>No. Handphone</th>
                            <th class="text-center">Pengalaman</th>
                            <th class="text-center">Status</th>
                            <th class="text-center" style="width: 170px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($teknisi as $index => $t)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('img/' . ($t->foto ?: 'team-1.jpg')) }}" alt="{{ $t->nama_teknisi }}" 
                                             class="rounded-circle me-3 border" style="width: 44px; height: 44px; object-fit: cover;">
                                        <div>
                                            <strong class="text-dark">{{ $t->nama_teknisi }}</strong>
                                        </div>
                                    </div>
                                </td>
                                <td><span class="text-muted">{{ $t->jabatan }}</span></td>
                                <td>
                                    <span class="badge bg-danger">
                                        <i class="fa fa-tools me-1"></i> {{ $t->spesialisasi_layanan }}
                                    </span>
                                </td>
                                <td><i class="fa fa-phone-alt text-muted me-1 small"></i> {{ $t->no_hp }}</td>
                                <td class="text-center"><strong>{{ $t->pengalaman_tahun }}</strong> Tahun</td>
                                <td class="text-center">
                                    @if($t->status == 'Aktif')
                                        <span class="badge bg-success">Aktif</span>
                                    @elseif($t->status == 'Cuti')
                                        <span class="badge bg-warning text-dark">Cuti</span>
                                    @else
                                        <span class="badge bg-secondary">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('teknisi.edit', $t->id) }}" class="btn btn-info btn-sm text-white">
                                        <i class="fa fa-edit me-1"></i> Edit
                                    </a>
                                    <form action="{{ route('teknisi.destroy', $t->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data teknisi {{ $t->nama_teknisi }}?')">
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
                                <td colspan="8" class="text-center text-muted py-4">
                                    Belum ada data teknisi. Silakan klik tombol <strong>Tambah Teknisi</strong>.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
