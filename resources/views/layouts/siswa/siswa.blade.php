<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('asset/siswa/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/siswa/img/favicon.png') }}">

    <link href="{{ asset('asset/siswa/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/siswa/css/nucleo-svg.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/siswa/css/soft-ui-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/siswa/css/custom-ui.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
</head>

<body class="g-sidenav-show bg-gray-100">

    @include('layouts.siswa.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        @include('layouts.siswa.navbar')
        @if(session('success'))
            <div class="toast-notif toast-success" id="notif">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="toast-notif toast-error" id="notif">
                <i class="fas fa-times-circle me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        <div class="container-fluid py-4">
            @yield('content')
        </div>

        @include('layouts.siswa.footer')
    </main>

    <script src="{{ asset('asset/siswa/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('asset/siswa/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/siswa/js/soft-ui-dashboard.min.js') }}"></script>
    <script src="{{ asset('asset/siswa/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        setTimeout(() => {
            let notif = document.getElementById('notif');
            if(notif){
                notif.style.transition = "0.5s";
                notif.style.opacity = "0";
                notif.style.transform = "translateX(120%)";

                setTimeout(() => notif.remove(), 500);
            }
        }, 3000);
    </script>
</body>
</html>