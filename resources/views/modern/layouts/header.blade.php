
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

        {{-- NOTIFICATION --}}
        <button
            class="w-11 h-11 rounded-xl bg-zinc-100 hover:bg-zinc-200 transition flex items-center justify-center relative">

            <i class="fas fa-bell text-sm"></i>

            <span
                class="absolute top-2 right-2 w-2 h-2 rounded-full bg-red-500">
            </span>

        </button>

        {{-- PROFILE --}}
        <div
            class="flex items-center gap-3 bg-zinc-100 rounded-xl px-3 py-2">

            <div
                class="w-10 h-10 rounded-full bg-zinc-900 text-white flex items-center justify-center font-bold">

                A

            </div>

            <div>

                <h4 class="font-semibold text-sm">
                    Admin
                </h4>

                <p class="text-xs text-zinc-500">
                    Administrator
                </p>

            </div>

        </div>

    </div>

</header>

