<!DOCTYPE html>
<html lang="id">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Daffa Service | Data Pelanggan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Daffa Service - Data Pelanggan Bengkel Mobil">
    <meta name="description" content="Sistem Manajemen Data Pelanggan Bengkel Mobil Daffa Service">

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
        .car-hero-card {
            background: linear-gradient(135deg, #0b1325 0%, #1a2a4b 60%, #b31217 100%);
            border-radius: 16px;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(179, 18, 23, 0.2);
        }
        .car-hero-img {
            max-height: 140px;
            object-fit: contain;
            filter: drop-shadow(0 15px 15px rgba(0,0,0,0.4));
            transition: transform 0.4s ease;
        }
        .car-hero-img:hover {
            transform: scale(1.05) translateX(-5px);
        }
        .card-custom {
            border: none;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.04);
        }
        .table thead th {
            background-color: #0b1325;
            color: #ffffff;
            font-family: 'Barlow', sans-serif;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            font-size: 0.82rem;
            padding: 14px 16px;
        }
        .table tbody td {
            padding: 14px 16px;
            vertical-align: middle;
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
        .service-thumb {
            height: 90px;
            object-fit: cover;
            border-radius: 8px;
            width: 100%;
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
                    <img src="{{ asset('img/carousel-2.png') }}" alt="Sports Car" class="img-fluid opacity-75" style="max-height: 55px;">
                    <p class="text-white-50 small mt-2 mb-0">Sistem Servis Kendaraan</p>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">

                <!-- Header Banner Mobil Daffa Service -->
                <div class="car-hero-card p-4 mb-4">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-7">
                            <div class="d-flex align-items-center mb-2">
                                <img src="{{ asset('img/logo.png') }}" alt="Logo" height="35" class="me-2">
                                <span class="badge bg-danger px-3 py-1 text-uppercase fw-bold">Bengkel Resmi & Terpercaya</span>
                            </div>
                            <h2 class="fw-bold heading-font text-white mb-1">DATA PELANGGAN REPARASI MOBIL</h2>
                            <p class="text-white-50 mb-3">Kelola data pemilik kendaraan dan pelanggan layanan bengkel otomotif Daffa Service.</p>
                            <div class="d-flex gap-2">
                                <a href="{{ route('pelanggan.create') }}" class="btn btn-daffa px-4 py-2">
                                    <i class="fa fa-plus-circle me-1"></i> Tambah Pelanggan Baru
                                </a>
                                <a href="{{ route('dashboard') }}" class="btn btn-outline-light px-3 py-2">
                                    <i class="fa fa-car me-1"></i> Menu Servis
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 text-center mt-3 mt-md-0">
                            <img src="{{ asset('img/carousel-1.png') }}" alt="Mobil Daffa Service" class="img-fluid car-hero-img">
                        </div>
                    </div>
                </div>

                <!-- Breadcrumb -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none text-muted"><i class="fa fa-home"></i> Beranda</a></li>
                            <li class="breadcrumb-item text-danger fw-bold active" aria-current="page">Pelanggan</li>
                        </ol>
                    </nav>
                    <span class="badge bg-dark text-white px-3 py-2">
                        <i class="fa fa-car-side text-danger me-1"></i> Total Pelanggan: <strong>{{ count($dataPelanggan) }}</strong>
                    </span>
                </div>

                <!-- Alert Notifikasi Flash Sukses -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show card-custom border-start border-success border-4" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="fa fa-check-circle fs-4 text-success me-3"></i>
                            <div>
                                <h6 class="mb-0 fw-bold">Berhasil!</h6>
                                <p class="mb-0">{{ session('success') }}</p>
                            </div>
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Tabel Data Pelanggan -->
                <div class="card card-custom shadow-sm mb-4">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <div class="bg-danger bg-opacity-10 p-2 rounded-circle me-3 text-danger">
                                <i class="fa fa-address-book fs-5"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-bold heading-font">Daftar Pelanggan Servis Mobil</h5>
                                <small class="text-muted">Database identitas pemilik kendaraan</small>
                            </div>
                        </div>
                        <a href="{{ route('pelanggan.create') }}" class="btn btn-sm btn-daffa">
                            <i class="fa fa-user-plus me-1"></i> Tambah Data
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table id="table-pelanggan" class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th class="border-0">First Name</th>
                                        <th class="border-0">Last Name</th>
                                        <th class="border-0">Birthday</th>
                                        <th class="border-0 text-center">Gender</th>
                                        <th class="border-0">Email</th>
                                        <th class="border-0">Phone</th>
                                        <th class="border-0 text-center" style="width: 170px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($dataPelanggan as $item)
                                        <tr>
                                            <td class="fw-bold text-dark">
                                                <i class="fa fa-user-circle text-danger me-2"></i>{{ $item->first_name }}
                                            </td>
                                            <td>{{ $item->last_name }}</td>
                                            <td>
                                                <i class="fa fa-calendar-alt text-muted me-1"></i>
                                                {{ $item->birthday ? date('d-m-Y', strtotime($item->birthday)) : '-' }}
                                            </td>
                                            <td class="text-center">
                                                @if($item->gender == 'Male')
                                                    <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">
                                                        <i class="fa fa-mars me-1"></i> Male
                                                    </span>
                                                @elseif($item->gender == 'Female')
                                                    <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2 rounded-pill">
                                                        <i class="fa fa-venus me-1"></i> Female
                                                    </span>
                                                @else
                                                    <span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-2 rounded-pill">
                                                        {{ $item->gender ?? '-' }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <i class="fa fa-envelope text-muted me-1"></i>
                                                <a href="mailto:{{ $item->email }}" class="text-decoration-none text-dark">{{ $item->email }}</a>
                                            </td>
                                            <td>
                                                <i class="fa fa-phone text-muted me-1"></i>
                                                {{ $item->phone ?? '-' }}
                                            </td>
                                            <td class="text-center">
                                                <div class="d-inline-flex gap-1">
                                                    <!-- Tombol Edit -->
                                                    <a href="{{ route('pelanggan.edit', $item->pelanggan_id) }}" class="btn btn-info btn-sm text-white px-2 py-1" title="Ubah Data">
                                                        <i class="fa fa-pen me-1"></i> Edit
                                                    </a>

                                                    <!-- Tombol Hapus -->
                                                    <form action="{{ route('pelanggan.destroy', $item->pelanggan_id) }}" method="POST" style="display:inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data pelanggan {{ $item->first_name }}?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm px-2 py-1" title="Hapus Data">
                                                            <i class="fa fa-trash-alt me-1"></i> Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center py-5">
                                                <img src="{{ asset('img/carousel-1.png') }}" alt="Mobil Daffa Service" style="max-height: 80px; opacity: 0.6;" class="mb-3">
                                                <h6 class="text-muted fw-bold">Belum ada data pelanggan di bengkel Daffa Service</h6>
                                                <p class="text-muted small">Klik tombol <strong>Tambah Pelanggan</strong> di atas untuk mendaftarkan pelanggan servis baru.</p>
                                                <a href="{{ route('pelanggan.create') }}" class="btn btn-sm btn-daffa mt-2">
                                                    <i class="fa fa-plus me-1"></i> Tambah Pelanggan
                                                </a>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Showcase Gambar Layanan Bengkel Mobil Daffa Service -->
                <div class="row g-3 mb-4">
                    <div class="col-12">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fa fa-cogs text-danger fs-5 me-2"></i>
                            <h6 class="fw-bold heading-font mb-0 text-dark">LAYANAN SERVIS MOBIL KAMI</h6>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="card card-custom shadow-sm overflow-hidden text-center p-2">
                            <img src="{{ asset('img/service-1.jpg') }}" class="service-thumb mb-2" alt="Diagnostic Test">
                            <span class="small fw-bold text-dark">Diagnostic Test</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="card card-custom shadow-sm overflow-hidden text-center p-2">
                            <img src="{{ asset('img/service-2.jpg') }}" class="service-thumb mb-2" alt="Engine Servicing">
                            <span class="small fw-bold text-dark">Engine Servicing</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="card card-custom shadow-sm overflow-hidden text-center p-2">
                            <img src="{{ asset('img/service-3.jpg') }}" class="service-thumb mb-2" alt="Tires Replacement">
                            <span class="small fw-bold text-dark">Tires Replacement</span>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="card card-custom shadow-sm overflow-hidden text-center p-2">
                            <img src="{{ asset('img/service-4.jpg') }}" class="service-thumb mb-2" alt="Oil Changing">
                            <span class="small fw-bold text-dark">Oil Changing</span>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <footer class="bg-white rounded shadow-sm p-4 mb-3 d-flex justify-content-between align-items-center flex-wrap">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" height="28" class="me-2">
                        <span class="fw-bold text-dark heading-font">DAFFA SERVICE</span>
                        <span class="text-muted ms-2 small">© {{ date('Y') }} All Rights Reserved.</span>
                    </div>
                    <div class="small text-muted mt-2 mt-sm-0">
                        <i class="fa fa-map-marker-alt text-danger me-1"></i> Bengkel Perbaikan & Servis Mobil Profesional
                    </div>
                </footer>

            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
