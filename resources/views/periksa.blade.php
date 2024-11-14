@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Periksa</h1>

    <!-- Form untuk menambah data Periksa -->
    <form action="{{ route('periksa.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_pasien" class="form-label">Pasien</label>
            <select name="id_pasien" id="id_pasien" class="form-select">
                @foreach($pasiens as $pasien)
                    <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="id_dokter" class="form-label">Dokter</label>
            <select name="id_dokter" id="id_dokter" class="form-select">
                @foreach($dokters as $dokter)
                    <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tgl_periksa" class="form-label">Tanggal Periksa</label>
            <input type="date" name="tgl_periksa" id="tgl_periksa" class="form-control">
        </div>

        <div class="mb-3">
            <label for="catatan" class="form-label">Catatan</label>
            <textarea name="catatan" id="catatan" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="obat" class="form-label">Obat</label>
            <textarea name="obat" id="obat" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Tambah Periksa</button>
    </form>

    <hr>

    <!-- Menampilkan data Periksa -->
    <h2 class="my-4">Data Periksa</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Pasien</th>
                <th>Dokter</th>
                <th>Tanggal Periksa</th>
                <th>Catatan</th>
                <th>Obat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($periksa as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pasien->nama }}</td>
                    <td>{{ $item->dokter->nama }}</td>
                    <td>{{ $item->tgl_periksa }}</td>
                    <td>{{ $item->catatan }}</td>
                    <td>{{ $item->obat }}</td>
                    <td>
                        <!-- Button Edit -->
                        <a href="{{ route('periksa.edit', $item->id) }}" class="btn btn-warning">Edit</a>

                        <!-- Form Delete -->
                        <form action="{{ route('periksa.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
