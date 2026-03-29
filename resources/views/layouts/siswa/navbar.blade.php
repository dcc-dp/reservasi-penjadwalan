<nav class="navbar navbar-main navbar-expand-lg mx-4 mt-3 border-radius-xl">

    <div class="container-fluid">

        <!-- Title -->
        <h3 class="mb-0 fw-bold text-white">
            @yield('title')
        </h3>

        <!-- Right Menu -->
        <ul class="navbar-nav ms-auto align-items-center">

            <!-- Notification -->
            <li class="nav-item me-3">
                <a class="nav-link p-0">
                    <i class="fa-solid fa-bell"></i>
                </a>
            </li>

            <!-- User -->
            <li class="nav-item dropdown">

                <a class="nav-link d-flex align-items-center"
                   data-bs-toggle="dropdown"
                   style="cursor:pointer">

                    <i class="fa-solid fa-user-circle me-2"></i>

                    <span class="fw-semibold">
                        {{ auth()->user()->name }}
                    </span>

                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow">

                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa-solid fa-user me-2"></i>
                            Profile
                        </a>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <form method="POST" action="{{ route('siswa.logout') }}">
                            @csrf
                            <button class="dropdown-item">
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