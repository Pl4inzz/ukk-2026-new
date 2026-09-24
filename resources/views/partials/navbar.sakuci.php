@php
    $dbConnected = false;
    try {
        \Sakuci\Database\Connection::pdo();
        $dbConnected = true;
    } catch (\Throwable $e) {
        $dbConnected = false;
    }
    $currentUser = \App\Models\User::current();

    // Penentuan Rute Logo EZPark
    if ($currentUser) {
        if ($currentUser->role === 'admin') {
            $ezparkRoute = route('admin.dashboard');
        } elseif ($currentUser->role === 'petugas') {
            $ezparkRoute = route('petugas.dashboard');
        } else {
            $ezparkRoute = route('dashboard');
        }
    } else {
        $ezparkRoute = route('home');
    }
@endphp

<!-- Custom Style Sidebar & Navbar Dark Theme -->
<style>
    :root {
        --logo-ring-color: #6c757d;
        --sidebar-bg: #212529;
        --sidebar-header-bg: #1a1d20;
        --sidebar-border: #343a40;
        --sidebar-text: #ced4da;
        --sidebar-link-hover: #2c3035;
        --sidebar-active-bg: #322312;
        --sidebar-active-text: #f39c12;
        --sidebar-active-border: #e67e22;
    }

    .logo-toggle {
        cursor: pointer;
        transition: transform 0.2s ease;
    }
    .logo-toggle:hover {
        transform: scale(1.1);
    }
    .logo-ring {
        fill: none;
        stroke: var(--logo-ring-color);
        stroke-width: 2;
    }

    /* Offcanvas Dark Styling */
    .offcanvas-ezpark {
        background-color: var(--sidebar-bg) !important;
        color: var(--sidebar-text) !important;
        border-right: 1px solid var(--sidebar-border) !important;
    }

    .offcanvas-ezpark .offcanvas-header {
        background-color: var(--sidebar-header-bg);
        border-bottom: 1px solid var(--sidebar-border) !important;
    }

    .offcanvas-ezpark .sidebar-category {
        color: #8d96a0 !important;
        font-size: 11px;
        letter-spacing: 0.8px;
    }

    /* Custom Sidebar Link */
    .sidebar-ezlink {
        color: #b0b8c1 !important;
        padding: 10px 14px;
        font-weight: 500;
        transition: all 0.2s ease;
        border: 1px solid transparent;
    }

    .sidebar-ezlink:hover {
        background-color: var(--sidebar-link-hover) !important;
        color: #ffffff !important;
    }

    .sidebar-ezlink.active {
        background-color: var(--sidebar-active-bg) !important;
        color: var(--sidebar-active-text) !important;
        border-color: var(--sidebar-active-border) !important;
        font-weight: 600;
    }

    /* Badge Role Dark */
    .role-badge {
        background-color: #3d2a10;
        color: #f39c12;
        border: 1px solid #7c4c0b;
        padding: 2px 8px;
        border-radius: 6px;
        font-size: 11px;
    }
</style>

<nav class="navbar navbar-expand bg-body border-bottom sticky-top px-3">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        
        <div class="d-flex align-items-center gap-3">
            
            {{-- Tombol Hamburger (Khusus Admin & Petugas) --}}
            @if ($currentUser && in_array($currentUser->role, ['admin', 'petugas']))
                <button class="btn btn-outline-secondary border-0 p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                    <svg width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </button>
            @endif

            {{-- Tombol Toggle Light/Dark Mode + Indikator DB --}}
            <button id="themeToggle" type="button" class="logo-toggle bg-transparent border-0 p-0"
                    aria-label="Ganti tema terang/gelap (status database: {{ $dbConnected ? 'terhubung' : 'tidak terhubung' }})"
                    title="Klik untuk ganti tema terang/gelap">
                <svg width="28" height="28" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" style="display: block;" aria-hidden="true">
                    <circle class="logo-ring" cx="16" cy="16" r="15"/>
                    <circle cx="16" cy="16" r="9" fill="{{ $dbConnected ? '#28a745' : '#dc3545' }}"/>
                </svg>
            </button>

            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold text-body text-decoration-none" 
               href="{{ $ezparkRoute }}">EZPark</a>
        </div>

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

{{-- OFF CANVAS SIDEBAR ADMIN --}}
@if ($currentUser && $currentUser->role === 'admin')
    <div class="offcanvas offcanvas-start offcanvas-ezpark" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header p-3">
            <div>
                <h5 class="offcanvas-title fw-bold fs-6 mb-1 text-white" id="sidebarMenuLabel">Panel Admin</h5>
                <span class="role-badge">Administrator</span>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-3">
            <div class="sidebar-category text-uppercase fw-bold mb-2">MENU UTAMA</div>
            <nav class="nav flex-column gap-1 mb-4">
                <a class="sidebar-ezlink nav-link rounded-2 d-flex align-items-center gap-2 {{ is_route('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="7" height="7" rx="1"></rect>
                        <rect x="14" y="3" width="7" height="7" rx="1"></rect>
                        <rect x="14" y="14" width="7" height="7" rx="1"></rect>
                        <rect x="3" y="14" width="7" height="7" rx="1"></rect>
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a class="sidebar-ezlink nav-link rounded-2 d-flex align-items-center gap-2 {{ is_route('admin.users.index') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span>Users</span>
                </a>

                <a class="sidebar-ezlink nav-link rounded-2 d-flex align-items-center gap-2 {{ is_route('admin.roles.index') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    <span>Roles</span>
                </a>
            </nav>

            <div class="sidebar-category text-uppercase fw-bold mb-2">MASTER DATA PARKIR</div>
            <nav class="nav flex-column gap-1">
                <a class="sidebar-ezlink nav-link rounded-2 d-flex align-items-center gap-2 {{ is_route('tarif.index') ? 'active' : '' }}" href="{{ route('tarif.index') }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="2" y="6" width="20" height="12" rx="2"></rect>
                        <circle cx="12" cy="12" r="2"></circle>
                        <path d="M6 12h.01M18 12h.01"></path>
                    </svg>
                    <span>Daftar Tarif</span>
                </a>

                <a class="sidebar-ezlink nav-link rounded-2 d-flex align-items-center gap-2 {{ is_route('area-parkir.index') ? 'active' : '' }}" href="{{ route('area-parkir.index') }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M3 21h18"></path>
                        <path d="M5 21V7l8-4v18"></path>
                        <path d="M19 21V11l-6-3"></path>
                        <path d="M9 9v.01"></path>
                        <path d="M9 12v.01"></path>
                        <path d="M9 15v.01"></path>
                        <path d="M9 18v.01"></path>
                    </svg>
                    <span>Daftar Area Parkir</span>
                </a>

                <a class="sidebar-ezlink nav-link rounded-2 d-flex align-items-center gap-2 {{ is_route('member.index') ? 'active' : '' }}" href="{{ route('member.index') }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="16" rx="2"></rect>
                        <circle cx="9" cy="10" r="2"></circle>
                        <path d="M15 8h2M15 12h2M7 16h10"></path>
                    </svg>
                    <span>Daftar Member</span>
                </a>
            </nav>
        </div>
    </div>
@endif

{{-- OFF CANVAS SIDEBAR PETUGAS --}}
@if ($currentUser && $currentUser->role === 'petugas')
    <div class="offcanvas offcanvas-start offcanvas-ezpark" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header p-3">
            <div>
                <h5 class="offcanvas-title fw-bold fs-6 mb-1 text-white" id="sidebarMenuLabel">Panel Petugas</h5>
                <span class="role-badge">Petugas / Kasir</span>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-3">
            <div class="sidebar-category text-uppercase fw-bold mb-2">MENU UTAMA</div>
            <nav class="nav flex-column gap-1 mb-4">
                <a class="sidebar-ezlink nav-link rounded-2 d-flex align-items-center gap-2 {{ is_route('petugas.dashboard') ? 'active' : '' }}" href="{{ route('petugas.dashboard') }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="7" height="7" rx="1"></rect>
                        <rect x="14" y="3" width="7" height="7" rx="1"></rect>
                        <rect x="14" y="14" width="7" height="7" rx="1"></rect>
                        <rect x="3" y="14" width="7" height="7" rx="1"></rect>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </nav>

            <div class="sidebar-category text-uppercase fw-bold mb-2">TRANSAKSI PARKIR</div>
            <nav class="nav flex-column gap-1">
                {{-- Parkir Masuk --}}
                <a class="sidebar-ezlink nav-link rounded-2 d-flex align-items-center gap-2 {{ is_route('parkir.masuk') ? 'active' : '' }}" href="{{ route('parkir.masuk') }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                        <polyline points="10 17 15 12 10 7"></polyline>
                        <line x1="15" y1="12" x2="3" y2="12"></line>
                    </svg>
                    <span>Parkir Masuk</span>
                </a>

                {{-- Parkir Keluar --}}
                <a class="sidebar-ezlink nav-link rounded-2 d-flex align-items-center gap-2 {{ is_route('parkir.keluar') ? 'active' : '' }}" href="{{ route('parkir.keluar') }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span>Parkir Keluar</span>
                </a>

                {{-- Riwayat / Laporan Transaksi --}}
                <a class="sidebar-ezlink nav-link rounded-2 d-flex align-items-center gap-2 {{ is_route('parkir.riwayat') ? 'active' : '' }}" href="{{ route('parkir.riwayat') }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                    <span>Riwayat Transaksi</span>
                </a>
            </nav>
        </div>
    </div>
@endif