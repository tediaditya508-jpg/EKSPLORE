@php
    $sidebarUser = auth()->user();
    $sidebarRole = $sidebarUser->role ?? 'siswa';
    $sidebarTheme = match ($sidebarRole) {
        'admin', 'pembina' => $sidebarRole,
        default => '',
    };

    $sidebarBrand = match ($sidebarRole) {
        'admin' => 'EKSPLORE ADMIN',
        'pembina' => 'EKSPLORE PEMBINA',
        default => 'EKSPLORE',
    };

    $sidebarSubtitle = match ($sidebarRole) {
        'admin' => 'Administrator System',
        default => 'SMK Budi Bakti',
    };

    $sidebarHome = match ($sidebarRole) {
        'admin' => route('admin.dashboard'),
        'pembina' => route('pembina.dashboard'),
        default => route('dashboard'),
    };

    $sidebarIcons = [
        'dashboard' => '<svg class="app-icon" viewBox="0 0 24 24"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>',
        'book' => '<svg class="app-icon" viewBox="0 0 24 24"><path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20"/></svg>',
        'users' => '<svg class="app-icon" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
        'member' => '<svg class="app-icon" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>',
        'calendar' => '<svg class="app-icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>',
        'clipboard' => '<svg class="app-icon" viewBox="0 0 24 24"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/></svg>',
        'file' => '<svg class="app-icon" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/></svg>',
        'check' => '<svg class="app-icon" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
        'trophy' => '<svg class="app-icon" viewBox="0 0 24 24"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"/><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"/><path d="M4 22h16"/><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"/><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"/><path d="M18 2H6v7a6 6 0 0 0 12 0V2z"/></svg>',
        'bell' => '<svg class="app-icon" viewBox="0 0 24 24"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"/></svg>',
        'image' => '<svg class="app-icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>',
        'chart' => '<svg class="app-icon" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="m19 9-5 5-4-4-3 3"/></svg>',
        'graduation' => '<svg class="app-icon" viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>',
        'swap' => '<svg class="app-icon" viewBox="0 0 24 24"><path d="M17 1l4 4-4 4"/><path d="M3 11V9a4 4 0 0 1 4-4h14"/><path d="M7 23l-4-4 4-4"/><path d="M21 13v2a4 4 0 0 1-4 4H3"/></svg>',
        'logout' => '<svg class="app-icon" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" x2="9" y1="12" y2="12"/></svg>',
    ];

    $sidebarGroups = match ($sidebarRole) {
        'admin' => [
            [
                'label' => 'MENU UTAMA ADMIN',
                'items' => [
                    ['label' => 'Dashboard', 'url' => route('admin.dashboard'), 'icon' => $sidebarIcons['dashboard'], 'active' => ['admin.dashboard']],
                    ['label' => 'Ekstrakurikuler', 'url' => route('admin.ekstrakurikuler'), 'icon' => $sidebarIcons['book'], 'active' => ['admin.ekstrakurikuler*']],
                    ['label' => 'Pengguna', 'url' => route('admin.pengguna'), 'icon' => $sidebarIcons['users'], 'active' => ['admin.pengguna*']],
                    ['label' => 'Jadwal', 'url' => route('admin.jadwal'), 'icon' => $sidebarIcons['calendar'], 'active' => ['admin.jadwal*']],
                    ['label' => 'Pendaftaran', 'url' => route('admin.pendaftaran'), 'icon' => $sidebarIcons['clipboard'], 'active' => ['admin.pendaftaran*']],
                    ['label' => 'Anggota', 'url' => route('admin.anggota'), 'icon' => $sidebarIcons['member'], 'active' => ['admin.anggota*']],
                    ['label' => 'Absensi', 'url' => route('admin.absensi'), 'icon' => $sidebarIcons['file'], 'active' => ['admin.absensi*']],
                    ['label' => 'Prestasi', 'url' => route('admin.prestasi'), 'icon' => $sidebarIcons['trophy'], 'active' => ['admin.prestasi*']],
                    ['label' => 'Pengumuman', 'url' => route('admin.pengumuman'), 'icon' => $sidebarIcons['bell'], 'active' => ['admin.pengumuman*']],
                    ['label' => 'Galeri', 'url' => route('admin.galeri'), 'icon' => $sidebarIcons['image'], 'active' => ['admin.galeri*']],
                    ['label' => 'Laporan', 'url' => route('admin.laporan'), 'icon' => $sidebarIcons['chart'], 'active' => ['admin.laporan*']],
                    ['label' => 'Kenaikan Kelas', 'url' => route('admin.kenaikan-kelas'), 'icon' => $sidebarIcons['graduation'], 'active' => ['admin.kenaikan-kelas*']],
                ],
            ],
        ],
        'pembina' => [
            [
                'label' => 'MENU PEMBINA',
                'items' => [
                    ['label' => 'Dashboard', 'url' => route('pembina.dashboard'), 'icon' => $sidebarIcons['dashboard'], 'active' => ['pembina.dashboard']],
                    ['label' => 'Ekstrakurikuler', 'url' => route('pembina.ekstrakurikuler'), 'icon' => $sidebarIcons['book'], 'active' => ['pembina.ekstrakurikuler*']],
                    ['label' => 'Jadwal', 'url' => route('pembina.jadwal'), 'icon' => $sidebarIcons['calendar'], 'active' => ['pembina.jadwal*']],
                    ['label' => 'Anggota', 'url' => route('pembina.anggota'), 'icon' => $sidebarIcons['member'], 'active' => ['pembina.anggota*']],
                    ['label' => 'Absensi', 'url' => route('pembina.absensi'), 'icon' => $sidebarIcons['file'], 'active' => ['pembina.absensi*']],
                    ['label' => 'Pendaftaran', 'url' => route('pembina.pendaftaran'), 'icon' => $sidebarIcons['clipboard'], 'active' => ['pembina.pendaftaran*']],
                    ['label' => 'Pindah Ekskul', 'url' => route('pembina.pindah_ekskul'), 'icon' => $sidebarIcons['swap'], 'active' => ['pembina.pindah_ekskul*']],
                    ['label' => 'Prestasi', 'url' => route('pembina.prestasi'), 'icon' => $sidebarIcons['trophy'], 'active' => ['pembina.prestasi*']],
                    ['label' => 'Galeri', 'url' => route('pembina.galeri'), 'icon' => $sidebarIcons['image'], 'active' => ['pembina.galeri*']],
                    ['label' => 'Pengumuman', 'url' => route('pembina.pengumuman'), 'icon' => $sidebarIcons['bell'], 'active' => ['pembina.pengumuman*']],
                ],
            ],
        ],
        default => [
            [
                'label' => 'UTAMA',
                'items' => [
                    ['label' => 'Dashboard', 'url' => route('dashboard'), 'icon' => $sidebarIcons['dashboard'], 'active' => ['dashboard']],
                    ['label' => 'Daftar Ekskul', 'url' => route('ekskul.index'), 'icon' => $sidebarIcons['users'], 'active' => ['ekskul.index', 'ekskul.show']],
                ],
            ],
            [
                'label' => 'KEGIATAN & JADWAL',
                'items' => [
                    ['label' => 'Jadwal Kegiatan', 'url' => route('jadwal.index'), 'icon' => $sidebarIcons['calendar'], 'active' => ['jadwal.index']],
                    ['label' => 'Pendaftaran', 'url' => route('pendaftaran.index'), 'icon' => $sidebarIcons['file'], 'active' => ['pendaftaran.*']],
                    ['label' => 'Pindah Ekskul', 'url' => route('pindah_ekskul.index'), 'icon' => $sidebarIcons['swap'], 'active' => ['pindah_ekskul.*']],
                    ['label' => 'Kehadiran', 'url' => route('kehadiran.index'), 'icon' => $sidebarIcons['check'], 'active' => ['kehadiran.*']],
                ],
            ],
            [
                'label' => 'INFORMASI & EVALUASI',
                'items' => [
                    ['label' => 'Prestasi', 'url' => route('prestasi.index'), 'icon' => $sidebarIcons['trophy'], 'active' => ['prestasi.index']],
                    ['label' => 'Galeri Aktivitas', 'url' => route('galeri.index'), 'icon' => $sidebarIcons['image'], 'active' => ['galeri.index']],
                    ['label' => 'Notifikasi', 'url' => route('notifikasi.index'), 'icon' => $sidebarIcons['bell'], 'active' => ['notifikasi.*']],
                ],
            ],
        ],
    };
@endphp

@auth
    <header class="app-topbar {{ $sidebarTheme ? 'app-topbar--'.$sidebarTheme : '' }}">
        <button type="button" class="app-topbar-toggle" id="appSidebarOpen" aria-label="Buka menu" aria-controls="appSidebar" aria-expanded="false">
            <svg class="app-icon" viewBox="0 0 24 24"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>

        <a href="{{ $sidebarHome }}" class="app-topbar-brand">{{ $sidebarBrand }}</a>

        <span class="app-topbar-spacer" aria-hidden="true"></span>
    </header>

    <div class="app-sidebar-overlay" id="appSidebarOverlay"></div>

    <aside class="app-sidebar {{ $sidebarTheme ? 'app-sidebar--'.$sidebarTheme : '' }}" id="appSidebar" aria-label="Navigasi utama">
        <div class="app-brand-container">
            <a href="{{ $sidebarHome }}" class="app-brand-info">
                <span class="app-brand-logo">E</span>
                <span class="app-brand-text">
                    <span class="app-brand-title">EKSPLORE</span>
                    <span class="app-brand-subtitle">{{ $sidebarSubtitle }}</span>
                </span>
            </a>

            <button type="button" class="app-sidebar-toggle" id="appSidebarToggle" aria-label="Perkecil sidebar" aria-controls="appSidebar">
                <svg class="app-icon" viewBox="0 0 24 24"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M9 3v18"/><path d="m14 15-3-3 3-3"/></svg>
            </button>
        </div>

        <nav class="app-sidebar-nav">
            @foreach ($sidebarGroups as $group)
                <div class="app-sidebar-group">
                    @if (!empty($group['label']))
                        <div class="app-sidebar-label">{{ $group['label'] }}</div>
                    @endif

                    @foreach ($group['items'] as $item)
                        @php($isActive = request()->routeIs(...$item['active']))

                        <a
                            href="{{ $item['url'] }}"
                            class="app-sidebar-link {{ $isActive ? 'is-active' : '' }}"
                            title="{{ $item['label'] }}"
                            @if ($isActive) aria-current="page" @endif
                        >
                            {!! $item['icon'] !!}
                            <span>{{ $item['label'] }}</span>
                        </a>
                    @endforeach
                </div>
            @endforeach
        </nav>

        <div class="app-sidebar-footer">
            <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin keluar?');">
                @csrf
                <button type="submit" class="app-sidebar-link app-sidebar-logout" title="Logout">
                    {!! $sidebarIcons['logout'] !!}
                    <span>Logout</span>
                </button>
            </form>

            <div class="app-sidebar-status">
                <span>Online</span>
                <span class="app-online-dot"></span>
            </div>
        </div>
    </aside>
@endauth

<div class="app-content {{ auth()->check() ? '' : 'app-content--guest' }} {{ $sidebarTheme ? 'app-content--'.$sidebarTheme : '' }}" id="appContent">
