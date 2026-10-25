<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daffa Service | Edit Pelanggan</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Ubuntu', sans-serif;
            background-color: #f8f9fa;
        }
        .heading-font {
            font-family: 'Barlow', sans-serif;
        }
        .sidebar {
            background-color: #1f2937;
            min-height: 100vh;
        }
        .sidebar .nav-link {
            color: #d1d5db;
            border-radius: 6px;
            margin-bottom: 4px;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: #ffffff;
            background-color: #dc2626;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Sederhana -->
            <nav class="col-md-3 col-lg-2 d-md-block sidebar p-3 text-white">
                <div class="d-flex align-items-center pb-3 mb-3 border-bottom border-secondary">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" height="40" class="me-2">
                    <span class="fs-5 fw-bold heading-font">Daffa Service</span>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="fa fa-home me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pelanggan.index') }}" class="nav-link active">
                            <i class="fa fa-users me-2"></i> Pelanggan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pelanggan.create') }}" class="nav-link">
                            <i class="fa fa-plus-circle me-2"></i> Tambah Pelanggan
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Konten Utama -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom flex-wrap">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/carousel-1.png') }}" alt="Mobil Daffa Service" style="height: 45px;" class="me-3 d-none d-sm-block">
                        <div>
                            <h2 class="h4 heading-font fw-bold mb-0 text-dark">Edit Data Pelanggan</h2>
                            <small class="text-muted">Formulir perubahan data pelanggan {{ $dataPelanggan->first_name }}</small>
                        </div>
                    </div>
                    <div class="mt-2 mt-sm-0">
                        <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary">
                            <i class="fa fa-arrow-left me-1"></i> Kembali
                        </a>
                    </div>
                </div>

                <!-- Alert Error Validasi -->
                @if ($errors->any())
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
                                    <button type="submit" class="btn btn-info text-white px-4">Simpan Perubahan</button>
                                    <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
