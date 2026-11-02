@extends('layouts.admin.app')

@section('title', 'Daffa Service | Tambah Teknisi (Query Builder)')
@section('page_title', 'Tambah Teknisi Baru')
@section('page_subtitle', 'Form penambahan teknisi bengkel menggunakan Laravel Query Builder')

@section('header_action')
    <a href="{{ route('teknisi.index') }}" class="btn btn-outline-secondary">
        <i class="fa fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
    <!-- Alert Notifikasi Error Validasi -->
    @if (isset($errors) && $errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="d-flex align-items-center mb-1">
                <i class="fa fa-exclamation-triangle me-2 fs-5"></i>
                <strong>Terdapat kesalahan pada inputan form:</strong>
            </div>
            <ul class="mb-0 mt-1 ps-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Form Tambah Teknisi -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="card-title mb-0 fw-bold text-dark">
                <i class="fa fa-users-cog text-danger me-2"></i>Informasi Teknisi & Mekanik
            </h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('teknisi.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <!-- Nama Teknisi -->
                    <div class="col-md-6">
                        <label for="nama_teknisi" class="form-label fw-bold">Nama Lengkap Teknisi <span class="text-danger">*</span></label>
                        <input type="text" id="nama_teknisi" name="nama_teknisi" 
                               class="form-control @error('nama_teknisi') is-invalid @enderror" 
                               placeholder="Contoh: Budi Santoso"
                               value="{{ old('nama_teknisi') }}" required autofocus>
                        @error('nama_teknisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Spesialisasi Layanan (Foreign Key) -->
                    <div class="col-md-6">
                        <label for="layanan_id" class="form-label fw-bold">Spesialisasi Layanan (Relasi) <span class="text-danger">*</span></label>
                        <select id="layanan_id" name="layanan_id" class="form-select @error('layanan_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Layanan Spesialisasi --</option>
                            @foreach($daftarLayanan as $lay)
                                <option value="{{ $lay->id }}" {{ old('layanan_id') == $lay->id ? 'selected' : '' }}>
                                    {{ $lay->nama_layanan }} ({{ $lay->kategori }})
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted">Data ini diambil melalui Query Builder <code>DB::table('layanan')->get()</code>.</small>
                        @error('layanan_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jabatan -->
                    <div class="col-md-6">
                        <label for="jabatan" class="form-label fw-bold">Jabatan / Role <span class="text-danger">*</span></label>
                        <input type="text" id="jabatan" name="jabatan" 
                               class="form-control @error('jabatan') is-invalid @enderror" 
                               placeholder="Contoh: Master Engine Specialist"
                               value="{{ old('jabatan') }}" required>
                        @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nomor HP -->
                    <div class="col-md-6">
                        <label for="no_hp" class="form-label fw-bold">Nomor Handphone / WhatsApp <span class="text-danger">*</span></label>
                        <input type="text" id="no_hp" name="no_hp" 
                               class="form-control @error('no_hp') is-invalid @enderror" 
                               placeholder="Contoh: 081234567890"
                               value="{{ old('no_hp') }}" required>
                        @error('no_hp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Pengalaman Tahun -->
                    <div class="col-md-6">
                        <label for="pengalaman_tahun" class="form-label fw-bold">Pengalaman Kerja (Tahun) <span class="text-danger">*</span></label>
                        <input type="number" id="pengalaman_tahun" name="pengalaman_tahun" 
                               class="form-control @error('pengalaman_tahun') is-invalid @enderror" 
                               placeholder="Contoh: 5" min="0" max="50"
                               value="{{ old('pengalaman_tahun', 1) }}" required>
                        @error('pengalaman_tahun')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="col-md-6">
                        <label for="status" class="form-label fw-bold">Status Kepegawaian <span class="text-danger">*</span></label>
                        <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="Aktif" {{ old('status', 'Aktif') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="Cuti" {{ old('status') == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                            <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Pilihan Avatar Foto -->
                    <div class="col-12">
                        <label class="form-label fw-bold">Pilih Foto Profil Teknisi</label>
                        <div class="row g-3">
                            @foreach(['team-1.jpg', 'team-2.jpg', 'team-3.jpg', 'team-4.jpg'] as $fotoFile)
                                <div class="col-6 col-sm-3">
                                    <div class="card p-2 text-center border h-100">
                                        <img src="{{ asset('img/' . $fotoFile) }}" alt="{{ $fotoFile }}" 
                                             class="img-fluid rounded mb-2 mx-auto" style="height: 110px; width: 100%; object-fit: cover;">
                                        <div class="form-check d-flex justify-content-center">
                                            <input class="form-check-input" type="radio" name="foto" id="foto_{{ $loop->index }}" 
                                                   value="{{ $fotoFile }}" {{ old('foto', 'team-1.jpg') == $fotoFile ? 'checked' : '' }}>
                                            <label class="form-check-label ms-2 small" for="foto_{{ $loop->index }}">
                                                Pilih Foto {{ $loop->iteration }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12 mt-4 pt-2">
                        <button type="submit" class="btn btn-danger px-4">
                            <i class="fa fa-save me-1"></i> Simpan Teknisi (Query Builder)
                        </button>
                        <a href="{{ route('teknisi.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
