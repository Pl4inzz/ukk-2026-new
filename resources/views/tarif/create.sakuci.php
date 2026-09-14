@extends('layouts.app')

@section('content')

<h1>Tambah Daftar Tarif</h1>

<form action="{{ route('tarif.store') }}" method="POST">
    @csrf

    <!-- Form Jenis Kendaraan Dropdown -->
    <div class="form-group mb-3">
        <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
        <select name="jenis_kendaraan" id="jenis_kendaraan" class="form-control" required>
            <option value="" disabled selected>-- Pilih Jenis Kendaraan --</option>
            <option value="mobil">Mobil</option>
            <option value="motor">Motor</option>
            <option value="truck">Truck</option>
            <!-- Tambahkan nilai ENUM lain yang diset di database/migration -->
        </select>
    </div>

    <!-- Form Tarif Per Jam -->
    <div class="form-group mb-3">
        <label for="tarif_per_jam" class="form-label">Tarif Per Jam</label>
        <input type="number" name="tarif_per_jam" id="tarif_per_jam" class="form-control" placeholder="Masukkan nominal" required>
    </div>

    <button type="submit" class="btn btn-success btn-sm">Simpan</button>
    <a href="{{ route('tarif.index') }}" class="btn btn-secondary btn-sm">Batal</a>
</form>

@endsection