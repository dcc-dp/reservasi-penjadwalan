@extends('modern.layouts.app')

@section('content')

<div class="p-6 space-y-8">

    {{-- HERO --}}
    <div
        class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-zinc-900 via-zinc-800 to-zinc-900 p-8 text-white">

        <div class="relative z-10">

            <div
                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-sm mb-5">

                <i class="fas fa-book-open text-sm"></i>

                <span class="text-sm font-medium">
                    Panel Instruktur
                </span>

            </div>

            <h1 class="text-4xl font-bold mb-3">

                Kursus Saya

            </h1>

            <p class="text-zinc-300 max-w-2xl leading-relaxed">

                Kelola kursus yang kamu ajar, pantau perkembangan materi,
                dan lihat detail paket pembelajaran dengan tampilan modern.

            </p>

        </div>

        {{-- ORNAMENT --}}
        <div
            class="absolute -top-16 -right-16 w-64 h-64 rounded-full bg-white/5">
        </div>

        <div
            class="absolute bottom-0 right-20 w-32 h-32 rounded-full bg-white/5">
        </div>

    </div>

    {{-- COURSE GRID --}}
    @if($kursus->count() > 0)

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-7">

            @foreach($kursus as $item)
                <div
                    class="group bg-white rounded-3xl border border-zinc-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">

                    {{-- TOP BANNER --}}
                    <div
                        class="relative h-40 bg-gradient-to-br from-zinc-900 via-zinc-800 to-zinc-700 p-6 text-white overflow-hidden">

                        {{-- DECORATION --}}
                        <div
                            class="absolute -right-10 -top-10 w-40 h-40 rounded-full bg-white/5">
                        </div>

                        <div
                            class="absolute bottom-0 right-0 w-24 h-24 rounded-full bg-white/5">
                        </div>

                        <div class="relative z-10 h-full flex flex-col justify-between">

                            <div
                                class="w-14 h-14 rounded-2xl bg-white/10 backdrop-blur-sm flex items-center justify-center text-2xl">

                                <i class="fas fa-graduation-cap"></i>

                            </div>

                            <div>

                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full bg-white/10 text-xs font-medium mb-3">

                                    Kursus Aktif

                                </span>

                                <h2 class="text-2xl font-bold line-clamp-1">

                                    {{ $item->name }}

                                </h2>

                            </div>

                        </div>

                    </div>

                    {{-- CONTENT --}}
                    <div class="p-6">

                        {{-- DESC --}}
                        <p
                            class="text-sm text-zinc-500 leading-relaxed mb-6 line-clamp-3">

                            {{ $item->deskripsi ?? 'Belum ada deskripsi kursus.' }}

                        </p>

                        {{-- STATS --}}
                        <div
                            class="grid grid-cols-2 gap-3 mb-6">

                            {{-- PAKET --}}
                            <div
                                class="rounded-2xl bg-zinc-100 p-4 text-center">

                                <h3
                                    class="text-2xl font-bold text-zinc-900">

                                    {{ $item->pakets->count() }}

                                </h3>

                                <p
                                    class="text-xs text-zinc-500 mt-1">

                                    Paket

                                </p>

                            </div>
                            {{-- STATUS --}}
                            <div
                                class="rounded-2xl bg-zinc-100 p-4 text-center">

                                <h3
                                    class="text-sm font-bold text-emerald-600">

                                    Aktif

                                </h3>

                                <p
                                    class="text-xs text-zinc-500 mt-1">

                                    Status

                                </p>

                            </div>

                        </div>

                        {{-- PAKET LIST --}}
                        <div class="space-y-3 mb-6">

                            <div
                                class="flex items-center justify-between">

                                <h3
                                    class="font-semibold text-zinc-900">

                                    Paket Kursus

                                </h3>

                                <span
                                    class="text-xs text-zinc-400">

                                    {{ $item->pakets->count() }} Paket

                                </span>

                            </div>

                            @forelse($item->pakets as $paket)

                                <div
                                    class="rounded-2xl border border-zinc-200 p-4 hover:border-zinc-900 transition">

                                    <div
                                        class="flex items-start justify-between gap-4">

                                        <div>

                                            <h4
                                                class="font-semibold text-zinc-900 mb-1">

                                                {{ $paket->jenis }}

                                            </h4>

                                         

                                        </div>

                                        <div
                                            class="text-right">

                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full bg-zinc-100 text-zinc-700 text-sm font-semibold">

                                                Rp{{ number_format($paket->harga, 0, ',', '.') }}

                                            </span>

                                        </div>

                                    </div>

                                </div>

                            @empty

                                <div
                                    class="rounded-2xl border border-dashed border-zinc-300 p-6 text-center">

                                    <div
                                        class="w-12 h-12 rounded-xl bg-zinc-100 flex items-center justify-center text-zinc-400 mx-auto mb-3">

                                        <i class="fas fa-box-open"></i>

                                    </div>

                                    <h4
                                        class="font-semibold text-zinc-700 mb-1">

                                        Belum Ada Paket

                                    </h4>

                                    <p
                                        class="text-sm text-zinc-500">

                                        Kursus ini belum memiliki paket.

                                    </p>

                                </div>

                            @endforelse

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        {{-- EMPTY STATE --}}
        <div
            class="bg-white rounded-3xl border border-zinc-200 shadow-sm p-14 text-center">

            <div
                class="w-24 h-24 rounded-3xl bg-zinc-100 flex items-center justify-center text-zinc-400 text-4xl mx-auto mb-6">

                <i class="fas fa-book-open"></i>

            </div>

            <h2
                class="text-3xl font-bold text-zinc-900 mb-3">

                Belum Ada Kursus

            </h2>

            <p
                class="text-zinc-500 max-w-lg mx-auto leading-relaxed">

                Saat ini kamu belum memiliki kursus yang diajarkan.
                Silakan hubungi admin untuk mendapatkan akses kursus.

            </p>

        </div>

    @endif

</div>

@endsection
