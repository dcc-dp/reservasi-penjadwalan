<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Bliss || Reservasi_Penjadwalan</title>

    <link rel="stylesheet" href="{{ asset('template/css/bootstrap-5.0.0-beta2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/main.css') }}">
    <style>
        .navbar-nav .nav-link {
            font-weight: 500;
            color: #444;
            padding: 8px 16px;
            transition: 0.3s;
        }

        .navbar-nav .nav-link:hover {
            color: #4A6CF7;
        }

        .navbar-nav .nav-link.active {
            color: #4A6CF7;
            border-bottom: 2px solid #4A6CF7;
        }
    </style>
</head>

<body>

<!-- ===== HEADER START ===== -->
<header class="header">
    <div class="navbar-area">
        <div class="container">

            <nav class="navbar navbar-expand-lg align-items-center">

                <!-- LOGO -->
                <a class="navbar-brand" href="{{ route('pages.home') }}">
                    <img src="{{ asset('template/img/logo/logo.svg') }}" alt="Bliss Logo">
                </a>

                <!-- MOBILE BUTTON -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- MENU -->
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ms-auto align-items-lg-center">

                        <li class="nav-item">
                            <a href="{{ route('pages.home') }}"
                               class="nav-link {{ request()->routeIs('pages.home') ? 'active' : '' }}">
                                Home
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('about') }}"
                               class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                                About
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('benefit') }}"
                               class="nav-link {{ request()->routeIs('benefit') ? 'active' : '' }}">
                                Benefit
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('pakets') }}"
                               class="nav-link {{ request()->routeIs('Program Package') ? 'active' : '' }}">
                                Program Package
                            </a>
                        </li>

                    </ul>
                </div>

            </nav>

        </div>
    </div>
</header>
<!-- ===== HEADER END ===== -->

{{-- ===== CONTENT ===== --}}
@yield('content')


<!-- ===== FOOTER ===== -->
<footer class="footer">
    <div class="container">
        <p class="text-center mb-0">© 2026 Bliss Learning Platform</p>
    </div>
</footer>


<script src="{{ asset('template/js/bootstrap-5.0.0-beta2.min.js') }}"></script>
<script src="{{ asset('template/js/main.js') }}"></script>

</body>
</html>