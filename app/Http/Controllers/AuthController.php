<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman Login (GET /auth) - Soal 1
     */
    public function showLogin()
    {
        return view('guest.login');
    }

    /**
     * Menangani form Login - Soal 2
     * Logika sederhana:
     * - Jika username dan password sama, arahkan ke Dashboard Admin
     * - Jika salah, arahkan kembali ke halaman Login dengan Alert
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        // Logika Soal 2: Jika username dan password sama
        if ($username === $password) {
            session([
                'is_admin'    => true,
                'logged_user' => $username,
            ]);

            return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, login berhasil sebagai ' . $username . '!');
        }

        // Jika salah, arahkan kembali ke halaman Login dengan Alert
        return redirect()->back()
            ->withInput()
            ->with('alert', 'Username dan Password tidak cocok!');
    }

    /**
     * Menangani proses pendaftaran akun (POST /register)
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users,email',
            'password'              => 'required|string|min:6|confirmed',
        ], [
            'name.required'         => 'Name wajib diisi.',
            'email.required'        => 'Email wajib diisi.',
            'email.email'           => 'Format email tidak valid.',
            'email.unique'          => 'Email sudah terdaftar.',
            'password.required'     => 'Password wajib diisi.',
            'password.min'          => 'Password minimal harus 6 karakter.',
            'password.confirmed'    => 'Confirm Password tidak cocok dengan Password.',
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran akun berhasil! Silakan login.');
    }

    /**
     * Tampilan Halaman Dashboard Admin (Tujuan jika login sukses)
     */
    public function dashboard()
    {
        $totalPelanggan  = Pelanggan::count();
        $totalUser       = User::count();
        $recentPelanggan = Pelanggan::latest('pelanggan_id')->take(5)->get();

        return view('admin.dashboard', compact('totalPelanggan', 'totalUser', 'recentPelanggan'));
    }
}
