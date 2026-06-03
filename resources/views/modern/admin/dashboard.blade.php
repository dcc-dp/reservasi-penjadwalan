@extends('modern.layouts.app')

@section('title', 'Dashboard Admin')

@section('page-title', 'Dashboard')

@section('content')

    {{-- STATS --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        {{-- MATERI --}}
        @include('modern.components.stats-card', [
            'title' => 'Total Materi',
            'value' => $materi,
            'icon' => 'fas fa-book',
            'bg' => 'bg-blue-500'
        ])

        {{-- KURSUS --}}
        @include('modern.components.stats-card', [
            'title' => 'Total Kursus',
            'value' => $kursus,
            'icon' => 'fas fa-graduation-cap',
            'bg' => 'bg-green-500'
        ])

        {{-- PAKET --}}
        @include('modern.components.stats-card', [
            'title' => 'Total Paket',
            'value' => $paket,
            'icon' => 'fas fa-box',
            'bg' => 'bg-yellow-500'
        ])

        {{-- PEMBAYARAN --}}
        @include('modern.components.stats-card', [
            'title' => 'Total Pembayaran',
            'value' => 'Rp ' . number_format($pembayaran, 0, ',', '.'),
            'icon' => 'fas fa-credit-card',
            'bg' => 'bg-red-500'
        ])

    </div>

    {{-- MIDDLE SECTION --}}
    <div class="mt-8">

        {{-- CHART --}}
        


    {{-- RESERVASI TERBARU --}}
        <div>

            <div
                class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden">

                {{-- HEADER --}}
                <div
                    class="flex items-center justify-between px-6 py-5 border-b border-zinc-200">

                    <div>

                        <h2 class="text-xl font-bold text-zinc-800">
                            Reservasi Terbaru
                        </h2>

                        <p class="text-sm text-zinc-500 mt-1">
                            Data reservasi terbaru pengguna
                        </p>

                    </div>

                </div>

                {{-- TABLE --}}
                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-zinc-50">

                            <tr>

                                <th
                                    class="text-left px-6 py-4 text-sm font-semibold text-zinc-600">
                                    Nama
                                </th>

                                <th
                                    class="text-left px-6 py-4 text-sm font-semibold text-zinc-600">
                                    Kursus
                                </th>

                                <th
                                    class="text-left px-6 py-4 text-sm font-semibold text-zinc-600">
                                    Status
                                </th>

                                <th
                                    class="text-left px-6 py-4 text-sm font-semibold text-zinc-600">
                                    Tanggal
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($reservasiTerbaru as $item)

                                <tr
                                    class="border-t border-zinc-100 hover:bg-zinc-50 transition">

                                    {{-- USER --}}
                                    <td class="px-6 py-4 font-medium text-zinc-800">

                                        {{ $item->user->name ?? '-' }}

                                    </td>

                                    {{-- KURSUS --}}
                                    <td class="px-6 py-4 text-zinc-600">

                                        {{ $item->kursus->nama_kursus ?? '-' }}

                                    </td>

                                    {{-- STATUS --}}
                                    <td class="px-6 py-4">

                                        <span
                                            class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">

                                            {{ $item->status ?? 'Aktif' }}

                                        </span>

                                    </td>

                                    {{-- TANGGAL --}}
                                    <td class="px-6 py-4 text-zinc-500">

                                        {{ $item->created_at->format('d M Y') }}

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4"
                                        class="px-6 py-8 text-center text-zinc-500">

                                        Belum ada data reservasi

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

@endsection