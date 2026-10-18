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
                            <li class="breadcrumb-item active" aria-current="page">Pelanggan</li>
                        </ol>
                    </nav>
                    <div class="d-flex justify-content-between w-100 flex-wrap align-items-center">
                        <div class="mb-3 mb-lg-0">
                            <h1 class="h4">Data Pelanggan</h1>
                            <p class="mb-0 text-muted">List data seluruh pelanggan</p>
                        </div>
                        <div>
                            <a href="{{ route('pelanggan.create') }}" class="btn btn-success text-white">
                                <i class="bi bi-plus-lg me-1"></i> Tambah Pelanggan
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Flash Message Success -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row mt-3">
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow mb-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table-pelanggan" class="table table-hover table-centered table-nowrap mb-0 rounded align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="border-0">First Name</th>
                                                <th class="border-0">Last Name</th>
                                                <th class="border-0">Birthday</th>
                                                <th class="border-0">Gender</th>
                                                <th class="border-0">Email</th>
                                                <th class="border-0">Phone</th>
                                                <th class="border-0 text-center" style="width: 180px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($dataPelanggan as $item)
                                                <tr>
                                                    <td>{{ $item->first_name }}</td>
                                                    <td>{{ $item->last_name }}</td>
                                                    <td>{{ $item->birthday ? date('d-m-Y', strtotime($item->birthday)) : '-' }}</td>
                                                    <td>
                                                        <span class="badge {{ $item->gender == 'Male' ? 'bg-info' : ($item->gender == 'Female' ? 'bg-warning text-dark' : 'bg-secondary') }}">
                                                            {{ $item->gender ?? '-' }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>{{ $item->phone ?? '-' }}</td>
                                                    <td class="text-center">
                                                        <!-- Tombol Edit (Langkah 6) -->
                                                        <a href="{{ route('pelanggan.edit', $item->pelanggan_id) }}" class="btn btn-info btn-sm text-white me-1">
                                                            <svg class="icon icon-xs me-1" style="width:14px;height:14px;" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"></path>
                                                            </svg>
                                                            Edit
                                                        </a>

                                                        <!-- Tombol Hapus (Langkah 7) -->
                                                        <form action="{{ route('pelanggan.destroy', $item->pelanggan_id) }}" method="POST" style="display:inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <svg class="icon icon-xs me-1" style="width:14px;height:14px;" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"></path>
                                                                </svg>
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center text-muted py-4">
                                                        Belum ada data pelanggan. Silakan klik tombol <strong>Tambah Pelanggan</strong> untuk menambahkan data baru.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
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
