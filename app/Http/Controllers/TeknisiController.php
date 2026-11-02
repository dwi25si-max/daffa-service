<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Controller Teknisi: Diimplementasikan MURNI menggunakan QUERY BUILDER Laravel (DB Facade).
 * Semua operasi CRUD (Create, Read, Update, Delete) menggunakan DB::table('teknisi').
 */
class TeknisiController extends Controller
{
    /**
     * Display a listing of the resource (READ via Query Builder + JOIN).
     */
    public function index()
    {
        // Query Builder: Melakukan JOIN antara tabel teknisi dan layanan
        $teknisi = DB::table('teknisi')
            ->join('layanan', 'teknisi.layanan_id', '=', 'layanan.id')
            ->select(
                'teknisi.*',
                'layanan.nama_layanan as spesialisasi_layanan',
                'layanan.kategori as kategori_layanan'
            )
            ->orderBy('teknisi.id', 'desc')
            ->get();

        return view('admin.teknisi.index', compact('teknisi'));
    }

    /**
     * Show the form for creating a new resource (READ options via Query Builder).
     */
    public function create()
    {
        // Query Builder: Mengambil data referensi layanan untuk dropdown
        $daftarLayanan = DB::table('layanan')->orderBy('nama_layanan', 'asc')->get();

        return view('admin.teknisi.create', compact('daftarLayanan'));
    }

    /**
     * Store a newly created resource in storage (CREATE / INSERT via Query Builder).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'layanan_id'       => 'required|exists:layanan,id',
            'nama_teknisi'     => 'required|string|max:100',
            'jabatan'          => 'required|string|max:100',
            'no_hp'            => 'required|string|max:20',
            'pengalaman_tahun' => 'required|numeric|min:0',
            'foto'             => 'nullable|string|max:100',
            'status'           => 'required|in:Aktif,Cuti,Nonaktif',
        ], [
            'layanan_id.required'       => 'Spesialisasi layanan wajib dipilih.',
            'layanan_id.exists'         => 'Layanan yang dipilih tidak valid.',
            'nama_teknisi.required'     => 'Nama teknisi wajib diisi.',
            'jabatan.required'          => 'Jabatan teknisi wajib diisi.',
            'no_hp.required'            => 'Nomor HP wajib diisi.',
            'pengalaman_tahun.required' => 'Tahun pengalaman wajib diisi.',
            'pengalaman_tahun.numeric'  => 'Pengalaman harus berupa angka.',
            'status.required'           => 'Status teknisi wajib dipilih.',
        ]);

        // Query Builder: Insert record baru ke database
        DB::table('teknisi')->insert([
            'layanan_id'       => $validated['layanan_id'],
            'nama_teknisi'     => $validated['nama_teknisi'],
            'jabatan'          => $validated['jabatan'],
            'no_hp'            => $validated['no_hp'],
            'pengalaman_tahun' => $validated['pengalaman_tahun'],
            'foto'             => $validated['foto'] ?: 'team-1.jpg',
            'status'           => $validated['status'],
            'created_at'       => now(),
            'updated_at'       => now(),
        ]);

        return redirect()->route('teknisi.index')
                         ->with('success', 'Data Teknisi berhasil ditambahkan menggunakan Query Builder!');
    }

    /**
     * Show the form for editing the specified resource (READ single record via Query Builder).
     */
    public function edit(string $id)
    {
        // Query Builder: Mengambil data tunggal teknisi berdasarkan ID
        $teknisi = DB::table('teknisi')->where('id', $id)->first();

        if (!$teknisi) {
            abort(404, 'Data teknisi tidak ditemukan');
        }

        // Query Builder: Mengambil daftar opsi layanan untuk dropdown relasi
        $daftarLayanan = DB::table('layanan')->orderBy('nama_layanan', 'asc')->get();

        return view('admin.teknisi.edit', compact('teknisi', 'daftarLayanan'));
    }

    /**
     * Update the specified resource in storage (UPDATE via Query Builder).
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'layanan_id'       => 'required|exists:layanan,id',
            'nama_teknisi'     => 'required|string|max:100',
            'jabatan'          => 'required|string|max:100',
            'no_hp'            => 'required|string|max:20',
            'pengalaman_tahun' => 'required|numeric|min:0',
            'foto'             => 'nullable|string|max:100',
            'status'           => 'required|in:Aktif,Cuti,Nonaktif',
        ], [
            'layanan_id.required'       => 'Spesialisasi layanan wajib dipilih.',
            'layanan_id.exists'         => 'Layanan yang dipilih tidak valid.',
            'nama_teknisi.required'     => 'Nama teknisi wajib diisi.',
            'jabatan.required'          => 'Jabatan teknisi wajib diisi.',
            'no_hp.required'            => 'Nomor HP wajib diisi.',
            'pengalaman_tahun.required' => 'Tahun pengalaman wajib diisi.',
            'pengalaman_tahun.numeric'  => 'Pengalaman harus berupa angka.',
            'status.required'           => 'Status teknisi wajib dipilih.',
        ]);

        // Query Builder: Update data baris berdasarkan ID
        DB::table('teknisi')
            ->where('id', $id)
            ->update([
                'layanan_id'       => $validated['layanan_id'],
                'nama_teknisi'     => $validated['nama_teknisi'],
                'jabatan'          => $validated['jabatan'],
                'no_hp'            => $validated['no_hp'],
                'pengalaman_tahun' => $validated['pengalaman_tahun'],
                'foto'             => $validated['foto'] ?: 'team-1.jpg',
                'status'           => $validated['status'],
                'updated_at'       => now(),
            ]);

        return redirect()->route('teknisi.index')
                         ->with('success', 'Data Teknisi berhasil diperbarui menggunakan Query Builder!');
    }

    /**
     * Remove the specified resource from storage (DELETE via Query Builder).
     */
    public function destroy(string $id)
    {
        // Query Builder: Menghapus baris record
        DB::table('teknisi')->where('id', $id)->delete();

        return redirect()->route('teknisi.index')
                         ->with('success', 'Data Teknisi berhasil dihapus menggunakan Query Builder!');
    }
}
