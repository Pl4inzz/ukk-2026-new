@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- Alert Notification --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 bg-success bg-opacity-10 text-success mb-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Hero / Banner Dashboard Petugas -->
    <div class="card mb-4 text-white shadow-sm" style="background-color: #2b3035; border: 2px solid #495057; border-radius: 12px;">
        <div class="card-body p-4">
            <span class="badge mb-2 px-3 py-2 fw-semibold" style="background-color: #3d2a10; color: #f39c12; border: 1px solid #7c4c0b; font-size: 11px; border-radius: 20px;">
                Panel Petugas
            </span>
            <h3 class="fw-bold mb-1 text-white">Selamat Datang, {{ $currentUser->username ?? 'Petugas' }}! 👋</h3>
            <p class="mb-0" style="font-size: 14px; color: #a0aabe;">
                Kelola transaksi parkir masuk, parkir keluar, dan pantau ketersediaan area secara langsung.
            </p>
        </div>
    </div>

    <!-- Section Title -->
    <div class="mb-3">
        <h6 class="text-uppercase fw-bold tracking-wider" style="font-size: 11px; letter-spacing: 1px; color: #a0aabe;">
            RINGKASAN TRANSAKSI HARI INI
        </h6>
    </div>

    <!-- Stat Cards (3 Kolom Statistik Petugas - Hanya 2 Warna Utama) -->
    <div class="row g-3 mb-4">
        {{-- Masuk Hari Ini --}}
        <div class="col-12 col-md-4">
            <div class="card h-100 p-3 shadow-sm" style="background-color: #2b3035; border: 2px solid #495057; border-radius: 10px;">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 p-3 d-flex align-items-center justify-content-center" style="background-color: #3d2a10; color: #f39c12; width: 48px; height: 48px; border: 1px solid #7c4c0b;">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                                <polyline points="10 17 15 12 10 7"></polyline>
                                <line x1="15" y1="12" x2="3" y2="12"></line>
                            </svg>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-white" style="font-size: 15px;">Masuk Hari Ini</h6>
                            <span style="font-size: 12px; color: #a0aabe;">Transaksi Masuk</span>
                        </div>
                    </div>
                    <div class="text-end">
                        <span class="fs-2 fw-bold" style="color: #f39c12;">{{ $masukHariIni ?? 0 }}</span>
                        <div class="text-uppercase" style="font-size: 10px; letter-spacing: 0.5px; color: #a0aabe;">KENDARAAN</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Keluar Hari Ini --}}
        <div class="col-12 col-md-4">
            <div class="card h-100 p-3 shadow-sm" style="background-color: #2b3035; border: 2px solid #495057; border-radius: 10px;">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 p-3 d-flex align-items-center justify-content-center" style="background-color: #3d2a10; color: #f39c12; width: 48px; height: 48px; border: 1px solid #7c4c0b;">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                <polyline points="16 17 21 12 16 7"></polyline>
                                <line x1="21" y1="12" x2="9" y2="12"></line>
                            </svg>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-white" style="font-size: 15px;">Keluar Hari Ini</h6>
                            <span style="font-size: 12px; color: #a0aabe;">Transaksi Selesai</span>
                        </div>
                    </div>
                    <div class="text-end">
                        <span class="fs-2 fw-bold" style="color: #f39c12;">{{ $keluarHariIni ?? 0 }}</span>
                        <div class="text-uppercase" style="font-size: 10px; letter-spacing: 0.5px; color: #a0aabe;">KENDARAAN</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sedang Terparkir --}}
        <div class="col-12 col-md-4">
            <div class="card h-100 p-3 shadow-sm" style="background-color: #2b3035; border: 2px solid #495057; border-radius: 10px;">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 p-3 d-flex align-items-center justify-content-center" style="background-color: #3d2a10; color: #f39c12; width: 48px; height: 48px; border: 1px solid #7c4c0b;">
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <rect x="3" y="4" width="18" height="16" rx="2"></rect>
                                <path d="M7 8h10M7 12h10M7 16h6"></path>
                            </svg>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-0 text-white" style="font-size: 15px;">Sedang Terparkir</h6>
                            <span style="font-size: 12px; color: #a0aabe;">Aktif Dalam Area</span>
                        </div>
                    </div>
                    <div class="text-end">
                        <span class="fs-2 fw-bold" style="color: #f39c12;">{{ $sedangTerparkir ?? 0 }}</span>
                        <div class="text-uppercase" style="font-size: 10px; letter-spacing: 0.5px; color: #a0aabe;">KENDARAAN</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Kendaraan Aktif -->
    <div class="card mb-4 shadow-sm" style="background-color: #2b3035; border: 2px solid #495057; border-radius: 10px;">
        <div class="card-header bg-transparent p-3 d-flex align-items-center justify-content-between" style="border-bottom: 2px solid #495057;">
            <h6 class="fw-bold mb-0 text-white">Kendaraan Aktif Terparkir</h6>
            <a href="{{ route('parkir.masuk') }}" class="btn btn-sm text-decoration-none fw-semibold" style="color: #f39c12; font-size: 13px;">
                + Input Parkir Masuk
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-dark table-hover mb-0 align-middle" style="--bs-table-bg: transparent;">
                <thead>
                    <tr style="font-size: 12px; color: #a0aabe; border-bottom: 2px solid #495057;">
                        <th class="ps-3 py-3">PLAT NOMOR</th>
                        <th class="py-3">WAKTU MASUK</th>
                        <th class="py-3">AREA PARKIR</th>
                        <th class="pe-3 py-3 text-end">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kendaraanAktif ?? [] as $item)
                        <tr style="border-bottom: 1px solid #495057;">
                            <td class="ps-3 fw-bold text-white">{{ $item->plat_nomor }}</td>
                            <td style="color: #ced4da;">{{ $item->created_at ? $item->created_at->format('d/m/Y H:i') : '-' }}</td>
                            <td>
                                <span class="badge px-2 py-1" style="background-color: #3d2a10; color: #f39c12; border: 1px solid #7c4c0b; font-weight: 500;">
                                    {{ $item->areaParkir->nama_area ?? 'Umum' }}
                                </span>
                            </td>
                            <td class="pe-3 text-end">
                                <a href="{{ route('parkir.keluar', ['kode' => $item->kode_transaksi ?? $item->id]) }}" class="btn btn-sm text-nowrap" style="background-color: #3d2a10; color: #f39c12; border: 1px solid #7c4c0b; font-size: 12px;">
                                    Proses Keluar
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4" style="color: #a0aabe;">
                                Tidak ada kendaraan terparkir.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection