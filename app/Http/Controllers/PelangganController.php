<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataPelanggan'] = Pelanggan::all();
        return view('admin.pelanggan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'birthday'   => 'required|date',
            'gender'     => 'required|in:Male,Female',
            'email'      => 'required|email|unique:pelanggan,email',
            'phone'      => 'required|numeric',
        ], [
            'first_name.required' => 'first_name wajib diisi.',
            'last_name.required'  => 'last_name wajib diisi.',
            'birthday.required'   => 'birthday wajib diisi.',
            'birthday.date'       => 'birthday harus berupa tanggal.',
            'gender.required'     => 'gender wajib diisi.',
            'gender.in'           => 'gender hanya boleh bernilai Male atau Female.',
            'email.required'      => 'email wajib diisi.',
            'email.email'         => 'email harus dalam format email yang valid.',
            'email.unique'        => 'email sudah terdaftar di sistem.',
            'phone.required'      => 'phone wajib diisi.',
            'phone.numeric'       => 'phone harus berupa angka (numeric).',
        ]);

        Pelanggan::create($validated);

        return redirect()->route('pelanggan.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataPelanggan'] = Pelanggan::findOrFail($id);
        return view('admin.pelanggan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'birthday'   => 'required|date',
            'gender'     => 'required|in:Male,Female',
            'email'      => 'required|email|unique:pelanggan,email,' . $id . ',pelanggan_id',
            'phone'      => 'required|numeric',
        ], [
            'first_name.required' => 'first_name wajib diisi.',
            'last_name.required'  => 'last_name wajib diisi.',
            'birthday.required'   => 'birthday wajib diisi.',
            'birthday.date'       => 'birthday harus berupa tanggal.',
            'gender.required'     => 'gender wajib diisi.',
            'gender.in'           => 'gender hanya boleh bernilai Male atau Female.',
            'email.required'      => 'email wajib diisi.',
            'email.email'         => 'email harus dalam format email yang valid.',
            'email.unique'        => 'email sudah terdaftar di sistem.',
            'phone.required'      => 'phone wajib diisi.',
            'phone.numeric'       => 'phone harus berupa angka (numeric).',
        ]);

        $pelanggan->update($validated);

        return redirect()->route('pelanggan.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Data berhasil dihapus');
    }
}
