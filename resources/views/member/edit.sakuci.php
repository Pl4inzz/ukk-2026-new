@extends('layouts.app')

@section('content')
<div class="container-fluid py-3">
    <!-- Header Page -->
    <div class="mb-4">
        <span class="badge badge-brand mb-2">Area Admin</span>
        <h2 class="fw-bold m-0">Edit Data Member</h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm" style="background-color: var(--bs-tertiary-bg, #1e232a); border-radius: 12px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Form Edit Member</h5>

                    <form action="{{ route('member.update', ['id' => $member->id_member]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Pilih User / Pemilik -->
                        <div class="mb-3">
                            <label for="id_user" class="form-label text-secondary fs-7">Pilih User / Pemilik</label>
                            <select name="id_user" id="id_user" class="form-select" required>
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $user)
                                    @php 
                                        $userId = $user->id ?? $user->id_user; 
                                    @endphp
                                    <option value="{{ $userId }}" {{ $member->id_user == $userId ? 'selected' : '' }}>
                                        {{ $user->nama ?? $user->name ?? $user->username }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Plat Nomor -->
                        <div class="mb-3">
                            <label for="plat_nomor" class="form-label text-secondary fs-7">Plat Nomor</label>
                            <input 
                                type="text" 
                                name="plat_nomor" 
                                id="plat_nomor" 
                                class="form-control" 
                                value="{{ $member->plat_nomor }}" 
                                placeholder="mis. B 1234 ABC" 
                                required>
                        </div>

                        <!-- Jenis Kendaraan -->
                        <div class="mb-3">
                            <label for="jenis_kendaraan" class="form-label text-secondary fs-7">Jenis Kendaraan</label>
                            <input 
                                type="text" 
                                name="jenis_kendaraan" 
                                id="jenis_kendaraan" 
                                class="form-control" 
                                value="{{ $member->jenis_kendaraan }}" 
                                placeholder="mis. Mobil / Motor" 
                                required>
                        </div>

                        <!-- Warna -->
                        <div class="mb-4">
                            <label for="warna" class="form-label text-secondary fs-7">Warna</label>
                            <input 
                                type="text" 
                                name="warna" 
                                id="warna" 
                                class="form-control" 
                                value="{{ $member->warna }}" 
                                placeholder="mis. Hitam" 
                                required>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-brand fw-semibold flex-fill">
                                Update Member
                            </button>
                            <a href="{{ route('member.index') }}" class="btn btn-outline-secondary fw-semibold">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection