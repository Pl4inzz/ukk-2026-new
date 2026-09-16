@php
    $dbConnected = false;
    try {
        \Sakuci\Database\Connection::pdo();
        $dbConnected = true;
    } catch (\Throwable $e) {
        $dbConnected = false;
    }
    $currentUser = \App\Models\User::current();

    // Penentuan Rute Logo EZPark (3 Perkondisian)
    if ($currentUser) {
        // 1. Jika admin -> Ke Dashboard Admin
        // 2. Jika user biasa/petugas -> Ke Dashboard Umum
        $ezparkRoute = ($currentUser->role === 'admin') ? route('admin.dashboard') : route('dashboard');
    } else {
        // 3. Jika belum login (guest) -> Ke Welcome / Home
        $ezparkRoute = route('home');
    }
@endphp

<!-- HEADER TOPBAR -->
<nav class="navbar navbar-expand bg-body border-bottom sticky-top px-3">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        
        <!-- Sisi Kiri: Tombol Sidebar (Khusus Admin) & Logo -->
        <div class="d-flex align-items-center gap-3">
            
            {{-- Tombol Hamburger Hanya Tampil Jika Admin --}}
            @if ($currentUser && $currentUser->role === 'admin')
                <button class="btn btn-outline-secondary border-0 p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </button>
            @endif

            <button id="themeToggle" type="button" class="logo-toggle bg-transparent border-0 p-0"
                    aria-label="Ganti tema terang/gelap (status database: {{ $dbConnected ? 'terhubung' : 'tidak terhubung' }})"
                    title="Ganti tema terang/gelap">
                <svg width="28" height="28" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" style="display: block;" aria-hidden="true">
                    <circle class="logo-ring" cx="16" cy="16" r="15"/>
                    <circle cx="16" cy="16" r="9" fill="{{ $dbConnected ? '#28a745' : '#dc3545' }}"/>
                </svg>
            </button>

            <!-- Brand Link Menggunakan Variable $ezparkRoute -->
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-white text-decoration-none" 
               href="{{ $ezparkRoute }}">EZPark</a>
        </div>

        <!-- Sisi Kanan: Fitur Auth (Daftar, Masuk, Logout) -->
        <div class="d-flex align-items-center gap-2">
            @if ($currentUser)
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-secondary">Logout ({{ $currentUser->username }})</button>
                </form>
            @else
                @php
                    $canRegister = false;
                    if ($dbConnected) {
                        try {
                            $canRegister = \App\Models\Role::where('can_register', 1)->exists();
                        } catch (\Throwable $e) {
                            $canRegister = false;
                        }
                    }
                @endphp
                @if ($canRegister)
                    <a class="nav-link px-2 {{ is_route('register') ? 'active fw-bold' : '' }}" href="{{ route('register') }}">Daftar</a>
                @endif
                <a class="btn btn-sm btn-brand rounded-pill px-3 d-inline-flex align-items-center gap-2" href="{{ route('login') }}">
                    <svg width="14" height="14" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <circle cx="8" cy="5" r="3" fill="currentColor" stroke="none"/>
                        <path d="M2.5 14c0-3.6 2.9-5.8 5.5-5.8s5.5 2.2 5.5 5.8"/>
                    </svg>
                    Masuk
                </a>
            @endif
        </div>
    </div>
</nav>

<!-- SIDEBAR OFFCANVAS (KHUSUS ADMIN) -->
@if ($currentUser && $currentUser->role === 'admin')
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title fw-bold" id="sidebarMenuLabel">Panel Admin</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav nav-pills flex-column gap-2">
                <li class="nav-item">
                    <a class="nav-link {{ is_route('admin.users.index') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ is_route('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ is_route('tarif.index') ? 'active' : '' }}" href="{{ route('tarif.index') }}">Daftar Tarif</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ is_route('area-parkir.index') ? 'active' : '' }}" href="{{ route('area-parkir.index') }}">Daftar Area Parkir</a>
                </li>
            </ul>
        </div>
    </div>
@endif