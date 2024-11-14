@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Data Pasien
        <small class="text-muted">Catat semua informasi pasien di sini.</small>
    </h3>
    <hr>

    <!-- Form Input Data -->
    <form class="form row" method="POST" action="{{ isset($pasien) ? route('pasien.update', $pasien->id) : route('pasien.store') }}">
        @csrf
        @if(isset($pasien))
            @method('PUT')
        @endif

        <div class="col">
            <label for="inputNama" class="form-label fw-bold">Nama</label>
            <input type="text" class="form-control" name="nama" id="inputNama" placeholder="Nama" value="{{ old('nama', isset($pasien) ? $pasien->nama : '') }}">
        </div>
        <div class="col">
            <label for="inputAlamat" class="form-label fw-bold">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="inputAlamat" placeholder="Alamat" value="{{ old('alamat', isset($pasien) ? $pasien->alamat : '') }}">
        </div>
        <div class="col mb-2">
            <label for="inputNoHp" class="form-label fw-bold">No HP</label>
            <input type="text" class="form-control" name="no_hp" id="inputNoHp" placeholder="No HP" value="{{ old('no_hp', isset($pasien) ? $pasien->no_hp : '') }}">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary rounded-pill px-3">{{ isset($pasien) ? 'Update' : 'Simpan' }}</button>
        </div>
    </form>

    <!-- Table -->
    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pasiens as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>
                    <a class="btn btn-info rounded-pill px-3" href="{{ route('pasien.edit', $item->id) }}">Ubah</a>
                    <a class="btn btn-danger rounded-pill px-3" href="{{ route('pasien.destroy', $item->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">Hapus</a>
                    <form id="delete-form-{{ $item->id }}" action="{{ route('pasien.destroy', $item->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
