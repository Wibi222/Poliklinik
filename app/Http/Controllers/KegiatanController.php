<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan; // Menggunakan model Kegiatan

class KegiatanController extends Controller
{
    public function index()
    {
        // Ambil data dari tabel kegiatan melalui model Kegiatan
        $kegiatans = Kegiatan::orderBy('status')->orderBy('tgl_awal')->get();

        return view('kegiatan', compact('kegiatans')); // Gantilah nama variabel menjadi $kegiatans
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'isi' => 'required|string|max:255',
            'tgl_awal' => 'required|date',
            'tgl_akhir' => 'required|date',
        ]);

        if ($request->id) {
            // Jika ID ada, maka update data
            $kegiatan = Kegiatan::find($request->id);
            $kegiatan->update([
                'isi' => $request->isi,
                'tgl_awal' => $request->tgl_awal,
                'tgl_akhir' => $request->tgl_akhir,
            ]);
        } else {
            // Jika ID tidak ada, tambah data baru
            Kegiatan::create([
                'isi' => $request->isi,
                'tgl_awal' => $request->tgl_awal,
                'tgl_akhir' => $request->tgl_akhir,
                'status' => 0, // Default status 0 (Belum)
            ]);
        }

        return redirect()->route('kegiatan.index');
    }

    public function destroy($id)
    {
        // Hapus data berdasarkan ID
        Kegiatan::destroy($id);

        return redirect()->route('kegiatan.index');
    }

    public function updateStatus($id, $status)
    {
        // Ubah status kegiatan
        $kegiatan = Kegiatan::find($id);
        $kegiatan->update(['status' => $status]);

        return redirect()->route('kegiatan.index');
    }

    public function edit($id)
    {
        // Ambil data berdasarkan ID untuk di-edit
        $kegiatan = Kegiatan::find($id);

        return view('kegiatan.edit', compact('kegiatan')); // Gantilah nama view menjadi kegiatan.edit
    }
}
