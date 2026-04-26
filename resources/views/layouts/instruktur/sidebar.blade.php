<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 my-3 fixed-start ms-3 instruktur-sidebar"
    id="sidenav-main">

    <div class="sidenav-header px-3 pt-3">
        <a class="navbar-brand m-0 d-flex align-items-center" href="{{ route('instruktur.dashboard') }}">
            <div class="instruktur-brand-icon me-3">
                <i class="ni ni-hat-3 text-sm opacity-10"></i>
            </div>

            <div>
                <div class="instruktur-brand-title">Instruktur</div>
                <div class="instruktur-brand-subtitle">Panel Pengajar</div>
            </div>
        </a>
    </div>

    <hr class="horizontal dark mt-3 mb-2">

    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <div class="section-label">Menu Utama</div>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ request()->routeIs('instruktur.dashboard') ? 'active' : '' }}"
                    href="{{ route('instruktur.dashboard') }}">
                    <div class="nav-icon">
                        <i class="ni ni-tv-2 text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ request()->routeIs('instruktur.kursus.*') ? 'active' : '' }}"
                    href="{{ route('instruktur.kursus.index') }}">
                    <div class="nav-icon">
                        <i class="ni ni-books text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text">Kursus Saya</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ request()->routeIs('instruktur.jadwal.*') ? 'active' : '' }}"
                    href="{{ route('instruktur.jadwal.index') }}">
                    <div class="nav-icon">
                        <i class="ni ni-calendar-grid-58 text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text">Jadwal Mengajar</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center {{ request()->routeIs('instruktur.ulasan.*') ? 'active' : '' }}"
                    href="{{ route('instruktur.ulasan.index') }}">
                    <div class="nav-icon">
                        <i class="ni ni-like-2 text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text">Ulasan</span>
                </a>
            </li>

            <div class="section-label">Akun</div>

            <li class="nav-item">
                <a class="nav-link d-flex align-items-center" href="profil">
                    <div class="nav-icon">
                        <i class="ni ni-single-02 text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text">Profil</span>
                </a>
            </li>

            <li class="nav-item">
                <form action="{{ route('instruktur.logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="nav-link d-flex align-items-center text-danger border-0 bg-transparent w-100">
                        <div class="nav-icon">
                            <i class="ni ni-button-power text-sm opacity-10"></i>
                        </div>
                        <span class="text-warning">Logout</span>
                    </button>
                </form>
            </li>

        </ul>
    </div>
</aside>
