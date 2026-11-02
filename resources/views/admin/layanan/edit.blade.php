@extends('layouts.admin.app')

@section('title', 'Daffa Service | Edit Layanan (Eloquent)')
@section('page_title', 'Edit Data Layanan')
@section('page_subtitle', 'Perbarui data katalog layanan menggunakan Eloquent ORM')

@section('header_action')
    <a href="{{ route('layanan.index') }}" class="btn btn-outline-secondary">
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

    <!-- Form Edit Layanan -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="card-title mb-0 fw-bold text-dark">
                <i class="fa fa-tools text-info me-2"></i>Edit Informasi Layanan
            </h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('layanan.update', $layanan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <!-- Nama Layanan -->
                    <div class="col-md-6">
                        <label for="nama_layanan" class="form-label fw-bold">Nama Layanan <span class="text-danger">*</span></label>
                        <input type="text" id="nama_layanan" name="nama_layanan" 
                               class="form-control @error('nama_layanan') is-invalid @enderror" 
                               placeholder="Nama Layanan"
                               value="{{ old('nama_layanan', $layanan->nama_layanan) }}" required autofocus>
                        @error('nama_layanan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kategori -->
                    <div class="col-md-6">
                        <label for="kategori" class="form-label fw-bold">Kategori Layanan <span class="text-danger">*</span></label>
                        <select id="kategori" name="kategori" class="form-select @error('kategori') is-invalid @enderror" required>
                            <option value="">-- Pilih Kategori --</option>
                            @php
                                $categories = ['Perawatan Rutin', 'Perbaikan Mesin', 'Diagnostic & Scan', 'Kaki-kaki & Ban', 'Kenyamanan & AC'];
                            @endphp
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}" {{ old('kategori', $layanan->kategori) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div class="col-md-6">
                        <label for="harga" class="form-label fw-bold">Harga Layanan (Rp) <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" id="harga" name="harga" 
                                   class="form-control @error('harga') is-invalid @enderror" 
                                   value="{{ old('harga', $layanan->harga) }}" min="0" step="1000" required>
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Estimasi Waktu -->
                    <div class="col-md-6">
                        <label for="estimasi_waktu" class="form-label fw-bold">Estimasi Durasi Pengerjaan <span class="text-danger">*</span></label>
                        <input type="text" id="estimasi_waktu" name="estimasi_waktu" 
                               class="form-control @error('estimasi_waktu') is-invalid @enderror" 
                               value="{{ old('estimasi_waktu', $layanan->estimasi_waktu) }}" required>
                        @error('estimasi_waktu')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Ikon FontAwesome -->
                    <div class="col-md-12">
                        <label for="ikon" class="form-label fw-bold">Pilih Ikon Layanan <span class="text-danger">*</span></label>
                        <div class="row g-2">
                            @php
                                $ikons = [
                                    'fa-car-side' => 'Car Side (Umum)',
                                    'fa-cogs' => 'Gears / Mesin',
                                    'fa-oil-can' => 'Oil Can (Pelumas)',
                                    'fa-circle-notch' => 'Wheel / Ban',
                                    'fa-snowflake' => 'Snowflake (AC)',
                                    'fa-tools' => 'Tools (Servis)',
                                    'fa-tachometer-alt' => 'Speedometer / Tune Up',
                                    'fa-shield-alt' => 'Shield (Proteksi)',
                                ];
                            @endphp
                            @foreach($ikons as $iconClass => $label)
                                <div class="col-md-3 col-sm-6">
                                    <div class="form-check p-2 border rounded d-flex align-items-center">
                                        <input class="form-check-input ms-1 me-2" type="radio" name="ikon" id="ikon_{{ $loop->index }}" 
                                               value="{{ $iconClass }}" {{ old('ikon', $layanan->ikon) == $iconClass ? 'checked' : '' }} required>
                                        <label class="form-check-label w-100 cursor-pointer" for="ikon_{{ $loop->index }}">
                                            <i class="fa {{ $iconClass }} text-danger me-2"></i> {{ $label }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('ikon')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="col-12">
                        <label for="deskripsi" class="form-label fw-bold">Deskripsi Layanan <span class="text-danger">*</span></label>
                        <textarea id="deskripsi" name="deskripsi" rows="3" 
                                  class="form-control @error('deskripsi') is-invalid @enderror" 
                                  required>{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4 pt-2">
                        <button type="submit" class="btn btn-info text-white px-4">
                            <i class="fa fa-save me-1"></i> Simpan Perubahan (Eloquent)
                        </button>
                        <a href="{{ route('layanan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
