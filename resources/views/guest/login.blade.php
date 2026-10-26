@extends('layouts.guest')

@section('title', 'Daffa Service | Halaman Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card card-custom">
            <div class="card-header card-header-custom text-center">
                <h4 class="mb-0 fw-bold heading-font text-white">
                    <i class="fa fa-sign-in-alt me-2 text-danger"></i> Halaman Login
                </h4>
                <small class="text-white-50">Silakan masukkan username dan password Anda</small>
            </div>
            <div class="card-body p-4">

                <!-- Alert Pesan Error Login (Soal 2) -->
                @if(session('alert'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                        <i class="fa fa-exclamation-triangle me-2"></i> {{ session('alert') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                        <i class="fa fa-exclamation-triangle me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Alert Pesan Sukses -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        <i class="fa fa-check-circle me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('login.process') }}" method="POST">
                    @csrf
                    
                    <!-- Input: Username (Soal 1) -->
                    <div class="mb-3">
                        <label for="username" class="form-label fw-bold">Username <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                            <input type="text" id="username" name="username" class="form-control" 
                                   placeholder="Masukkan Username" value="{{ old('username') }}" required>
                        </div>
                    </div>

                    <!-- Input: Password (Soal 1) -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" id="password" name="password" class="form-control" 
                                   placeholder="Masukkan Password" required>
                        </div>
                    </div>

                    <!-- Keterangan Logika Login (Soal 2) -->
                    <div class="alert alert-light border py-2 px-3 small text-muted">
                        <i class="fa fa-info-circle text-primary me-1"></i>
                        <strong>Aturan Login:</strong> Jika <em>Username</em> dan <em>Password</em> sama, Anda akan diarahkan ke <strong>Dashboard Admin</strong>.
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-danger-custom py-2 fw-bold">
                            <i class="fa fa-sign-in-alt me-1"></i> Login
                        </button>
                    </div>
                </form>

                <hr class="my-4">

                <div class="text-center small">
                    Belum punya akun? <a href="{{ url('/register') }}" class="text-danger fw-bold text-decoration-none">Register di sini</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
