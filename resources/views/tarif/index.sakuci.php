@extends('layouts.app')

@section('title', 'Manage Tarif')

@section('content')

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <span class="badge rounded-pill badge-brand px-3 py-2 mb-2">Area Admin</span>
            <h1 class="h4 mb-0">Manage Tarif</h1>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-secondary">&larr; Kembali</a>
    </div>

    <div class="row g-4">
        <!-- Form Tambah Tarif -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h6 mb-3">Tambah Tarif Baru</h2>

                    <form method="POST" action="{{ route('tarif.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="jenis_kendaraan">Jenis Kendaraan</label>
                            <input type="text" id="jenis_kendaraan" name="jenis_kendaraan" class="form-control" placeholder="mis. Mobil / Motor" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="tarif_per_jam">Tarif Per Jam (Rp)</label>
                            <input type="number" id="tarif_per_jam" name="tarif_per_jam" class="form-control" placeholder="mis. 3000" required>
                        </div>

                        <button class="btn btn-brand w-100" type="submit">Tambah Tarif</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel Daftar Tarif -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h6 mb-3">Daftar Tarif</h2>

                    <div class="table-responsive">
                        <table class="table table-sm align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Jenis Kendaraan</th>
                                    <th>Tarif Per Jam</th>
                                    <th class="text-end" style="width: 140px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($data as $d)
                                    <tr>
                                        <td class="fw-bold text-secondary">{{ $no++ }}</td>
                                        <td>{{ $d->jenis_kendaraan }}</td>
                                        <td>Rp {{ number_format($d->tarif_per_jam, 0, ',', '.') }}</td>
                                            <td class="text-end">
                                                <div class="d-inline-flex gap-2">
                                                    <a href="{{ route('tarif.edit', ['id' => $d->id_tarif]) }}" class="btn btn-sm btn-outline-brand">Edit</a>
                                                    <form method="POST" action="{{ route('tarif.destroy', ['id' => $d->id_tarif]) }}" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tarif ini?')">
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