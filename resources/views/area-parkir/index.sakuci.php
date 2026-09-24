@extends('layouts.app')

@section('title', 'Manage Area Parkir')

@section('content')

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <span class="badge rounded-pill badge-brand px-3 py-2 mb-2">Area Admin</span>
            <h1 class="h4 mb-0">Manage Area Parkir</h1>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-secondary">&larr; Kembali</a>
    </div>

    <div class="row g-4">
        <!-- Form Tambah Area Parkir -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h6 mb-3">Tambah Area Parkir Baru</h2>

                    <form method="POST" action="{{ route('area-parkir.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="nama_area">Nama Area / Gedung</label>
                            <input type="text" id="nama_area" name="nama_area" class="form-control" placeholder="mis. Gedung A / Lantai 1" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="kapasitas">Kapasitas Maksimal</label>
                            <input type="number" id="kapasitas" name="kapasitas" class="form-control" placeholder="mis. 50" min="1" required>
                        </div>

                        <button class="btn btn-brand w-100" type="submit">Tambah Area</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel Daftar Area Parkir -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h6 mb-3">Daftar Area Parkir</h2>

                    <div class="table-responsive">
                        <table class="table table-sm align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Area</th>
                                    <th>Kapasitas</th>
                                    <th>Terisi</th>
                                    <th class="text-end" style="width: 140px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($data as $d)
                                    <tr>
                                        <td class="fw-bold text-secondary">{{ $no++ }}</td>
                                        <td>{{ $d->nama_area }}</td>
                                        <td>{{ $d->kapasitas }} Kendaraan</td>
                                        <td>{{ $d->terisi }} Kendaraan</td>
                                        <td class="text-end">
                                            <div class="d-inline-flex gap-2">
                                                <a href="{{ route('area-parkir.edit', ['id' => $d->id_area]) }}" class="btn btn-sm btn-outline-brand">Edit</a>
                                                <form method="POST" action="{{ route('area-parkir.destroy', ['id' => $d->id_area]) }}" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus area parkir ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-outline-danger" type="submit">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection