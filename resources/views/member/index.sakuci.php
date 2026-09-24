@extends('layouts.app')

@section('title', 'Manage Member')

@section('content')

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <span class="badge rounded-pill badge-brand px-3 py-2 mb-2">Area Admin</span>
            <h1 class="h4 mb-0">Manage Members</h1>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-secondary">&larr; Kembali</a>
    </div>

    <div class="row g-4">
        <!-- Form Tambah Member -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h6 mb-3">Tambah Member Baru</h2>

                    <form method="POST" action="{{ route('member.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label text-secondary fs-7" for="id_user">Pilih User / Pemilik</label>
                            <select id="id_user" name="id_user" class="form-select" required>
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id_user ?? $user->id }}">
                                        {{ $user->nama ?? $user->name ?? $user->username }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary fs-7" for="plat_nomor">Plat Nomor</label>
                            <input type="text" id="plat_nomor" name="plat_nomor" class="form-control" placeholder="mis. B 1234 ABC" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary fs-7" for="jenis_kendaraan">Jenis Kendaraan</label>
                            <input type="text" id="jenis_kendaraan" name="jenis_kendaraan" class="form-control" placeholder="mis. Mobil / Motor" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary fs-7" for="warna">Warna</label>
                            <input type="text" id="warna" name="warna" class="form-control" placeholder="mis. Hitam" required>
                        </div>

                        <button class="btn btn-brand w-100 fw-semibold mt-2" type="submit">Tambah Member</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Tabel Daftar Member -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h2 class="h6 mb-3">Daftar Member</h2>

                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
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
                                    <tr>
                                        <td class="fw-bold text-secondary">{{ $no++ }}</td>
                                        <td>
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
                                                <form method="POST" action="{{ route('member.destroy', ['id' => $d->id_member]) }}" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus member ini?')">
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

                    @if (method_exists($data, 'hasPages') && $data->hasPages())
                        <div class="mt-4">
                            {!! $data->links() !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection