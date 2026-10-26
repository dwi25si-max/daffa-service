<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Daffa Service
|--------------------------------------------------------------------------
*/

// ─── Soal 1 & 2: Tampilan Guest (Home, Login, Register) ─────────────────────
Route::get('/', function () {
    return view('guest.home');
})->name('home');

Route::get('/auth', [AuthController::class, 'showLogin'])->name('login');
Route::post('/auth', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', function () {
    return view('guest.register');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

// ─── Dashboard Admin (Tujuan Login Sukses) ──────────────────────────────────
Route::get('/admin/dashboard', [AuthController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->name('dashboard');

// ─── CRUD Modul Admin ────────────────────────────────────────────────────────
Route::resource('pelanggan', PelangganController::class);
Route::resource('user', UserController::class);

// ─── CRUD Modul Admin ────────────────────────────────────────────────────────
Route::resource('pelanggan', PelangganController::class);
Route::resource('user', UserController::class);

