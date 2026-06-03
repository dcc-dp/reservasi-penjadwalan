
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible"
        content="ie=edge">

    <title>
        @yield('title', 'Modern Dashboard')
    </title>

    {{-- TAILWIND --}}
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- GOOGLE FONT --}}
    <link rel="preconnect"
        href="https://fonts.googleapis.com">

    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>

        body {
            font-family: 'Inter', sans-serif;
        }

        ::-webkit-scrollbar {
            width: 5px;
        }

        ::-webkit-scrollbar-thumb {
            background: #71717a;
            border-radius: 999px;
        }

    </style>

    @stack('styles')

</head>

<body class="bg-zinc-100 text-zinc-800 overflow-x-hidden">

    {{-- SIDEBAR --}}
    @include('modern.layouts.sidebar')

    {{-- MAIN CONTENT --}}
    <div class="flex-1 ml-64">

        {{-- HEADER --}}
        @include('modern.layouts.header')

        {{-- CONTENT --}}
        <main class="flex-1 p-6">

            @yield('content')

        </main>

    </div>

    {{-- SWEET ALERT --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('success'))

        <script>

            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#18181b'
            });

        </script>

    @endif

    @if(session('error'))

        <script>

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                confirmButtonColor: '#18181b'
            });

        </script>

    @endif

    @stack('scripts')

</body>

</html>

