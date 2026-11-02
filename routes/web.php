<?php

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TeknisiController;
use App\Models\Layanan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Daffa Service
|--------------------------------------------------------------------------
|
| 1. Route Halaman Guest ('/'):
|    - Mengambil data Layanan menggunakan ELOQUENT ORM (Layanan::with('teknisi')->get()).
|    - Mengambil data Teknisi menggunakan QUERY BUILDER (DB::table('teknisi')->join(...)->get()).
|    - Menampilkan data pada view 'index' yang sudah menerapkan Partial View modular.
|
| 2. Route Admin CRUD:
|    - Pelanggan (PelangganController)
|    - User (UserController)
|    - Layanan (LayananController - ELOQUENT ORM)
|    - Teknisi (TeknisiController - QUERY BUILDER)
|
*/

// Halaman Publik / Guest dengan Partial View
Route::get('/', function () {
    // 1. Ambil data Layanan via ELOQUENT ORM beserta relasi Teknisi
    try {
        $layanan = Layanan::with('teknisi')->orderBy('id', 'asc')->get();
    } catch (\Throwable $e) {
        $layanan = collect();
    }

    // 2. Ambil data Teknisi via QUERY BUILDER (Join dengan tabel layanan)
    try {
        $teknisi = DB::table('teknisi')
            ->join('layanan', 'teknisi.layanan_id', '=', 'layanan.id')
            ->select('teknisi.*', 'layanan.nama_layanan as spesialisasi_layanan')
            ->where('teknisi.status', 'Aktif')
            ->orderBy('teknisi.id', 'asc')
            ->get();
    } catch (\Throwable $e) {
        $teknisi = collect();
    }

    return view('index', compact('layanan', 'teknisi'));
})->name('dashboard');

// Resource Routes CRUD Admin
Route::resource('pelanggan', PelangganController::class);
Route::resource('user', UserController::class);
Route::resource('layanan', LayananController::class);
Route::resource('teknisi', TeknisiController::class);

// Demo route bila dibutuhkan
Route::get('/demo-success', function () {
    return redirect()->route('pelanggan.index')
                     ->with('success', 'Operasi Berhasil!');
});
