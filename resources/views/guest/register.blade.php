@extends('layouts.guest')

@section('title', 'Daffa Service | Halaman Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-custom">
            <div class="card-header card-header-custom text-center">
                <h4 class="mb-0 fw-bold heading-font text-white">
                    <i class="fa fa-user-plus me-2 text-danger"></i> Halaman Register
                </h4>
                <small class="text-white-50">Lengkapi formulir di bawah untuk mendaftar akun baru</small>
            </div>
            <div class="card-body p-4">

                <!-- Alert Error Ringkasan Validasi -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                        <strong><i class="fa fa-exclamation-triangle me-1"></i> Periksa kembali data form:</strong>
                        <ul class="mb-0 mt-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('register.process') }}" method="POST">
                    @csrf
                    
                    <!-- Input 1: Name (Soal 1) -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" id="name" name="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   placeholder="Masukkan Nama Lengkap" 
                                   value="{{ old('name') }}" required>
                        </div>
                        @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input 2: Email (Soal 1) -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input type="email" id="email" name="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   placeholder="Masukkan Alamat Email" 
                                   value="{{ old('email') }}" required>
                        </div>
                        @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input 3: Password (Soal 1) -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" id="password" name="password" 
                                   class="form-control @error('password') is-invalid @enderror" 
                                   placeholder="Minimal 6 karakter" required>
                        </div>
                        @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Input 4: Confirm Password (Soal 1) -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-bold">Confirm Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-check-circle"></i></span>
                            <input type="password" id="password_confirmation" name="password_confirmation" 
                                   class="form-control" placeholder="Ulangi Password" required>
                        </div>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-danger-custom py-2 fw-bold">
                            <i class="fa fa-user-plus me-1"></i> Register
                        </button>
                    </div>
                </form>

                <hr class="my-4">

                <div class="text-center small">
                    Sudah punya akun? <a href="{{ url('/auth') }}" class="text-danger fw-bold text-decoration-none">Login di sini</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
