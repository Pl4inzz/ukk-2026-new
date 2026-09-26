@extends('layouts.app')

@section('title', 'Selamat Datang - EZPark')

@section('content')

    <!-- Banner Welcome -->
    <div class="card border-0 shadow-lg mb-4 overflow-hidden position-relative" style="background: linear-gradient(135deg, #1f2327 0%, #2b3035 60%, #3d2a10 100%); border: 2px solid #495057 !important; border-radius: 16px;">
        <div class="position-absolute rounded-circle" style="width: 250px; height: 250px; background: radial-gradient(circle, rgba(243,156,18,0.15) 0%, rgba(0,0,0,0) 70%); top: -70px; right: -50px; pointer-events: none;"></div>
        
        <div class="card-body p-4 p-md-5 position-relative z-1">
            <div class="d-flex align-items-center justify-content-between flex-wrap gap-4">
                <div class="d-flex align-items-center gap-3 gap-md-4">
                    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="background: linear-gradient(135deg, #3d2a10 0%, #7c4c0b 100%); width: 64px; height: 64px; border: 2px solid #f39c12; box-shadow: 0 0 15px rgba(243, 156, 18, 0.3);">
                        <svg width="32" height="32" fill="none" stroke="#f39c12" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5m0 0h4m-4 0V10a2 2 0 012-2h2a2 2 0 012 2v11"></path>
                        </svg>
                    </div>

                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1 flex-wrap">
                            <span class="badge rounded-pill px-3 py-1" style="background-color: rgba(243, 156, 18, 0.15); color: #f39c12; border: 1px solid #7c4c0b; font-size: 11px; font-weight: 600; letter-spacing: 0.5px;">
                                SISTEM MANAJEMEN PARKIR
                            </span>
                            <span class="badge rounded-pill bg-dark text-secondary px-2 py-1 border border-secondary" style="font-size: 10px;">
                                EZPark v1.0
                            </span>
                        </div>
                        <h1 class="h3 mb-1 fw-bold text-white tracking-wide">
                            Selamat Datang di <span style="color: #f39c12;">EZPark</span>! 👋
                        </h1>
                        <p class="text-secondary mb-0 small" style="max-width: 550px; line-height: 1.5;">
                            Solusi praktis kelola area parkir, keanggotaan member, dan manajemen akses petugas dari satu tempat.
                        </p>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2 flex-wrap ms-auto ms-md-0">
                    <a href="{{ route('login') }}" class="btn fw-semibold px-4 py-2 text-dark shadow-sm d-inline-flex align-items-center gap-2" style="background-color: #f39c12; border: 1px solid #f39c12; border-radius: 8px;">
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                        </svg>
                        Masuk ke System
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 1: Pengguna & Keanggotaan -->
    <div class="mb-4">
        <h2 class="h6 text-secondary text-uppercase fw-semibold mb-3 style-tiny" style="letter-spacing: 0.5px;">Pengguna & Keanggotaan</h2>
        <div class="row g-4">
            <!-- Box Total Pengguna -->
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden" style="background-color: #2b3035; border: 2px solid #495057 !important; border-radius: 10px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start justify-content-between gap-3 mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="p-3 rounded-3 d-flex align-items-center justify-content-center" style="background-color: #3d2a10; color: #f39c12; border: 1px solid #7c4c0b; width: 52px; height: 52px;">
                                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="h5 mb-0 text-white fw-bold">Total Pengguna</h2>
                                    <span class="text-secondary small">Akun Petugas/Admin</span>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="fs-4 fw-bold d-block lh-1" style="color: #f39c12;">{{ $totalUser ?? 0 }}</span>
                                <span class="text-secondary style-tiny text-uppercase fw-semibold" style="font-size: 10px; letter-spacing: 0.5px;">Akun</span>
                            </div>
                        </div>
                        <hr class="border-secondary opacity-25 my-3">
                        <div class="text-secondary small">
                            Manajemen seluruh akun pengguna & hak akses sistem.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Box Total Roles -->
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden" style="background-color: #2b3035; border: 2px solid #495057 !important; border-radius: 10px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start justify-content-between gap-3 mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="p-3 rounded-3 d-flex align-items-center justify-content-center" style="background-color: #3d2a10; color: #f39c12; border: 1px solid #7c4c0b; width: 52px; height: 52px;">
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
                                <span class="fs-4 fw-bold d-block lh-1" style="color: #f39c12;">{{ $totalRole ?? 0 }}</span>
                                <span class="text-secondary style-tiny text-uppercase fw-semibold" style="font-size: 10px; letter-spacing: 0.5px;">Roles</span>
                            </div>
                        </div>
                        <hr class="border-secondary opacity-25 my-3">
                        <div class="text-secondary small">
                            Atur perizinan dan peran sistem secara dinamis.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION 2: Fitur Utama Parkir -->
    <div>
        <h2 class="h6 text-secondary text-uppercase fw-semibold mb-3 style-tiny" style="letter-spacing: 0.5px;">Fitur Utama Parkir</h2>
        <div class="row g-4">
            <!-- Box Area Parkir -->
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden" style="background-color: #2b3035; border: 2px solid #495057 !important; border-radius: 10px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start justify-content-between gap-3 mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="p-3 rounded-3 d-flex align-items-center justify-content-center" style="background-color: #3d2a10; color: #f39c12; border: 1px solid #7c4c0b; width: 52px; height: 52px;">
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
                                <span class="fs-4 fw-bold d-block lh-1" style="color: #f39c12;">{{ $totalAreaParkir ?? 0 }}</span>
                                <span class="text-secondary style-tiny text-uppercase fw-semibold" style="font-size: 10px; letter-spacing: 0.5px;">Lokasi</span>
                            </div>
                        </div>
                        <hr class="border-secondary opacity-25 my-3">
                        <div class="text-secondary small">
                            Atur slot, gedung/blok, & kuota kapasitas.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Box Total Member -->
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100 overflow-hidden" style="background-color: #2b3035; border: 2px solid #495057 !important; border-radius: 10px;">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start justify-content-between gap-3 mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="p-3 rounded-3 d-flex align-items-center justify-content-center" style="background-color: #3d2a10; color: #f39c12; border: 1px solid #7c4c0b; width: 52px; height: 52px;">
                                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <rect x="3" y="4" width="18" height="16" rx="2"></rect>
                                        <line x1="7" y1="8" x2="17" y2="8"></line>
                                        <line x1="7" y1="12" x2="13" y2="12"></line>
                                    </svg>
                                </div>
                                <div>
                                    <h2 class="h5 mb-0 text-white fw-bold">Total Member</h2>
                                    <span class="text-secondary small">Anggota Parkir Langganan</span>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="fs-4 fw-bold d-block lh-1" style="color: #f39c12;">{{ $totalMember ?? 0 }}</span>
                                <span class="text-secondary style-tiny text-uppercase fw-semibold" style="font-size: 10px; letter-spacing: 0.5px;">Member</span>
                            </div>
                        </div>
                        <hr class="border-secondary opacity-25 my-3">
                        <div class="text-secondary small">
                            Kelola data keanggotaan & tarif khusus.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
