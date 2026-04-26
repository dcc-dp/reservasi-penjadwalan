<nav class="navbar navbar-main navbar-expand-lg mx-4 mt-3 border-radius-xl custom-navbar">
    <div class="container-fluid">

        <h4 class="page-title mb-0">
            @yield('title')
        </h4>

        <ul class="navbar-nav ms-auto align-items-center">

            <li class="nav-item dropdown me-3 position-relative">

                <a class="nav-link p-0 text-white"
                data-bs-toggle="dropdown"
                style="cursor:pointer">

                    <i class="fa-solid fa-bell fs-5"></i>

                    {{-- badge --}}
                    <span class="notif-badge">2</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow" style="width:300px">

                    <li class="px-3 py-2 fw-bold">Notifikasi</li>

                    <li>
                        <a class="dropdown-item small">
                            Pembayaran kamu berhasil
                        </a>
                    </li>

                    <li>
                        <a class="dropdown-item small">
                            Jadwal sudah tersedia
                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li class="text-center">
                        <a href="#" class="small text-primary">Lihat semua</a>
                    </li>

                </ul>

            </li>

            <li class="nav-item dropdown">
                <a class="nav-link d-flex align-items-center user-box"
                   data-bs-toggle="dropdown"
                   style="cursor:pointer">

                    @if(auth()->user()->photo)
                        <img src="{{ asset('storage/' . auth()->user()->photo) }}"
                             alt="Foto Profil"
                             class="me-2 navbar-user-image">
                    @else
                        <div class="avatar-circle me-2">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                    @endif

                    <span class="fw-semibold text-white">
                        {{ auth()->user()->name }}
                    </span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow">
                    <li>
                        <a class="dropdown-item" href="{{ route('siswa.profil') }}">
                            <i class="fa-solid fa-user me-2 text-primary"></i>
                            Profil
                        </a>
                    </li>

                    <li><hr class="dropdown-divider"></li>

                    <li>
                        <form method="POST" action="{{ route('siswa.logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fa-solid fa-right-from-bracket me-2"></i>
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>