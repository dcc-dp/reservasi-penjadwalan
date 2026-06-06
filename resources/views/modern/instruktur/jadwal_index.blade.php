@extends('modern.layouts.app')

@section('title', 'Jadwal Mengajar')

@section('content')

    <div class="p-6">

        {{-- HEADER --}}
        <div class="mb-8">

            <h1 class="text-3xl font-bold text-zinc-900 mb-2">
                Jadwal Mengajar
            </h1>

            <p class="text-zinc-500">
                Lihat seluruh jadwal siswa yang mengikuti kursus yang Anda ajar.
            </p>

        </div>

        {{-- TOOLBAR --}}
        <div class="bg-white rounded-3xl border border-zinc-200 p-5 mb-6">

            <div class="flex flex-col md:flex-row gap-4 justify-between">

                <div class="relative w-full md:max-w-md">

                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-zinc-400">
                    </i>

                    <input type="text" placeholder="Cari siswa atau kursus..."
                        class="w-full h-12 pl-11 pr-4 rounded-2xl border border-zinc-300 focus:border-zinc-900 focus:ring-0">

                </div>

                <div class="text-sm text-zinc-500 flex items-center">

                    Total Jadwal:
                    <span class="font-semibold text-zinc-900 ml-2">
                        {{ $reservasis->count() }}
                    </span>

                </div>

            </div>

        </div>

        {{-- TABLE --}}
        <div class="bg-white rounded-3xl border border-zinc-200 shadow-sm overflow-hidden">

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="bg-zinc-50 border-b border-zinc-200">

                            <th class="px-6 py-4 text-left text-xs uppercase tracking-wider text-zinc-500">

                                Siswa

                            </th>

                            <th class="px-6 py-4 text-left text-xs uppercase tracking-wider text-zinc-500">

                                Kursus

                            </th>

                            <th class="px-6 py-4 text-left text-xs uppercase tracking-wider text-zinc-500">

                                Paket

                            </th>

                            <th class="px-6 py-4 text-left text-xs uppercase tracking-wider text-zinc-500">

                                Jadwal

                            </th>

                            <th class="px-6 py-4 text-left text-xs uppercase tracking-wider text-zinc-500">

                                Ruangan

                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-zinc-200">

                        @forelse($reservasis as $res)
                            <tr class="hover:bg-zinc-50 transition">

                                {{-- SISWA --}}
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="w-10 h-10 rounded-xl bg-zinc-100 flex items-center justify-center font-bold text-zinc-700">

                                            {{ strtoupper(substr($res->user->name ?? 'U', 0, 1)) }}

                                        </div>

                                        <div>

                                            <h3 class="font-semibold text-zinc-900">

                                                {{ $res->user->name ?? '-' }}

                                            </h3>

                                            <p class="text-sm text-zinc-500">

                                                {{ $res->user->email ?? '-' }}

                                            </p>

                                        </div>

                                    </div>

                                </td>

                                {{-- KURSUS --}}
                                <td class="px-6 py-4">

                                    <div>

                                        <p class="font-medium text-zinc-900">

                                            {{ $res->kursus->name ?? '-' }}

                                        </p>

                                    </div>

                                </td>

                                {{-- PAKET --}}
                                <td class="px-6 py-4">

                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full bg-zinc-100 text-zinc-700 text-sm">

                                        {{ $res->paket->jenis ?? '-' }}

                                    </span>

                                </td>

                                {{-- jadwal --}}
                                <td class="px-6 py-4">
                                    <div
                                        class="inline-flex items-center gap-2 px-3 py-1 rounded-xl bg-blue-50 text-blue-700 text-sm">
                                        <i class="fas fa-calendar-days"></i>

                                        {{ $res->jadwals->pluck('hari')->unique()->implode(', ') ?: '-' }}

                                        •

                                        {{ $res->jadwals->pluck('jam')->unique()->implode(', ') ?: '-' }}
                                    </div>
                                </td>

                                {{-- RUANGAN --}}
                                <td class="px-6 py-4">

                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-sm">

                                        {{ $res->ruangan ?? '-' }}

                                    </span>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="py-16 text-center">

                                    <div class="flex flex-col items-center">

                                        <div
                                            class="w-20 h-20 rounded-3xl bg-zinc-100 flex items-center justify-center text-zinc-400 text-3xl mb-4">

                                            <i class="fas fa-calendar-days"></i>

                                        </div>

                                        <h3 class="text-xl font-bold text-zinc-900 mb-2">

                                            Belum Ada Jadwal

                                        </h3>

                                        <p class="text-zinc-500">

                                            Belum ada siswa yang memiliki jadwal pada kursus Anda.

                                        </p>

                                    </div>

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
