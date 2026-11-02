@extends('layouts.admin.app')

@section('title', 'Daffa Service | Edit User')
@section('page_title', 'Edit Data User')
@section('page_subtitle', 'Perbarui data akun user {{ $user->name }}')

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

    <!-- Form Edit User -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom">
            <h5 class="card-title mb-0 fw-bold text-dark">
                <i class="fa fa-user-edit text-info me-2"></i>Edit Informasi User
            </h5>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <!-- Nama Lengkap -->
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" id="name" name="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Masukkan nama lengkap"
                                   value="{{ old('name', $user->name) }}" required autofocus>
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
                                   value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Password Baru (Opsional) -->
                    <div class="col-md-6">
                        <label for="password" class="form-label fw-bold">Password Baru <small class="text-muted fw-normal">(Opsional)</small></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" id="password" name="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   placeholder="Kosongkan jika tidak ingin mengubah password">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <small class="text-muted">Biarkan kosong bila tidak ingin mengganti password lama.</small>
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Password Baru</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-shield-alt"></i></span>
                            <input type="password" id="password_confirmation" name="password_confirmation" 
                                   class="form-control" 
                                   placeholder="Ulangi password baru jika diubah">
                        </div>
                        <small class="text-muted">Wajib diisi bila field Password Baru diisi.</small>
                    </div>

                    <div class="col-12 mt-4 pt-2">
                        <button type="submit" class="btn btn-info text-white px-4">
                            <i class="fa fa-save me-1"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
