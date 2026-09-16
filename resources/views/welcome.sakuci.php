@extends('layouts.app')

@section('title', 'EZPark -- Solusi Manajemen Parkir Modern & Cepat')

@section('content')

    {{-- Hero Section --}}
    <section class="text-center py-5 position-relative overflow-hidden">
        <div class="d-inline-flex align-items-center gap-2 badge rounded-pill badge-brand px-3 py-2 mb-4 border border-opacity-25 border-danger shadow-sm">
            <span class="spinner-grow spinner-grow-sm text-brand" role="status" aria-hidden="true" style="width: 8px; height: 8px;"></span>
            <span>Sistem Otomatisasi Parkir v1.0</span>
        </div>

        <h1 class="display-4 fw-bold mb-3 tracking-tight">
            Sistem Parkir Pintar,<br class="d-none d-md-inline">
            <span class="text-brand">Cepat, Aman & Terintegrasi</span>
        </h1>

        <p class="lead text-secondary mx-auto mb-4" style="max-width: 640px; font-size: 1.15rem; line-height: 1.6;">
            Kelola area parkir, pantau ketersediaan slot secara real-time, dan hitung tarif parkir secara otomatis tanpa ribet bersama <strong>EZPark</strong>.
        </p>

        <div class="d-flex flex-wrap gap-3 justify-content-center align-items-center mb-5">
            <a class="btn btn-brand btn-lg px-4 rounded-pill shadow-sm d-inline-flex align-items-center gap-2" href="{{ route('login') }}">
                Masuk ke Sistem
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
            <a class="btn btn-outline-brand btn-lg px-4 rounded-pill d-inline-flex align-items-center gap-2" href="#fitur">
                Lihat Fitur
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
            </a>
        </div>

        <!-- Ringkasan Statistik Cepat -->
        <div class="row g-3 justify-content-center">
            <div class="col-6 col-md-3">
                <div class="p-3 bg-body-tertiary rounded-4 border">
                    <h3 class="h4 fw-bold text-brand m-0">100%</h3>
                    <p class="text-secondary small m-0">Otomatisasi Tarif</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3 bg-body-tertiary rounded-4 border">
                    <h3 class="h4 fw-bold text-brand m-0">Real-Time</h3>
                    <p class="text-secondary small m-0">Monitoring Area</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3 bg-body-tertiary rounded-4 border">
                    <h3 class="h4 fw-bold text-brand m-0">Aman</h3>
                    <p class="text-secondary small m-0">Sistem Akses Admin</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Fitur Utama --}}
    <section id="fitur" class="mb-5 py-4">
        <div class="text-center mb-5">
            <h2 class="h3 fw-bold">Fitur Unggulan EZPark</h2>
            <p class="text-secondary">Segala kemudahan untuk pengelolaan area dan transaksi parkir</p>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4 text-center">
                        <div class="p-3 bg-brand-subtle text-brand rounded-circle d-inline-flex mb-3">
                            <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path><path d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 100-4 2 2 0 000 4zm10 0a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                        </div>
                        <h3 class="h5 fw-bold mb-2">Manajemen Area</h3>
                        <p class="text-secondary small m-0">Pantau kapasitas dan ketersediaan slot parkir kendaraan secara terstruktur di setiap lokasi.</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4 text-center">
                        <div class="p-3 bg-brand-subtle text-brand rounded-circle d-inline-flex mb-3">
                            <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="h5 fw-bold mb-2">Skema Tarif Fleksibel</h3>
                        <p class="text-secondary small m-0">Atur kalkulasi tarif sesuai jenis kendaraan (motor, mobil, atau truk) dan durasi waktu secara akurat.</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card border-0 shadow-sm rounded-4 h-100">
                    <div class="card-body p-4 text-center">
                        <div class="p-3 bg-brand-subtle text-brand rounded-circle d-inline-flex mb-3">
                            <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <h3 class="h5 fw-bold mb-2">Panel Kontrol Admin</h3>
                        <p class="text-secondary small m-0">Akses khusus pengelola untuk mencatat transaksi, menambah tarif baru, dan mengelola area parkir.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Cara Kerja --}}
    <section class="mb-5">
        <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
            <div class="card-body p-4 p-lg-5">
                <div class="text-center mb-4">
                    <h2 class="h4 fw-bold">Alur Kerja EZPark</h2>
                    <p class="text-secondary small">Proses simpel transaksi parkir dari masuk hingga keluar</p>
                </div>

                <div class="row g-4">
                    <div class="col-md-4 text-center">
                        <div class="step-number shadow-sm mx-auto mb-3">1</div>
                        <h3 class="h6 fw-bold">Kendaraan Masuk</h3>
                        <p class="text-secondary small">Petugas mencatat nomor plat dan memilih jenis kendaraan yang masuk ke area parkir.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="step-number shadow-sm mx-auto mb-3">2</div>
                        <h3 class="h6 fw-bold">Sistem Menghitung Durasi</h3>
                        <p class="text-secondary small">Durasi waktu parkir terhitung otomatis secara presisi dari waktu masuk hingga keluar.</p>
                    </div>
                    <div class="col-md-4 text-center">
                        <div class="step-number shadow-sm mx-auto mb-3">3</div>
                        <h3 class="h6 fw-bold">Pembayaran & Selesai</h3>
                        <p class="text-secondary small">Tarif dihitung otomatis oleh EZPark, pembayaran dikonfirmasi, dan kapasitas area diperbarui.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection