@extends('layouts.admin.app')

@section('title', 'Daffa Service | Edit User')

@section('content')
<div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom flex-wrap">
    <div class="d-flex align-items-center">
        <div class="bg-danger text-white rounded p-2 me-3 d-none d-sm-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
            <i class="fa fa-user-edit fs-4"></i>
        </div>
        <div>
            <h2 class="h4 heading-font fw-bold mb-0 text-dark">Edit User #{{ $user->id }}</h2>
            <small class="text-muted">Perbarui data profil pengguna: {{ $user->name }}</small>
        </div>
    </div>
    <div class="mt-2 mt-sm-0">
        <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
            <i class="fa fa-arrow-left me-1"></i> Kembali ke List User
        </a>
    </div>
</div>

<!-- Alert Error Ringkasan Validasi -->
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
        <strong><i class="fa fa-exclamation-triangle me-1"></i> Periksa kembali data form Anda:</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Card Form Edit User -->
<div class="card shadow-sm border-0">
    <div class="card-body p-4">
        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <!-- Field: Nama -->
                <div class="col-md-6">
                    <label for="name" class="form-label fw-bold">
                        Nama Lengkap <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                        <input type="text" id="name" name="name"
                               class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Field: Email -->
                <div class="col-md-6">
                    <label for="email" class="form-label fw-bold">
                        Alamat Email <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        <input type="email" id="email" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Field: Password Baru -->
                <div class="col-md-6">
                    <label for="password" class="form-label fw-bold">
                        Password Baru <small class="text-muted fw-normal">(Opsional)</small>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        <input type="password" id="password" name="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Biarkan kosong jika tidak diubah">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <small class="text-muted">Kosongkan kolom password jika tidak ingin mengganti password lama.</small>
                </div>

                <!-- Action Buttons -->
                <div class="col-12 mt-4 pt-2 border-top">
                    <button type="submit" class="btn btn-danger px-4">
                        <i class="fa fa-save me-1"></i> Update Perubahan
                    </button>
                    <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">
                        <i class="fa fa-times me-1"></i> Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection


