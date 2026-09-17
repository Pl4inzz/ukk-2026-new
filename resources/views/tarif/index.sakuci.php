@extends ('layouts.app')

@section ('content')
<div class="container-fluid py-3">
    <!-- Header Page -->
    <div class="mb-4">
        <span class="badge badge-brand mb-2">Area Admin</span>
        <h2 class="fw-bold m-0">Manage Tarif</h2>
    </div>

    <div class="row g-4">
        <!-- Kolom Kiri: Form Tambah Tarif -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm" style="background-color: var(--bs-tertiary-bg, #1e232a); border-radius: 12px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Tambah Tarif Baru</h5>
                    <form action="{{ route('tarif.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-secondary fs-7">Jenis Kendaraan</label>
                            <input type="text" name="jenis_kendaraan" class="form-control" placeholder="mis. Mobil / Motor" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary fs-7">Tarif Per Jam (Rp)</label>
                            <input type="number" name="tarif_per_jam" class="form-control" placeholder="mis. 3000" required>
                        </div>
                        <button type="submit" class="btn btn-brand w-100 fw-semibold mt-2">
                            Tambah Tarif
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Tabel Daftar Tarif -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm" style="background-color: var(--bs-tertiary-bg, #1e232a); border-radius: 12px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Daftar Tarif</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" style="color: var(--bs-body-color);">
                            <thead>
                                <tr class="border-bottom border-secondary border-opacity-25 text-secondary" style="font-size: 0.85rem;">
                                    <th scope="col" style="width: 50px;">#</th>
                                    <th scope="col">Jenis Kendaraan</th>
                                    <th scope="col">Tarif Per Jam</th>
                                    <th scope="col" class="text-end" style="width: 140px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($data as $d)
                                <tr class="border-bottom border-secondary border-opacity-10">
                                    <td class="fw-bold text-secondary">{{ $no++ }}</td>
                                    <td>
                                        <code class="inline fs-6 fw-semibold">{{ $d->jenis_kendaraan }}</code>
                                    </td>
                                    <td>
                                        <span class="fw-semibold">Rp {{ number_format($d->tarif_per_jam, 0, ',', '.') }}</span>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-inline-flex gap-2">
                                            <a href="{{ route('tarif.edit', ['id_tarif' => $d->id_tarif]) }}" class="btn btn-sm btn-outline-brand">Edit</a>
                                            <form action="{{ route('tarif.destroy', ['id' => $d->id_tarif]) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah benar akan dihapus?');">
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