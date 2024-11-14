<?php

namespace App\Http\Controllers;

use App\Models\Periksa;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class PeriksaController extends Controller
{
    // Method untuk menampilkan data periksa dengan relasi pasien dan dokter
    public function index()
{
    // Ambil data periksa bersama dengan relasi pasien dan dokter
    $periksa = Periksa::with(['pasien', 'dokter'])->get();
    $pasiens = Pasien::all();
    $dokters = Dokter::all();

    // Ganti pemanggilan view untuk menggunakan periksa (tanpa .blade.php)
    return view('periksa', compact('periksa', 'pasiens', 'dokters'));
}

    // Method untuk menyimpan data periksa baru
    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required|exists:pasiens,id',
            'id_dokter' => 'required|exists:dokters,id',
            'tgl_periksa' => 'required|date',
            'catatan' => 'nullable|string',
            'obat' => 'nullable|string',
        ]);

        Periksa::create($request->all());

        return redirect()->route('periksa.index')->with('success', 'Periksa record created successfully!');
    }

    // Method untuk menampilkan form edit dengan data yang ada
    public function edit($id)
    {
        $periksa = Periksa::with(['pasien', 'dokter'])->findOrFail($id);
        $pasiens = Pasien::all();
        $dokters = Dokter::all();

        return view('periksa', compact('periksa', 'pasiens', 'dokters'));
    }

    // Method untuk memperbarui data periksa yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pasien' => 'required|exists:pasiens,id',
            'id_dokter' => 'required|exists:dokters,id',
            'tgl_periksa' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        $periksa = Periksa::findOrFail($id);
        $periksa->update($request->all());

        return redirect()->route('periksa.index')->with('success', 'Periksa record updated successfully!');
    }

    // Method untuk menghapus data periksa
    public function destroy($id)
    {
        Periksa::destroy($id);
        return redirect()->route('periksa.index')->with('success', 'Periksa record deleted successfully!');
    }

    // Menampilkan detail periksa
    public function show($id)
    {
        $periksa = Periksa::with(['pasien', 'dokter'])->findOrFail($id);
        return view('periksa.show', compact('periksa'));
    }
}
