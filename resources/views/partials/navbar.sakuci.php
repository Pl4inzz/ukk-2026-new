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
        $ezparkRoute = ($currentUser->role === 'admin') ? route('admin.dashboard') : route('dashboard');
    } else {
        $ezparkRoute = route('home');
    }
@endphp

<nav class="navbar navbar-expand bg-body border-bottom sticky-top px-3">
    <div class="container-fluid d-flex align-items-center justify-content-between">
        
        <div class="d-flex align-items-center gap-3">
            
            {{-- Tombol Hamburger (Khusus Admin) --}}
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

@if ($currentUser && $currentUser->role === 'admin')
    <div class="offcanvas offcanvas-start offcanvas-dark" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        
        <div class="offcanvas-header p-3">
            <div>
                <h5 class="offcanvas-title fw-bold fs-6 mb-0 text-white" id="sidebarMenuLabel">Panel Admin</h5>
                <small class="text-secondary" style="font-size: 12px;">Administrator</small>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body p-3">
            <div class="sidebar-category">MENU UTAMA</div>
            <nav class="nav flex-column gap-1">
                <a class="sidebar-link {{ is_route('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="3" y="3" width="7" height="7" rx="1"></rect>
                        <rect x="14" y="3" width="7" height="7" rx="1"></rect>
                        <rect x="14" y="14" width="7" height="7" rx="1"></rect>
                        <rect x="3" y="14" width="7" height="7" rx="1"></rect>
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a class="sidebar-link {{ is_route('admin.users.index') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    <span>Users</span>
                </a>

                <a class="sidebar-link {{ is_route('admin.roles.index') ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    <span>Roles</span>
                </a>
            </nav>

            <div class="sidebar-category">MASTER DATA PARKIR</div>
            <nav class="nav flex-column gap-1">
                <a class="sidebar-link {{ is_route('tarif.index') ? 'active' : '' }}" href="{{ route('tarif.index') }}">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <rect x="2" y="6" width="20" height="12" rx="2"></rect>
                        <circle cx="12" cy="12" r="2"></circle>
                        <path d="M6 12h.01M18 12h.01"></path>
                    </svg>
                    <span>Daftar Tarif</span>
                </a>

                <a class="sidebar-link {{ is_route('area-parkir.index') ? 'active' : '' }}" href="{{ route('area-parkir.index') }}">
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

                        <a class="sidebar-link {{ is_route('member.index') ? 'active' : '' }}" href="{{ route('member.index') }}">
                    
                    <span>Daftar Member</span>
                </a>

            </nav>
        </div>
    </div>
@endif