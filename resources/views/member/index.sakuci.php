@extends ('layouts.app')

@section ('content')
<div class="container-fluid py-3">
    <div class="mb-4">
        <span class="badge badge-brand mb-2">Area Admin</span>
        <h2 class="fw-bold m-0">Manage Members</h2>
    </div>

    <div class="row g-4">
        <!-- Kolom Kiri: Form Tambah Member -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm" style="background-color: var(--bs-tertiary-bg, #1e232a); border-radius: 12px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Tambah Member</h5>
                    <form action="{{ route('member.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-secondary fs-7">Pilih User / Pemilik</label>
                            <select name="id_user" class="form-select" required>
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $user)
                                    {{-- Menggunakan $user->id_user ?? $user->id agar fleksibel menangkap Primary Key user --}}
                                    <option value="{{ $user->id_user ?? $user->id }}">
                                        {{ $user->nama ?? $user->name ?? $user->username }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary fs-7">Plat Nomor</label>
                            <input type="text" name="plat_nomor" class="form-control" placeholder="mis. B 1234 ABC" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary fs-7">Jenis Kendaraan</label>
                            <input type="text" name="jenis_kendaraan" class="form-control" placeholder="mis. Mobil / Motor" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-secondary fs-7">Warna</label>
                            <input type="text" name="warna" class="form-control" placeholder="mis. Hitam" required>
                        </div>
                        <button type="submit" class="btn btn-brand w-100 fw-semibold mt-2">
                            Tambah Member
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Tabel Daftar Member -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm" style="background-color: var(--bs-tertiary-bg, #1e232a); border-radius: 12px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">Daftar Member</h5>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0" style="color: var(--bs-body-color);">
                            <thead>
                                <tr class="border-bottom border-secondary border-opacity-25 text-secondary" style="font-size: 0.85rem;">
                                    <th scope="col" style="width: 50px;">#</th>
                                    <th scope="col">Pemilik (User)</th>
                                    <th scope="col">Plat Nomor</th>
                                    <th scope="col">Jenis Kendaraan</th>
                                    <th scope="col">Warna</th>
                                    <th scope="col" class="text-end" style="width: 140px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach($data as $d)
                                <tr class="border-bottom border-secondary border-opacity-10">
                                    <td class="fw-bold text-secondary">{{ $no++ }}</td>
                                    <td>
                                        <!-- Mengambil nama dari relasi user -->
                                        <span class="fw-semibold">{{ $d->user->nama ?? $d->user->username ?? 'User #' . $d->id_user }}</span>
                                    </td>
                                    <td>
                                        <code class="inline fs-6 fw-semibold">{{ $d->plat_nomor }}</code>
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary bg-opacity-25 text-body border border-secondary border-opacity-25 px-2 py-1">
                                            {{ $d->jenis_kendaraan }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-dark border border-secondary text-secondary px-2 py-1">
                                            {{ $d->warna }}
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <div class="d-inline-flex gap-2">
                                            <a href="{{ route('member.edit', ['id' => $d->id_member]) }}" class="btn btn-sm btn-outline-brand">Edit</a>
                                            <form action="{{ route('member.destroy', ['id' => $d->id_member]) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah benar akan dihapus?');">
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