@extends('modern.layouts.app')

@section('content')

<div class="p-6">

    {{-- HERO --}}
    <div
        class="relative overflow-hidden rounded-3xl bg-zinc-900 p-8 mb-8 text-white">

        <div class="relative z-10">

            <span
                class="inline-flex items-center px-4 py-2 rounded-full bg-white/10 text-sm font-medium mb-4">

                Panel Instruktur

            </span>

            <h1 class="text-3xl font-bold mb-2">

                Selamat Datang,
                {{ auth()->user()->name ?? 'Instruktur' }}

            </h1>

            <p class="text-zinc-300 max-w-2xl">

                Kelola kursus yang kamu ajar, pantau jadwal mengajar,
                dan lihat feedback dari siswa secara realtime.

            </p>

        </div>

        {{-- DECORATION --}}
        <div
            class="absolute -right-10 -top-10 w-40 h-40 bg-white/5 rounded-full">
        </div>

        <div
            class="absolute right-20 bottom-0 w-24 h-24 bg-white/5 rounded-full">
        </div>

    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">

        {{-- TOTAL KURSUS --}}
        <div
            class="bg-white rounded-2xl border border-zinc-200 shadow-sm p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm font-medium text-zinc-500 mb-1">
                        Total Kursus
                    </p>

                    <h2 class="text-3xl font-bold text-zinc-900">
                        {{ $totalKursus ?? 0 }}
                    </h2>

                </div>

                <div
                    class="w-14 h-14 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-700 text-xl">

                    <i class="fas fa-book-open"></i>

                </div>

            </div>

        </div>

        {{-- TOTAL SISWA --}}
        <div
            class="bg-white rounded-2xl border border-zinc-200 shadow-sm p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm font-medium text-zinc-500 mb-1">
                        Total Siswa
                    </p>

                    <h2 class="text-3xl font-bold text-zinc-900">
                        {{ $totalSiswa ?? 0 }}
                    </h2>

                </div>

                <div
                    class="w-14 h-14 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-700 text-xl">

                    <i class="fas fa-users"></i>

                </div>

            </div>

        </div>

        {{-- TOTAL ULASAN --}}
        <div
            class="bg-white rounded-2xl border border-zinc-200 shadow-sm p-6">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm font-medium text-zinc-500 mb-1">
                        Total Ulasan
                    </p>

                    <h2 class="text-3xl font-bold text-zinc-900">
                        {{ $totalUlasan ?? 0 }}
                    </h2>

                </div>

                <div
                    class="w-14 h-14 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-700 text-xl">

                    <i class="fas fa-star"></i>

                </div>

            </div>

        </div>

    </div>

    {{-- CONTENT --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- AKSES CEPAT --}}
        <div class="xl:col-span-2">

            <div
                class="bg-white rounded-2xl border border-zinc-200 shadow-sm p-6">

                <div class="mb-6">

                    <h2 class="text-lg font-bold text-zinc-900">
                        Akses Cepat
                    </h2>

                    <p class="text-sm text-zinc-500 mt-1">
                        Menu utama untuk aktivitas instruktur.
                    </p>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    {{-- KURSUS --}}
                    <a href="{{ route('instruktur.kursus.index') }}"
                        class="group rounded-2xl border border-zinc-200 hover:border-zinc-900 p-5 transition">

                        <div
                            class="w-12 h-12 rounded-xl bg-zinc-100 group-hover:bg-zinc-900 group-hover:text-white flex items-center justify-center text-zinc-700 text-lg transition mb-4">

                            <i class="fas fa-book-open"></i>

                        </div>

                        <h3 class="font-semibold text-zinc-900 mb-1">
                            Kursus Saya
                        </h3>

                        <p class="text-sm text-zinc-500">
                            Lihat kursus yang kamu ajar.
                        </p>

                    </a>

                    {{-- JADWAL --}}
                    <a href="{{ route('instruktur.jadwal.index') }}"
                        class="group rounded-2xl border border-zinc-200 hover:border-zinc-900 p-5 transition">

                        <div
                            class="w-12 h-12 rounded-xl bg-zinc-100 group-hover:bg-zinc-900 group-hover:text-white flex items-center justify-center text-zinc-700 text-lg transition mb-4">

                            <i class="fas fa-calendar-days"></i>

                        </div>

                        <h3 class="font-semibold text-zinc-900 mb-1">
                            Jadwal
                        </h3>

                        <p class="text-sm text-zinc-500">
                            Pantau jadwal mengajar.
                        </p>

                    </a>

                    {{-- ULASAN --}}
                    <a href="{{ route('instruktur.ulasan.index') }}"
                        class="group rounded-2xl border border-zinc-200 hover:border-zinc-900 p-5 transition">

                        <div
                            class="w-12 h-12 rounded-xl bg-zinc-100 group-hover:bg-zinc-900 group-hover:text-white flex items-center justify-center text-zinc-700 text-lg transition mb-4">

                            <i class="fas fa-star"></i>

                        </div>

                        <h3 class="font-semibold text-zinc-900 mb-1">
                            Ulasan
                        </h3>

                        <p class="text-sm text-zinc-500">
                            Lihat feedback dari siswa.
                        </p>

                    </a>

                </div>

            </div>

        </div>

        {{-- INFO --}}
        <div>

            <div
                class="bg-white rounded-2xl border border-zinc-200 shadow-sm p-6 h-full">

                <div
                    class="w-14 h-14 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-700 text-2xl mb-5">

                    <i class="fas fa-lightbulb"></i>

                </div>

                <h3 class="text-lg font-bold text-zinc-900 mb-2">
                    Tips Mengajar
                </h3>

                <p class="text-sm text-zinc-500 leading-relaxed">

                    Periksa jadwal secara berkala dan gunakan ulasan siswa
                    sebagai bahan evaluasi untuk meningkatkan kualitas
                    pembelajaran.

                </p>

            </div>

        </div>

    </div>

</div>

@endsection
