@extends('layouts.admin.app')

@section('title', 'Daffa Service | Tambah User')
@section('page_title', 'Tambah User Baru')
@section('page_subtitle', 'Formulir pembuatan akun user baru di sistem Daffa Service')

@section('header_action')
    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
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

    <!-- Form Tambah User -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="card-title mb-0 fw-bold text-dark">
                <i class="fa fa-user-plus text-danger me-2"></i>Informasi Akun User
            </h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <!-- Nama Lengkap -->
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" id="name" name="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Masukkan nama lengkap"
                                   value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                        <label for="email" class="form-label fw-bold">Email Address <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input type="email" id="email" name="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   placeholder="nama@email.com"
                                   value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="col-md-6">
                        <label for="password" class="form-label fw-bold">Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" id="password" name="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   placeholder="Minimal 8 karakter" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">Password minimal harus 8 karakter.</small>
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-shield-alt"></i></span>
                            <input type="password" id="password_confirmation" name="password_confirmation" 
                                   class="form-control" 
                                   placeholder="Ulangi password di atas" required>
                        </div>
                        <small class="text-muted">Pastikan konfirmasi sama persis dengan password.</small>
                    </div>

                    <div class="col-12 mt-4 pt-2">
                        <button type="submit" class="btn btn-danger px-4">
                            <i class="fa fa-save me-1"></i> Simpan User
                        </button>
                        <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
