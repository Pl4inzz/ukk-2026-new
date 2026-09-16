@extends('layouts.app')

@section('content')

<h1>Tambah Daftar Area Parkir</h1>

<form action="{{ route('area-parkir.store') }}" method="POST">
    @csrf

    <div class="form-group mb-3">
        <label for="nama_area" class="form-label">Nama Area</label>
        <input type="text" name="nama_area" id="nama_area" class="form-control" placeholder="Masukkan nama area" required>
    </div>

    <div class="form-group mb-3">
        <label for="kapasitas" class="form-label">Kapasitas</label>
        <input type="number" name="kapasitas" id="kapasitas" class="form-control" placeholder="Masukkan kapasitas" required>
    </div>

    <div class="form-group mb-3">
        <label for="terisi" class="form-label">Terisi</label>
        <input type="number" name="terisi" id="terisi" class="form-control" placeholder="Masukkan jumlah kendaraan yang terisi" required>
    </div>
    </div>

    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
    <a href="{{ route('area-parkir.index') }}" class="btn btn-secondary btn-sm">Batal</a>
</form>

@endsection