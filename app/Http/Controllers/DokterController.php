<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    // Display the list of doctors
    public function index()
{
    $dokters = Dokter::all(); // Assuming you want to fetch all doctors
    return view('dokter', compact('dokters')); // Load dokter.blade.php
}

    // Store a new doctor
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
        ]);

        Dokter::create($request->all());

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    // Show the edit form for a doctor
    public function edit($id)
{
    $dokter = Dokter::findOrFail($id); // Find doctor by ID
    $dokters = Dokter::all(); // Fetch all doctors for displaying in the table
    return view('dokter', compact('dokter', 'dokters'));
}

    // Update the doctor information
    public function update(Request $request, $id)
{
    $dokter = Dokter::findOrFail($id);
    $dokter->nama = $request->nama;
    $dokter->alamat = $request->alamat;
    $dokter->no_hp = $request->no_hp;
    $dokter->save();

    return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diperbarui');
}


    // Delete a doctor
    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();

        return redirect()->route('dokter.index')->with('success', 'Dokter berhasil dihapus.');
    }
}
