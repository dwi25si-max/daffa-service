<!--

=========================================================
* Volt Pro - Premium Bootstrap 5 Dashboard
=========================================================

* Product Page: https://themesberg.com/product/admin-dashboard/volt-bootstrap-5-dashboard
* Copyright 2021 Themesberg (https://www.themesberg.com)
* License (https://themesberg.com/licensing)

* Designed and coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Please contact us to request a removal.

-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Primary Meta Tags -->
    <title>Volt - Free Bootstrap 5 Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Volt - Free Bootstrap 5 Dashboard">
    <meta name="author" content="Themesberg">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets-admin/img/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets-admin/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets-admin/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets-admin/img/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('assets-admin/img/favicon/safari-pinned-tab.svg') }}" color="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    <!-- Volt CSS & Bootstrap 5 Fallback -->
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>
    <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none bg-dark">
        <a class="navbar-brand me-lg-5" href="{{ route('dashboard') }}">
            <span class="text-white fw-bold">Volt Admin</span>
        </a>
        <div class="d-flex align-items-center">
            <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark text-white sidebar collapse min-vh-100 p-3">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column pt-3 pt-md-0">
                        <li class="nav-item mb-2">
                            <a href="{{ route('dashboard') }}" class="nav-link text-white d-flex align-items-center">
                                <span class="sidebar-icon me-2">
                                    <svg class="icon icon-xs" style="width:20px;height:20px;" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                                    </svg>
                                </span>
                                <span class="sidebar-text">Dashboard</span>
                            </a>
                        </li>

                        <!-- Menu Pelanggan -->
                        <li class="nav-item active mb-2">
                            <a href="{{ route('pelanggan.index') }}" class="nav-link text-white active bg-primary rounded px-2 d-flex align-items-center">
                                <span class="sidebar-icon me-2">
                                    <svg class="icon icon-xs" style="width:20px;height:20px;" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"></path>
                                    </svg>
                                </span>
                                <span class="sidebar-text">Pelanggan</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="py-2">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard') }}">
                                    <i class="bi bi-house"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}">Pelanggan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Pelanggan</li>
                        </ol>
                    </nav>
                    <div class="d-flex justify-content-between w-100 flex-wrap align-items-center">
                        <div class="mb-3 mb-lg-0">
                            <h1 class="h4">Tambah Pelanggan</h1>
                            <p class="mb-0 text-muted">Form untuk menambahkan data pelanggan baru.</p>
                        </div>
                        <div>
                            <a href="{{ route('pelanggan.index') }}" class="btn btn-primary">
                                <i class="bi bi-arrow-left me-1"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <h6 class="alert-heading fw-bold mb-1"><i class="bi bi-exclamation-triangle-fill me-2"></i>Terjadi Kesalahan Pengisian Form:</h6>
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row mt-3">
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow components-section">
                            <div class="card-body">
                                <form action="{{ route('pelanggan.store') }}" method="POST">
                                    @csrf
                                    <div class="row mb-4">
                                        <div class="col-lg-4 col-sm-6">
                                            <!-- First Name -->
                                            <div class="mb-3">
                                                <label for="first_name" class="form-label">First name <span class="text-danger">*</span></label>
                                                <input type="text" id="first_name" name="first_name" 
                                                       class="form-control @error('first_name') is-invalid @enderror" 
                                                       value="{{ old('first_name') }}" required>
                                                @error('first_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Last Name -->
                                            <div class="mb-3">
                                                <label for="last_name" class="form-label">Last name <span class="text-danger">*</span></label>
                                                <input type="text" id="last_name" name="last_name" 
                                                       class="form-control @error('last_name') is-invalid @enderror" 
                                                       value="{{ old('last_name') }}" required>
                                                @error('last_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-6">
                                            <!-- Birthday -->
                                            <div class="mb-3">
                                                <label for="birthday" class="form-label">Birthday <span class="text-danger">*</span></label>
                                                <input type="date" id="birthday" name="birthday" 
                                                       class="form-control @error('birthday') is-invalid @enderror" 
                                                       value="{{ old('birthday') }}" required>
                                                @error('birthday')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Gender -->
                                            <div class="mb-3">
                                                <label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
                                                <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror" required>
                                                    <option value="">-- Pilih --</option>
                                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                                </select>
                                                @error('gender')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-sm-12">
                                            <!-- Email -->
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                <input type="email" id="email" name="email" 
                                                       class="form-control @error('email') is-invalid @enderror" 
                                                       value="{{ old('email') }}" required>
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Phone -->
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                                <input type="text" id="phone" name="phone" 
                                                       class="form-control @error('phone') is-invalid @enderror" 
                                                       value="{{ old('phone') }}" required>
                                                @error('phone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <!-- Buttons -->
                                            <div class="pt-2">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="bg-white rounded shadow p-4 mb-4 mt-4">
                    <div class="row">
                        <div class="col-12 col-md-4 col-xl-6 mb-4 mb-md-0">
                            <p class="mb-0 text-center text-lg-start">© {{ date('Y') }} <a class="text-primary fw-normal" href="{{ route('dashboard') }}">Daffa Service</a></p>
                        </div>
                    </div>
                </footer>
            </main>
        </div>
    </div>

    <!-- Core JS -->
    <script src="{{ asset('assets-admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets-admin/js/volt.js') }}"></script>
</body>

</html>
