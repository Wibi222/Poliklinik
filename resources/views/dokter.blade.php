@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Daftar Dokter
        <small class="text-muted">Catat informasi dokter di sini.</small>
    </h3>
    <hr>

    <!-- Form Input Data -->
    <form class="form row" method="POST" action="{{ isset($dokter) ? route('dokter.update', $dokter->id) : route('dokter.store') }}">
        @csrf
        @if(isset($dokter))
            @method('PUT')
        @endif

        <input type="hidden" name="id" value="{{ isset($dokter) ? $dokter->id : '' }}">

        <div class="col">
            <label for="inputNama" class="form-label fw-bold">Nama</label>
            <input type="text" class="form-control" name="nama" id="inputNama" placeholder="Nama" value="{{ old('nama', isset($dokter) ? $dokter->nama : '') }}">
        </div>
        <div class="col">
            <label for="inputAlamat" class="form-label fw-bold">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="inputAlamat" placeholder="Alamat" value="{{ old('alamat', isset($dokter) ? $dokter->alamat : '') }}">
        </div>
        <div class="col mb-2">
            <label for="inputNoHp" class="form-label fw-bold">No HP</label>
            <input type="text" class="form-control" name="no_hp" id="inputNoHp" placeholder="No HP" value="{{ old('no_hp', isset($dokter) ? $dokter->no_hp : '') }}">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary rounded-pill px-3">{{ isset($dokter) ? 'Update' : 'Simpan' }}</button>
        </div>
    </form>

    <!-- Table -->
    <table class="table table-hover">
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
            @foreach($dokters as $dokter)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dokter->nama }}</td>
                <td>{{ $dokter->alamat }}</td>
                <td>{{ $dokter->no_hp }}</td>
                <td>
                    <a class="btn btn-info rounded-pill px-3" href="{{ route('dokter.edit', $dokter->id) }}">Ubah</a>
                    <a class="btn btn-danger rounded-pill px-3" href="{{ route('dokter.destroy', $dokter->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $dokter->id }}').submit();">Hapus</a>
                    <form id="delete-form-{{ $dokter->id }}" action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" style="display: none;">
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
