<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Daffa Service | Edit Pelanggan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Volt CSS Fallback -->
    <link type="text/css" href="{{ asset('assets-admin/css/volt.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Ubuntu', sans-serif;
            background-color: #f4f6f9;
        }
        .heading-font {
            font-family: 'Barlow', sans-serif;
        }
        .sidebar {
            background: linear-gradient(180deg, #0b1325 0%, #17233e 100%);
            box-shadow: 4px 0 15px rgba(0,0,0,0.05);
        }
        .sidebar .nav-link {
            color: #b0c0df;
            border-radius: 8px;
            padding: 10px 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: #fff;
            background-color: #e52d27;
        }
        .card-custom {
            border: none;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.04);
        }
        .btn-daffa {
            background: linear-gradient(45deg, #e52d27, #b31217);
            color: white;
            border: none;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .btn-daffa:hover {
            background: linear-gradient(45deg, #b31217, #870000);
            color: white;
            box-shadow: 0 4px 12px rgba(229, 45, 39, 0.35);
        }
    </style>
</head>

<body>
    <!-- Mobile Navbar -->
    <nav class="navbar navbar-dark bg-dark px-4 col-12 d-lg-none">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('pelanggan.index') }}">
            <img src="{{ asset('img/logo.png') }}" alt="Daffa Service Logo" height="32" class="me-2">
            <span class="fw-bold heading-font text-white">Daffa Service</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse min-vh-100 p-3">
                <div class="text-center py-3 border-bottom border-secondary mb-4">
                    <img src="{{ asset('img/logo.png') }}" alt="Daffa Service Logo" class="img-fluid mb-2" style="max-height: 75px; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.5));">
                    <h5 class="text-white fw-bold heading-font mb-0">DAFFA SERVICE</h5>
                    <small class="text-muted"><i class="fa fa-wrench text-danger me-1"></i>Car Repair & Bengkel</small>
                </div>

                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="fa fa-home me-2"></i> Beranda Bengkel
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('pelanggan.index') }}" class="nav-link active">
                            <i class="fa fa-users me-2"></i> Data Pelanggan
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('pelanggan.create') }}" class="nav-link">
                            <i class="fa fa-user-plus me-2"></i> Tambah Pelanggan
                        </a>
                    </li>
                    <li class="nav-item mt-4 pt-3 border-top border-secondary">
                        <a href="{{ url('/') }}" target="_blank" class="nav-link text-white-50">
                            <i class="fa fa-external-link-alt me-2"></i> Lihat Web Publik
                        </a>
                    </li>
                </ul>

                <!-- Mini Car Silhouette in Sidebar -->
                <div class="mt-auto pt-4 text-center d-none d-md-block">
                    <img src="{{ asset('img/carousel-1.png') }}" alt="Sports Car" class="img-fluid opacity-75" style="max-height: 55px;">
                    <p class="text-white-50 small mt-2 mb-0">Bengkel Otomotif Terpercaya</p>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="py-2">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-2">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none text-muted"><i class="fa fa-home"></i> Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('pelanggan.index') }}" class="text-decoration-none text-muted">Pelanggan</a></li>
                            <li class="breadcrumb-item active text-danger fw-bold" aria-current="page">Edit Pelanggan</li>
                        </ol>
                    </nav>
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="mb-2">
                            <h3 class="fw-bold heading-font text-dark mb-0">Edit Data Pelanggan</h3>
                            <p class="text-muted small mb-0">Perbarui informasi identitas pelanggan dan pemilik kendaraan</p>
                        </div>
                        <div>
                            <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary">
                                <i class="fa fa-arrow-left me-1"></i> Kembali ke Daftar
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Alert Error Rangkuman Validasi -->
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mt-3 card-custom border-start border-danger border-4" role="alert">
                        <h6 class="alert-heading fw-bold mb-1"><i class="fa fa-exclamation-triangle me-2"></i>Terjadi Kesalahan Pengisian Form:</h6>
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
                        <div class="card card-custom shadow-sm">
                            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center">
                                    <div class="bg-info bg-opacity-10 p-2 rounded-circle me-3 text-info">
                                        <i class="fa fa-user-edit fs-5"></i>
                                    </div>
                                    <h5 class="mb-0 fw-bold heading-font">Ubah Data: {{ $dataPelanggan->first_name }} {{ $dataPelanggan->last_name }}</h5>
                                </div>
                                <img src="{{ asset('img/carousel-1.png') }}" alt="Mobil Daffa Service" style="max-height: 40px;" class="d-none d-sm-block">
                            </div>
                            <div class="card-body p-4">
                                <form action="{{ route('pelanggan.update', $dataPelanggan->pelanggan_id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-4">
                                        <div class="col-lg-4 col-md-6">
                                            <!-- First Name -->
                                            <div class="mb-3">
                                                <label for="first_name" class="form-label fw-bold">First Name <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i class="fa fa-user text-muted"></i></span>
                                                    <input type="text" id="first_name" name="first_name" 
                                                           class="form-control @error('first_name') is-invalid @enderror" 
                                                           value="{{ old('first_name', $dataPelanggan->first_name) }}" required>
                                                    @error('first_name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Last Name -->
                                            <div class="mb-3">
                                                <label for="last_name" class="form-label fw-bold">Last Name <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i class="fa fa-user-tag text-muted"></i></span>
                                                    <input type="text" id="last_name" name="last_name" 
                                                           class="form-control @error('last_name') is-invalid @enderror" 
                                                           value="{{ old('last_name', $dataPelanggan->last_name) }}" required>
                                                    @error('last_name')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <!-- Birthday -->
                                            <div class="mb-3">
                                                <label for="birthday" class="form-label fw-bold">Birthday <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i class="fa fa-calendar-alt text-muted"></i></span>
                                                    <input type="date" id="birthday" name="birthday" 
                                                           class="form-control @error('birthday') is-invalid @enderror" 
                                                           value="{{ old('birthday', $dataPelanggan->birthday) }}" required>
                                                    @error('birthday')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Gender -->
                                            <div class="mb-3">
                                                <label for="gender" class="form-label fw-bold">Gender <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i class="fa fa-venus-mars text-muted"></i></span>
                                                    <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror" required>
                                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                                        <option value="Male" {{ old('gender', $dataPelanggan->gender) == 'Male' ? 'selected' : '' }}>Male (Laki-laki)</option>
                                                        <option value="Female" {{ old('gender', $dataPelanggan->gender) == 'Female' ? 'selected' : '' }}>Female (Perempuan)</option>
                                                    </select>
                                                    @error('gender')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12">
                                            <!-- Email -->
                                            <div class="mb-3">
                                                <label for="email" class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i class="fa fa-envelope text-muted"></i></span>
                                                    <input type="email" id="email" name="email" 
                                                           class="form-control @error('email') is-invalid @enderror" 
                                                           value="{{ old('email', $dataPelanggan->email) }}" required>
                                                    @error('email')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Phone -->
                                            <div class="mb-3">
                                                <label for="phone" class="form-label fw-bold">Phone <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-text bg-light"><i class="fa fa-phone text-muted"></i></span>
                                                    <input type="text" id="phone" name="phone" 
                                                           class="form-control @error('phone') is-invalid @enderror" 
                                                           value="{{ old('phone', $dataPelanggan->phone) }}" required>
                                                    @error('phone')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Buttons -->
                                            <div class="pt-2 d-flex gap-2">
                                                <button type="submit" class="btn btn-info text-white px-4 py-2 fw-bold">
                                                    <i class="fa fa-check-circle me-1"></i> Simpan Perubahan
                                                </button>
                                                <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-secondary px-3 py-2">
                                                    Batal
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="bg-white rounded shadow-sm p-4 mb-3 d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" height="26" class="me-2">
                        <span class="fw-bold text-dark heading-font">DAFFA SERVICE</span>
                        <span class="text-muted ms-2 small">© {{ date('Y') }} All Rights Reserved.</span>
                    </div>
                </footer>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
