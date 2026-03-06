<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark">

    <!-- Logo -->
    <div class="sidenav-header">
        <a class="navbar-brand m-0 d-flex align-items-center">
            <img 
                src="{{ asset('asset/siswa/img/logo-ct.png') }}" 
                class="navbar-brand-img h-100 me-2"
                style="width:35px;"
            >
            <span class="ms-1 font-weight-bold text-white">
                Sistem Kursus
            </span>
        </a>
    </div>

    <hr class="horizontal dark">

    <!-- Menu -->
    <ul class="navbar-nav">

        <!-- Dashboard -->
        <li class="nav-item">
            <a 
                class="nav-link {{ Request::is('siswa/dashboard') ? 'active' : '' }}"
                href="{{ route('siswa.dashboard') }}"
            >
                <i class="fas fa-home me-2"></i>
                <span class="nav-link-text">Dashboard</span>
            </a>
        </li>

        <!-- Jadwal -->
        <li class="nav-item">
            <a 
                class="nav-link {{ Request::is('siswa/jadwal') ? 'active' : '' }}"
                href="{{ route('siswa.jadwal') }}"
            >
                <i class="fas fa-calendar me-2"></i>
                <span class="nav-link-text">Jadwal</span>
            </a>
        </li>

        <!-- Reservasi -->
        <li class="nav-item">
            <a 
                class="nav-link {{ Request::is('siswa/reservasi*') ? 'active' : '' }}"
                href="{{ route('siswa.reservasi.index') }}"
            >
                <i class="fas fa-book me-2"></i>
                <span class="nav-link-text">Reservasi</span>
            </a>
        </li>

        <li class="nav-item mt-3">

    <form method="POST" action="{{ route('siswa.logout') }}">
        @csrf

        <button class="nav-link border-0 bg-transparent w-100 text-start">

            <i class="fas fa-sign-out-alt me-2"></i>
            <span class="nav-link-text">Logout</span>

        </button>

    </form>

</li>
    </ul>
    

</aside>

