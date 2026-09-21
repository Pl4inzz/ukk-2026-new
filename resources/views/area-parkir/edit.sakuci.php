@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit Daftar Area Parkir</h1>

    <form action="{{ route('area-parkir.update', ['id_area' => $data->id_area]) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Input Nama Area -->
        <div class="form-group mb-3">
            <label for="nama_area">Nama Area</label>
            <input
                type="text"
                name="nama_area"
                id="nama_area"
                class="form-control"
                value="{{ $data->nama_area }}"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="kapasitas">Kapasitas</label>
            <input
                type="number"
                name="kapasitas"
                id="kapasitas"
                class="form-control"
                value="{{ $data->kapasitas }}"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="terisi">Terisi</label>
            <input
                type="number"
                name="terisi"
                id="terisi"
                class="form-control"
                value="{{ $data->terisi }}"
                required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('area-parkir.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

@endsection