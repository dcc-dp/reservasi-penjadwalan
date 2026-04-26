@php
    $aktivitasOpen = request()->routeIs('siswa.reservasi.*')
        || request()->routeIs('siswa.jadwal')
        || request()->routeIs('siswa.kursus-saya.*');
@endphp

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 my-3 fixed-start ms-3">
    <div class="sidenav-header">
        <a class="navbar-brand m-0 d-flex align-items-center px-3">
            <img src="{{ asset('asset/siswa/img/logo-ct.png') }}" class="me-2" style="width:35px;" alt="Logo">
            <span>Sistem Kursus</span>
        </a>
    </div>

    <hr class="horizontal light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('siswa.dashboard') ? 'active' : '' }}" href="{{ route('siswa.dashboard') }}">
                <i class="fas fa-home me-2"></i>
                <span class="nav-link-text">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('siswa.kursus.*') ? 'active' : '' }}" href="{{ route('siswa.kursus.index') }}">
                <i class="fas fa-graduation-cap me-2"></i>
                <span class="nav-link-text">Kursus</span>
            </a>
        </li>

        <li class="nav-item mt-2">
            <div class="sidebar-section-title">Aktivitas</div>
        </li>

        <li class="nav-item">
            <a class="menu-trigger {{ $aktivitasOpen ? 'active' : '' }}"
               data-bs-toggle="collapse"
               href="#aktivitasKursus"
               role="button"
               aria-expanded="{{ $aktivitasOpen ? 'true' : 'false' }}"
               aria-controls="aktivitasKursus">
                <div class="left-part">
                    <i class="fas fa-layer-group"></i>
                    <span>Aktivitas Kursus</span>
                </div>
                <i class="fas fa-chevron-down arrow {{ $aktivitasOpen ? 'open' : '' }}"></i>
            </a>

            <div class="collapse submenu-wrap {{ $aktivitasOpen ? 'show' : '' }}" id="aktivitasKursus">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('siswa.reservasi.*') ? 'active' : '' }}"
                           href="{{ route('siswa.reservasi.index') }}">
                            <span class="nav-link-text">Reservasi</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('siswa.jadwal') ? 'active' : '' }}"
                           href="{{ route('siswa.jadwal') }}">
                            <span class="nav-link-text">Jadwal Saya</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('siswa.kursus-saya.*') ? 'active' : '' }}"
                           href="{{ route('siswa.kursus-saya.index') }}">
                            <span class="nav-link-text">Kursus Saya</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item mt-2">
            <div class="sidebar-section-title">Lainnya</div>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('siswa.pembayaran') ? 'active' : '' }}"
               href="{{ route('siswa.pembayaran') }}">
                <i class="fas fa-credit-card me-2"></i>
                <span class="nav-link-text">Pembayaran</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('siswa.ulasan.index') ? 'active' : '' }}"
               href="{{ route('siswa.ulasan.index') }}">
                <i class="fas fa-star me-2"></i>
                <span class="nav-link-text">Ulasan</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('siswa.profil') ? 'active' : '' }}"
               href="{{ route('siswa.profil') }}">
                <i class="fas fa-user me-2"></i>
                <span class="nav-link-text">Profil</span>
            </a>
        </li>

        <li class="nav-item mt-3">
            <form method="POST" action="{{ route('siswa.logout') }}">
                @csrf
                <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    <span class="nav-link-text">Logout</span>
                </button>
            </form>
        </li>
    </ul>
</aside>