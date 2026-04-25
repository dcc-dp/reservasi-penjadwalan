<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Instruktur')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- CSS Soft UI --}}
    <link href="{{ asset('assets/css/soft-ui-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">

    {{-- CSS Instruktur --}}
    <link href="{{ asset('assets/css/instruktur.css') }}" rel="stylesheet">

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    @stack('styles')
</head>

<body class="g-sidenav-show bg-gray-100">

    @include('layouts.instruktur.sidebar')

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="toast-notif toast-success" id="notif">
            <div class="toast-icon">
                <i class="ni ni-check-bold"></i>
            </div>
            <div>
                <div class="toast-title">Berhasil</div>
                <div class="toast-message">{{ session('success') }}</div>
            </div>
        </div>
    @endif

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @include('layouts.instruktur.navbar')

        @yield('content')
    </main>

    {{-- JS Soft UI --}}
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/soft-ui-dashboard.min.js') }}"></script>

    {{-- SCRIPT NOTIFIKASI --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const notif = document.getElementById('notif');

            if (notif) {
                setTimeout(() => {
                    notif.classList.add('toast-show');
                }, 100);

                setTimeout(() => {
                    notif.classList.remove('toast-show');
                    notif.classList.add('toast-hide');

                    setTimeout(() => {
                        notif.remove();
                    }, 600);
                }, 3000);
            }
        });
    </script>

    @stack('scripts')
</body>
</html>