@extends('layouts.admin.app')

@section('title', 'Daffa Service | Edit Pelanggan')
@section('page_title', 'Edit Pelanggan')
@section('page_subtitle', 'Perbarui informasi data pelanggan')

@section('header_action')
    <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary">
        <i class="fa fa-arrow-left me-1"></i> Kembali
    </a>
@endsection

@section('content')
    <!-- Alert Error Validasi -->
    @if (isset($errors) && $errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Periksa kembali form Anda:</strong>
            <ul class="mb-0 mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Form Edit Pelanggan -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <form action="{{ route('pelanggan.update', $dataPelanggan->pelanggan_id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="first_name" class="form-label fw-bold">First Name <span class="text-danger">*</span></label>
                        <input type="text" id="first_name" name="first_name" 
                               class="form-control @error('first_name') is-invalid @enderror" 
                               value="{{ old('first_name', $dataPelanggan->first_name) }}" required>
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="last_name" class="form-label fw-bold">Last Name <span class="text-danger">*</span></label>
                        <input type="text" id="last_name" name="last_name" 
                               class="form-control @error('last_name') is-invalid @enderror" 
                               value="{{ old('last_name', $dataPelanggan->last_name) }}" required>
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="birthday" class="form-label fw-bold">Birthday <span class="text-danger">*</span></label>
                        <input type="date" id="birthday" name="birthday" 
                               class="form-control @error('birthday') is-invalid @enderror" 
                               value="{{ old('birthday', $dataPelanggan->birthday) }}" required>
                        @error('birthday')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="gender" class="form-label fw-bold">Gender <span class="text-danger">*</span></label>
                        <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror" required>
                            <option value="">-- Pilih --</option>
                            <option value="Male" {{ old('gender', $dataPelanggan->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender', $dataPelanggan->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               value="{{ old('email', $dataPelanggan->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label fw-bold">Phone <span class="text-danger">*</span></label>
                        <input type="text" id="phone" name="phone" 
                               class="form-control @error('phone') is-invalid @enderror" 
                               value="{{ old('phone', $dataPelanggan->phone) }}" required>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4 pt-2">
                        <button type="submit" class="btn btn-info text-white px-4">
                            <i class="fa fa-save me-1"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
