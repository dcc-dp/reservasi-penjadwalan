<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <title>Bliss || Digital Agency</title>

    <link rel="stylesheet" href="{{ asset('template/css/bootstrap-5.0.0-beta2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/main.css') }}">
</head>

<body>

<!-- HEADER -->
<header class="header">
    <div class="navbar-area">
        <div class="container">
            <nav class="navbar navbar-expand-lg">

                <a class="navbar-brand" href="{{ route('pages.home') }}">
                    <img src="{{ asset('template/img/logo/logo.svg') }}">
                </a>

                <ul class="navbar-nav ms-auto">

                    <li>
                        <a href="{{ route('pages.home') }}"
                        class="nav-link {{ request()->routeIs('pages.home') ? 'active' : '' }}">
                        Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('about') }}"
                        class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                        About
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('benefit') }}"
                        class="nav-link {{ request()->routeIs('benefit') ? 'active' : '' }}">
                        Benefit
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('pakets') }}"
                        class="nav-link {{ request()->routeIs('pakets') ? 'active' : '' }}">
                        Program Package
                        </a>
                    </li>

                </ul>

            </nav>
        </div>
    </div>
</header>


{{-- ISI HALAMAN --}}
@yield('content')


<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <p class="text-center">© 2026 Bliss Learning Platform</p>
    </div>
</footer>


<script src="{{ asset('template/js/bootstrap-5.0.0-beta2.min.js') }}"></script>
<script src="{{ asset('template/js/main.js') }}"></script>

</body>
</html>