
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title')</title>

    <!-- Icon -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('asset/siswa/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/siswa/img/favicon.png') }}">

    <!-- CSS -->
    <link href="{{ asset('asset/siswa/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/siswa/css/nucleo-svg.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/siswa/css/soft-ui-dashboard.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Font sama seperti landing -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
   <style>

        /* ======================
        FONT
        ====================== */
        body{
            font-family: 'Poppins', sans-serif !important;
        }

        /* ======================
        LAYOUT (agar footer selalu di bawah)
        ====================== */
        html, body{
            height:100%;
        }

        .main-content{
            min-height:100vh;
            display:flex;
            flex-direction:column;
        }

        .container-fluid.py-4{
            flex:1;
        }

        /* ======================
        SIDEBAR
        ====================== */
        .sidenav{
            background:#1F6F6D;
        }

        /* ======================
        NAVBAR
        ====================== */
        .navbar-main{
            background:#1F6F6D !important;
            min-height:80px;
            padding-left:25px;
            padding-right:25px;
        }

        /* teks navbar */
        .navbar-main h6,
        .navbar-main span{
            color:white !important;
            font-size:18px;
        }

        /* icon navbar */
        .navbar-main i{
            color:white !important;
            font-size:18px;
        }

        /* ======================
        MENU SIDEBAR
        ====================== */

        /* menu aktif */
        .nav-link.active{
            background:#0B3D3B;
            color:white;
        }

        /* icon menu */
        .icon-shape{
            background:#ffffff !important;
        }

        /* ======================
        DROPDOWN
        ====================== */
        .dropdown-menu{
            border-radius:10px;
            padding:8px;
        }

        .dropdown-item{
            border-radius:6px;
        }

        .dropdown-item:hover{
            background:#f3f4f6;
        }

        /* ======================
        CARD DASHBOARD
        ====================== */
        .card{
            border-radius:12px;
        }

        /* ======================
        FOOTER
        ====================== */
        .footer{
            border-top:1px solid #e9ecef;
            background:#fff;
            padding:15px 0;
        }

        /* link footer */
        .footer-link{
            font-size:14px;
            color:#6c757d;
            text-decoration:none;
            transition:0.3s;
        }

        .footer-link:hover{
            color:#1F6F6D;
        }

        /* ======================
            FONT GLOBAL
        ====================== */

        body{
            font-family: 'Open Sans', sans-serif;
        }

        /* judul dashboard */
        h1,h2,h3,h4,h5,h6{
            font-family: 'Space Grotesk', sans-serif;
        }

        /* navbar */
        .navbar-main h6{
            font-family: 'Space Grotesk', sans-serif;
            font-weight:600;
        }

        /* sidebar */
        .nav-link-text{
            font-family: 'Space Grotesk', sans-serif;
        }

        .stat-icon{
            width:50px;
            height:50px;
            display:flex;
            align-items:center;
            justify-content:center;
            border-radius:12px;
            background:linear-gradient(135deg,#1F6F6D,#2c8f8b);
            color:white;
            font-size:22px;
        }

    </style>
</head>

<body class="g-sidenav-show bg-gray-100">

    <!-- Sidebar -->
    @include('layouts.siswa.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

        <!-- Navbar -->
        @include('layouts.siswa.navbar')

        <!-- Content -->
        <div class="container-fluid py-4">
            @yield('content')
        </div>

        <!-- Footer -->
    @include('layouts.siswa.footer')

    </main>

    <!-- JS -->
    <script src="{{ asset('asset/siswa/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('asset/siswa/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/siswa/js/soft-ui-dashboard.min.js') }}"></script>
    <script src="{{ asset('asset/siswa/js/bootstrap.bundle.min.js') }}"></script>
    

</body>
</html>

