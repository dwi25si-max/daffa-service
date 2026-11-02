<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

/**
 * Controller Layanan: Diimplementasikan menggunakan ELOQUENT ORM Laravel.
 * Semua operasi CRUD (Create, Read, Update, Delete) menggunakan model Layanan.
 */
class LayananController extends Controller
{
    /**
     * Display a listing of the resource (READ via Eloquent).
     */
    public function index()
    {
        // Eloquent ORM: Mengambil semua data layanan beserta relasi teknisi
        $layanan = Layanan::withCount('teknisi')->orderBy('id', 'desc')->get();
        return view('admin.layanan.index', compact('layanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.layanan.create');
    }

    /**
     * Store a newly created resource in storage (CREATE via Eloquent).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_layanan'   => 'required|string|max:100',
            'kategori'       => 'required|string|max:50',
            'harga'          => 'required|numeric|min:0',
            'estimasi_waktu' => 'required|string|max:50',
            'deskripsi'      => 'required|string',
            'ikon'           => 'required|string|max:50',
        ], [
            'nama_layanan.required'   => 'Nama layanan wajib diisi.',
            'kategori.required'       => 'Kategori layanan wajib dipilih.',
            'harga.required'          => 'Harga layanan wajib diisi.',
            'harga.numeric'           => 'Harga layanan harus berupa angka.',
            'estimasi_waktu.required' => 'Estimasi waktu wajib diisi.',
            'deskripsi.required'      => 'Deskripsi layanan wajib diisi.',
            'ikon.required'           => 'Ikon layanan wajib dipilih.',
        ]);

        // Eloquent ORM: Menyimpan data baru dengan method create()
        Layanan::create($validated);

        return redirect()->route('layanan.index')
                         ->with('success', 'Data Layanan berhasil ditambahkan menggunakan Eloquent ORM!');
    }

    /**
     * Show the form for editing the specified resource (READ single record via Eloquent).
     */
    public function edit(string $id)
    {
        // Eloquent ORM: Mencari data berdasarkan primary key menggunakan findOrFail()
        $layanan = Layanan::findOrFail($id);
        return view('admin.layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage (UPDATE via Eloquent).
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_layanan'   => 'required|string|max:100',
            'kategori'       => 'required|string|max:50',
            'harga'          => 'required|numeric|min:0',
            'estimasi_waktu' => 'required|string|max:50',
            'deskripsi'      => 'required|string',
            'ikon'           => 'required|string|max:50',
        ], [
            'nama_layanan.required'   => 'Nama layanan wajib diisi.',
            'kategori.required'       => 'Kategori layanan wajib dipilih.',
            'harga.required'          => 'Harga layanan wajib diisi.',
            'harga.numeric'           => 'Harga layanan harus berupa angka.',
            'estimasi_waktu.required' => 'Estimasi waktu wajib diisi.',
            'deskripsi.required'      => 'Deskripsi layanan wajib diisi.',
            'ikon.required'           => 'Ikon layanan wajib dipilih.',
        ]);

        // Eloquent ORM: Update record
        $layanan = Layanan::findOrFail($id);
        $layanan->update($validated);

        return redirect()->route('layanan.index')
                         ->with('success', 'Data Layanan berhasil diperbarui menggunakan Eloquent ORM!');
    }

    /**
     * Remove the specified resource from storage (DELETE via Eloquent).
     */
    public function destroy(string $id)
    {
        // Eloquent ORM: Hapus record menggunakan method delete()
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();

        return redirect()->route('layanan.index')
                         ->with('success', 'Data Layanan berhasil dihapus menggunakan Eloquent ORM!');
    }
}
