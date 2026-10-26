@extends('layouts.admin.app')

@section('title', 'Daffa Service | Detail User')

@section('content')
<div class="d-flex justify-content-between align-items-center pb-2 mb-3 border-bottom flex-wrap">
    <div>
        <h2 class="h4 heading-font fw-bold mb-0 text-dark">Detail User</h2>
        <small class="text-muted">Informasi lengkap akun pengguna #{{ $user->id }}</small>
    </div>
    <div class="mt-2 mt-sm-0">
        <a href="{{ route('user.index') }}" class="btn btn-outline-secondary">
            <i class="fa fa-arrow-left me-1"></i> Kembali ke List User
        </a>
        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info text-white ms-2">
            <i class="fa fa-edit me-1"></i> Edit User
        </a>
    </div>
</div>

<div class="card shadow-sm border-0 col-md-8">
    <div class="card-body p-4">
        <div class="d-flex align-items-center mb-4">
            <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center me-3 fw-bold fs-4" style="width: 60px; height: 60px;">
                {{ strtoupper(substr($user->name, 0, 2)) }}
            </div>
            <div>
                <h4 class="mb-0 fw-bold">{{ $user->name }}</h4>
                <p class="text-muted mb-0">{{ $user->email }}</p>
            </div>
        </div>

        <table class="table table-bordered">
            <tr>
                <th style="width: 200px;">User ID</th>
                <td>#{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Nama Lengkap</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Status Password</th>
                <td><span class="badge bg-success">Terenkripsi dengan Hash::make</span></td>
            </tr>
            <tr>
                <th>Tanggal Pendaftaran</th>
                <td>{{ $user->created_at ? $user->created_at->format('d F Y, H:i:s') : '-' }}</td>
            </tr>
            <tr>
                <th>Terakhir Diperbarui</th>
                <td>{{ $user->updated_at ? $user->updated_at->format('d F Y, H:i:s') : '-' }}</td>
            </tr>
        </table>
    </div>
</div>
@endsection

