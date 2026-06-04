<aside
    class="fixed left-0 top-0 z-40 h-screen w-64 bg-white border-r border-zinc-200 text-zinc-800">

    {{-- LOGO --}}
    <div
        class="h-16 flex items-center gap-3 px-5 border-b border-zinc-200">

        <div
            class="w-10 h-10 rounded-xl bg-zinc-100 flex items-center justify-center">

            <i class="fas fa-layer-group text-zinc-800 text-lg"></i>

        </div>

        <div>

            <h1 class="text-base font-bold text-zinc-900">
                Reservasi
            </h1>

            <p class="text-xs text-zinc-500">
                Modern Dashboard
            </p>

        </div>

    </div>

    {{-- MENU --}}
    <div class="p-3 overflow-y-auto h-[calc(100vh-64px)]">

        {{-- ================= ADMIN ================= --}}
        @if(Auth::user()->role == 'admin')

            <p
                class="px-3 mb-3 text-xs uppercase tracking-wider text-zinc-400 font-semibold">

                Main Menu

            </p>

            <nav class="space-y-1">

                {{-- DASHBOARD --}}
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 h-11 px-4 rounded-xl transition-all duration-200
                    {{ Request::routeIs('admin.dashboard') ? 'bg-zinc-100 text-black' : 'hover:bg-zinc-100 text-zinc-700' }}">

                    <i class="fas fa-house text-sm"></i>

                    <span class="font-medium text-sm">
                        Dashboard
                    </span>

                </a>

                {{-- KURSUS --}}
                <a href="{{ route('kursus.index') }}"
                    class="flex items-center gap-3 h-11 px-4 rounded-xl transition-all duration-200
                    {{ Request::is('admin/kursus*') ? 'bg-zinc-100 text-black' : 'hover:bg-zinc-100 text-zinc-700' }}">

                    <i class="fas fa-graduation-cap text-sm"></i>

                    <span class="font-medium text-sm">
                        Kursus
                    </span>

                </a>

                {{-- PAKET --}}
                <a href="{{ route('paket.index') }}"
                    class="flex items-center gap-3 h-11 px-4 rounded-xl transition-all duration-200
                    {{ Request::is('admin/paket*') ? 'bg-zinc-100 text-black' : 'hover:bg-zinc-100 text-zinc-700' }}">

                    <i class="fas fa-box text-sm"></i>

                    <span class="font-medium text-sm">
                        Paket
                    </span>

                </a>

                {{-- MATERI --}}
                <a href="{{ route('materi.index') }}"
                    class="flex items-center gap-3 h-11 px-4 rounded-xl transition-all duration-200
                    {{ Request::is('admin/materi*') ? 'bg-zinc-100 text-black' : 'hover:bg-zinc-100 text-zinc-700' }}">

                    <i class="fas fa-book text-sm"></i>

                    <span class="font-medium text-sm">
                        Materi
                    </span>

                </a>

                {{-- JADWAL --}}
                <a href="{{ route('admin.jadwal') }}"
                    class="flex items-center gap-3 h-11 px-4 rounded-xl transition-all duration-200
                    {{ Request::is('admin/jadwal*') ? 'bg-zinc-100 text-black' : 'hover:bg-zinc-100 text-zinc-700' }}">

                    <i class="fas fa-calendar text-sm"></i>

                    <span class="font-medium text-sm">
                        Jadwal
                    </span>

                </a>

            </nav>

            {{-- MANAGEMENT --}}
            <p
                class="px-3 mt-8 mb-3 text-xs uppercase tracking-wider text-zinc-400 font-semibold">

                Management

            </p>

            <nav class="space-y-1">

                {{-- RESERVASI --}}
                <a href="{{ route('reservasi.index') }}"
                    class="flex items-center gap-3 h-11 px-4 rounded-xl transition-all duration-200
                    {{ Request::is('admin/reservasi*') ? 'bg-zinc-100 text-black' : 'hover:bg-zinc-100 text-zinc-700' }}">

                    <i class="fas fa-calendar-check text-sm"></i>

                    <span class="font-medium text-sm">
                        Reservasi
                    </span>

                </a>

                {{-- PEMBAYARAN --}}
                <a href="{{ route('admin.pembayaran.index') }}"
                    class="flex items-center gap-3 h-11 px-4 rounded-xl transition-all duration-200
                    {{ Request::is('admin/pembayaran*') ? 'bg-zinc-100 text-black' : 'hover:bg-zinc-100 text-zinc-700' }}">

                    <i class="fas fa-credit-card text-sm"></i>

                    <span class="font-medium text-sm">
                        Pembayaran
                    </span>

                </a>

                {{-- ULASAN --}}
                <a href="{{ route('admin.ulasan.index') }}"
                    class="flex items-center gap-3 h-11 px-4 rounded-xl transition-all duration-200
                    {{ Request::is('admin/ulasan*') ? 'bg-zinc-100 text-black' : 'hover:bg-zinc-100 text-zinc-700' }}">

                    <i class="fas fa-star text-sm"></i>

                    <span class="font-medium text-sm">
                        Ulasan
                    </span>

                </a>

                {{-- INSTRUKTUR --}}
                <a href="{{ route('instruktur.index') }}"
                    class="flex items-center gap-3 h-11 px-4 rounded-xl transition-all duration-200
                    {{ Request::is('admin/instruktur*') ? 'bg-zinc-100 text-black' : 'hover:bg-zinc-100 text-zinc-700' }}">

                    <i class="fas fa-chalkboard-user text-sm"></i>

                    <span class="font-medium text-sm">
                        Instruktur
                    </span>

                </a>

            </nav>

        @endif

        {{-- ================= INSTRUKTUR ================= --}}
        @if(Auth::user()->role == 'instruktur')

            <p
                class="px-3 mb-3 text-xs uppercase tracking-wider text-zinc-400 font-semibold">

                Instruktur Menu

            </p>

            <nav class="space-y-1">

                {{-- DASHBOARD --}}
                <a href="{{ route('instruktur.dashboard') }}"
                    class="flex items-center gap-3 h-11 px-4 rounded-xl transition-all duration-200
                    {{ Request::routeIs('instruktur.dashboard') ? 'bg-zinc-100 text-black' : 'hover:bg-zinc-100 text-zinc-700' }}">

                    <i class="fas fa-house text-sm"></i>

                    <span class="font-medium text-sm">
                        Dashboard
                    </span>

                </a>

                {{-- KURSUS --}}
                <a href="{{ route('instruktur.kursus.index') }}"
                    class="flex items-center gap-3 h-11 px-4 rounded-xl transition-all duration-200
                    {{ Request::is('instruktur/kursus*') ? 'bg-zinc-100 text-black' : 'hover:bg-zinc-100 text-zinc-700' }}">

                    <i class="fas fa-graduation-cap text-sm"></i>

                    <span class="font-medium text-sm">
                        Kursus Saya
                    </span>

                </a>

                {{-- JADWAL --}}
                <a href="{{ route('instruktur.jadwal.index') }}"
                    class="flex items-center gap-3 h-11 px-4 rounded-xl transition-all duration-200
                    {{ Request::is('instruktur/jadwal*') ? 'bg-zinc-100 text-black' : 'hover:bg-zinc-100 text-zinc-700' }}">

                    <i class="fas fa-calendar text-sm"></i>

                    <span class="font-medium text-sm">
                        Jadwal
                    </span>

                </a>

                {{-- ULASAN --}}
                <a href="{{ route('instruktur.ulasan.index') }}"
                    class="flex items-center gap-3 h-11 px-4 rounded-xl transition-all duration-200
                    {{ Request::is('instruktur/ulasan*') ? 'bg-zinc-100 text-black' : 'hover:bg-zinc-100 text-zinc-700' }}">

                    <i class="fas fa-star text-sm"></i>

                    <span class="font-medium text-sm">
                        Ulasan
                    </span>

                </a>

                {{-- PROFIL --}}
                <a href="{{ route('instruktur.profil') }}"
                    class="flex items-center gap-3 h-11 px-4 rounded-xl transition-all duration-200
                    {{ Request::is('instruktur/profil*') ? 'bg-zinc-100 text-black' : 'hover:bg-zinc-100 text-zinc-700' }}">

                    <i class="fas fa-user text-sm"></i>

                    <span class="font-medium text-sm">
                        Profil
                    </span>

                </a>

            </nav>

        @endif

        {{-- LOGOUT --}}
        <div class="mt-8">

            <form method="POST" action="{{ route('logout') }}">

                @csrf

                <button type="submit"
                    class="w-full flex items-center gap-3 h-11 px-4 rounded-xl bg-red-500 hover:bg-red-600 transition-all duration-200 text-white">

                    <i class="fas fa-right-from-bracket text-sm"></i>

                    <span class="font-medium text-sm">
                        Logout
                    </span>

                </button>

            </form>

        </div>

    </div>

</aside>