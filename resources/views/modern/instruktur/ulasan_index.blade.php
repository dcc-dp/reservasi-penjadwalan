@extends('modern.layouts.app')

@section('title', 'Ulasan Siswa')

@section('content')

<div class="p-6">

    {{-- HEADER --}}
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-zinc-900 mb-2">
            Ulasan Siswa
        </h1>

        <p class="text-zinc-500">
            Lihat feedback dan penilaian siswa terhadap kursus yang Anda ajar.
        </p>

    </div>

    @if($ulasans->count())

        {{-- REVIEW GRID --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            @foreach($ulasans as $ulasan)

                <div
                    class="bg-white rounded-3xl border border-zinc-200 p-6 hover:shadow-lg transition">

                    {{-- TOP --}}
                    <div
                        class="flex justify-between items-start gap-4 mb-5">

                        <div class="flex items-center gap-3">

                            <div
                                class="w-12 h-12 rounded-2xl bg-zinc-100 flex items-center justify-center font-bold text-zinc-700">

                                {{ strtoupper(substr($ulasan->user->name ?? 'U',0,1)) }}

                            </div>

                            <div>

                                <h3
                                    class="font-bold text-zinc-900">

                                    {{ $ulasan->user->name ?? '-' }}

                                </h3>

                                <p
                                    class="text-sm text-zinc-500">

                                    {{ $ulasan->kursus->name ?? '-' }}

                                </p>

                            </div>

                        </div>

                        {{-- RATING --}}
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-sm font-semibold">

                            ⭐ {{ $ulasan->rating }}/5

                        </span>

                    </div>

                    {{-- STAR --}}
                    <div class="flex items-center gap-1 mb-4 text-xl">

                        @for($i = 1; $i <= 5; $i++)

                            @if($i <= $ulasan->rating)

                                <span class="text-yellow-400">
                                    ★
                                </span>

                            @else

                                <span class="text-zinc-300">
                                    ★
                                </span>

                            @endif

                        @endfor

                    </div>

                    {{-- REVIEW --}}
                    <div
                        class="rounded-2xl bg-zinc-50 border border-zinc-200 p-4">

                        <p
                            class="text-zinc-700 leading-relaxed">

                            {{ $ulasan->ulasan ?? 'Tidak ada komentar.' }}

                        </p>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        {{-- EMPTY STATE --}}
        <div
            class="bg-white rounded-3xl border border-zinc-200 p-12 text-center">

            <div
                class="w-20 h-20 rounded-3xl bg-zinc-100 flex items-center justify-center text-zinc-400 text-3xl mx-auto mb-5">

                <i class="fas fa-star"></i>

            </div>

            <h2
                class="text-2xl font-bold text-zinc-900 mb-2">

                Belum Ada Ulasan

            </h2>

            <p
                class="text-zinc-500">

                Belum ada siswa yang memberikan ulasan untuk kursus Anda.

            </p>

        </div>

    @endif

</div>

@endsection