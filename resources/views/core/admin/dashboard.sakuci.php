@extends('layouts.app')

@section('title', 'Admin Dashboard - EZPark')

@section('content')

    <!-- Banner Header -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4 d-flex align-items-center justify-content-between flex-wrap gap-3">
            <div>
                <span class="badge rounded-pill badge-brand px-3 py-2 mb-2">Panel Administrator</span>
                <h1 class="h4 mb-1 fw-bold">Selamat Datang, {{ $user->username }}! 👋</h1>
                <p class="text-secondary mb-0 small">Kelola data master area parkir dan pengguna sistem dari satu tempat.</p>
            </div>
            <div>
                <a href="{{ route('area-parkir.create') }}" class="btn btn-brand rounded-pill px-4 shadow-sm">
                    + Tambah Area Parkir
                </a>
            </div>
        </div>
    </div>

    <!-- SECTION 1: Pengguna & Akses (2 Box Simetris 50:50) -->
    <div class="mb-4">
        <h2 class="h6 text-secondary text-uppercase fw-semibold mb-3 style-tiny" style="letter-spacing: 0.5px;">Pengguna & Akses</h2>
        <div class="row g-4">
            <!-- Box Total Pengguna -->
            <div class="col-md-6">
                <a href="{{ route('admin.users.index') }}" class="card border-0 shadow-sm text-decoration-none h-100 hover-card overflow-hidden">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start justify-content-between gap-3 mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="p-3 bg-brand-subtle text-brand rounded-3 d-flex align-items-center justify-content-center" style="width: 52px; height: 52px;">
                                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="h5 mb-0 text-white fw-bold">Total Pengguna</h2>
                                    <span class="text-secondary small">Seluruh Akun Terdaftar</span>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="fs-4 fw-bold text-brand d-block lh-1">{{ $totalUser ?? 0 }}</span>
                                <span class="text-secondary style-tiny text-uppercase fw-semibold" style="font-size: 10px; letter-spacing: 0.5px;">Akun</span>
                            </div>
                        </div>

                        <hr class="border-secondary opacity-25 my-3">

                        <div class="d-flex align-items-center justify-content-between text-secondary small">
                            <span>Manajemen seluruh akun pengguna & hak akses.</span>
                            <span class="text-brand fw-semibold d-inline-flex align-items-center gap-1 ms-2">
                                Lihat 
                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg>
                            </span>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Box Total Roles -->
            <div class="col-md-6">
                <a href="{{ route('admin.roles.index') }}" class="card border-0 shadow-sm text-decoration-none h-100 hover-card overflow-hidden">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start justify-content-between gap-3 mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="p-3 bg-brand-subtle text-brand rounded-3 d-flex align-items-center justify-content-center" style="width: 52px; height: 52px;">
                                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="h5 mb-0 text-white fw-bold">Total Roles</h2>
                                    <span class="text-secondary small">Hak Akses Terdaftar</span>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="fs-4 fw-bold text-brand d-block lh-1">{{ $totalRole ?? 0 }}</span>
                                <span class="text-secondary style-tiny text-uppercase fw-semibold" style="font-size: 10px; letter-spacing: 0.5px;">Roles</span>
                            </div>
                        </div>

                        <hr class="border-secondary opacity-25 my-3">

                        <div class="d-flex align-items-center justify-content-between text-secondary small">
                            <span>Atur perizinan dan peran sistem secara dinamis.</span>
                            <span class="text-brand fw-semibold d-inline-flex align-items-center gap-1 ms-2">
                                Lihat 
                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- SECTION 2: Fitur Utama Parkir (Simetris Penuh) -->
    <div>
        <h2 class="h6 text-secondary text-uppercase fw-semibold mb-3 style-tiny" style="letter-spacing: 0.5px;">Fitur Utama Parkir</h2>
        <div class="row g-4">
            <div class="col-md-6">
                <a href="{{ route('area-parkir.index') }}" class="card border-0 shadow-sm text-decoration-none h-100 hover-card overflow-hidden">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start justify-content-between gap-3 mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="p-3 bg-brand-subtle text-brand rounded-3 d-flex align-items-center justify-content-center" style="width: 52px; height: 52px;">
                                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h4m-4 0V10a2 2 0 012-2h2a2 2 0 012 2v11"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="h5 mb-0 text-white fw-bold">Area Parkir</h2>
                                    <span class="text-secondary small">Kelola Lokasi & Kapasitas</span>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="fs-4 fw-bold text-brand d-block lh-1">{{ $totalAreaParkir ?? 0 }}</span>
                                <span class="text-secondary style-tiny text-uppercase fw-semibold" style="font-size: 10px; letter-spacing: 0.5px;">Lokasi</span>
                            </div>
                        </div>

                        <hr class="border-secondary opacity-25 my-3">

                        <div class="d-flex align-items-center justify-content-between text-secondary small">
                            <span>Atur slot, gedung/blok, & kuota kapasitas.</span>
                            <span class="text-brand fw-semibold d-inline-flex align-items-center gap-1 ms-2">
                                Lihat 
                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection