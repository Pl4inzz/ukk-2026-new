@extends ('layouts.app')

@section ('content')
<div class="container-fluid py-3">
    <!-- Header Page -->
    <div class="mb-4">
        <span class="badge badge-brand mb-2">Area Admin</span>
        <h2 class="fw-bold m-0">Manage Area Parkir</h2>
    </div>

    <div class="row g-4">
        <!-- Kolom Kiri: Form Tambah Area Parkir -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm" style="background-color: var(--bs-tertiary-bg, #1e232a); border-radius: 12px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Tambah Area Parkir</h5>
                    <form action="{{ route('area-parkir.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-secondary fs-7">Nama Area</label>
                            <input type="text" name="nama_area" id="nama_area" class="form-control" placeholder="Masukkan nama area" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary fs-7">Kapasitas</label>
                            <input type="number" name="kapasitas" id="kapasitas" class="form-control" placeholder="Masukkan kapasitas" required>
                        </div>  
                        <div class="mb-3">
                            <label class="form-label text-secondary fs-7">Terisi</label>
                            <input type="number" name="terisi" id="terisi" class="form-control" placeholder="Masukkan jumlah kendaraan yang terisi" required>
                        </div>
                        <button type="submit" class="btn btn-brand w-100 fw-semibold mt-2">
                            Tambah Area Parkir
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Tabel Daftar Area Parkir -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm" style="background-color: var(--bs-tertiary-bg, #1e232a); border-radius: 12px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Daftar Area Parkir</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" style="color: var(--bs-body-color);">
                            <thead>
                                <tr class="border-bottom border-secondary border-opacity-25 text-secondary" style="font-size: 0.85rem;">
                                    <th scope="col" style="width: 50px;">#</th>
                                    <th scope="col">Nama Area</th>
                                    <th scope="col">Kapasitas</th>
                                    <th scope="col">Terisi</th>
                                    <th scope="col" class="text-end" style="width: 140px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($data as $d)
                                <tr class="border-bottom border-secondary border-opacity-10">
                                    <td class="fw-bold text-secondary">{{ $no++ }}</td>
                                    <td>
                                        <span class="fw-semibold">{{ $d->nama_area }}</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary bg-opacity-25 text-body border border-secondary border-opacity-25 px-2 py-1">
                                            {{ $d->kapasitas }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge badge-brand px-2 py-1">
                                            {{ $d->terisi }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-inline-flex gap-2">
                                            <a href="{{ route('area-parkir.edit', ['id_area' => $d->id_area]) }}" class="btn btn-sm btn-outline-brand">Edit</a>
                                            <form action="{{ route('area-parkir.destroy', ['id' => $d->id_area  ]) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah benar akan dihapus?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                            </form> 
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($data->hasPages())
                        <div class="mt-4">
                            {!! $data->links() !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection