@php

    $profileRoute = match(auth()->user()->role ?? '') {
        // 'admin' => route('admin.profile'),
        'instruktur' => route('instruktur.profil'),
        default => '#'
    };

@endphp

<header
    class="h-16 bg-white border-b border-zinc-200 flex items-center justify-between px-6">

    {{-- LEFT --}}
    <div>

        <h1 class="text-xl font-bold text-zinc-900">
            @yield('page-title')
        </h1>

    </div>

    {{-- RIGHT --}}
    <div class="flex items-center gap-3">

        <a
            href="{{ $profileRoute }}"
            class="flex items-center gap-3 bg-zinc-100 hover:bg-zinc-200 rounded-2xl px-3 py-2 transition">

            {{-- PHOTO --}}
            <div
                class="w-10 h-10 rounded-xl overflow-hidden bg-zinc-100 flex items-center justify-center flex-shrink-0">

                @if(auth()->user()->photo)

                    <img
                        src="{{ asset('storage/' . auth()->user()->photo) }}"
                        alt="Foto Profil"
                        class="w-full h-full object-cover">

                @else

                    <span
                        class="w-full h-full flex items-center justify-center bg-zinc-900 text-white font-semibold">

                        {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}

                    </span>

                @endif

            </div>

            {{-- USER INFO --}}
            <div>

                <h4
                    class="font-semibold text-sm text-zinc-900">

                    {{ auth()->user()->name }}

                </h4>

                <p
                    class="text-xs text-zinc-500">

                    {{ ucfirst(auth()->user()->role) }}

                </p>

            </div>

            {{-- ICON --}}
            <i
                class="fas fa-chevron-right text-zinc-400 text-xs">
            </i>

        </a>

    </div>

</header>