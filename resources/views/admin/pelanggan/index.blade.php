<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daffa Service | Data Pelanggan</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('img/logo.png') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                <!-- Header Sederhana dengan Logo & Gambar Mobil -->
                <div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom flex-wrap">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('img/carousel-1.png') }}" alt="Mobil Daffa Service" style="height: 50px;" class="me-3 d-none d-sm-block">
                        <div>
                            <h2 class="h4 heading-font fw-bold mb-0 text-dark">Data Pelanggan Daffa Service</h2>
                            <small class="text-muted">List data seluruh pelanggan bengkel mobil</small>
                        </div>
                    </div>
                    <div class="mt-2 mt-sm-0">
                        <a href="{{ route('pelanggan.create') }}" class="btn btn-danger">
                            <i class="fa fa-plus me-1"></i> Tambah Pelanggan
                        </a>
                    </div>
                </div>

                <!-- Notifikasi Flash Sukses -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Tabel Pelanggan -->
                <div class="card shadow-sm border-0">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped align-middle mb-0">
                                <thead class="table-dark">
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Birthday</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th class="text-center" style="width: 160px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($dataPelanggan as $item)
                                        <tr>
                                            <td>{{ $item->first_name }}</td>
                                            <td>{{ $item->last_name }}</td>
                                            <td>{{ $item->birthday ? date('d-m-Y', strtotime($item->birthday)) : '-' }}</td>
                                            <td>{{ $item->gender ?? '-' }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->phone ?? '-' }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('pelanggan.edit', $item->pelanggan_id) }}" class="btn btn-info btn-sm text-white">
                                                    Edit
                                                </a>
                                                <form action="{{ route('pelanggan.destroy', $item->pelanggan_id) }}" method="POST" style="display:inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">
                                                Belum ada data pelanggan. Silakan klik tombol <strong>Tambah Pelanggan</strong>.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="text-muted small mt-4 pt-2 border-top d-flex justify-content-between align-items-center">
                    <span>© {{ date('Y') }} Daffa Service</span>
                    <span><i class="fa fa-car text-danger me-1"></i> Bengkel Perbaikan & Servis Mobil</span>
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
