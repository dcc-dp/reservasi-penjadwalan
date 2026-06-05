@extends('modern.layouts.app')

@section('title', 'Reservasi')

@section('page-title', 'Reservasi')

@section('content')

    <div class="max-w-7xl mx-auto">

        {{-- SUCCESS --}}
        @if (session('success'))
            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">

                {{ session('success') }}

            </div>
        @endif

        {{-- TABLE CARD --}}
        <div class="bg-white rounded-2xl border border-zinc-200 overflow-hidden shadow-sm mx-8">

            {{-- TOPBAR --}}
            <div class="px-10 py-5 border-b border-zinc-200">

                <div class="flex items-center justify-between">

                    {{-- SEARCH --}}
                    <div class="relative w-72 ml-4">

                        <input type="text" placeholder="Cari reservasi..."
                            class="w-full rounded-xl border border-zinc-200 bg-zinc-50 px-4 py-2 pl-10 text-sm focus:outline-none focus:ring-2 focus:ring-zinc-900">

                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400 text-xs"></i>

                    </div>

                    {{-- TITLE --}}
                    <div>

                        <h2 class="text-lg font-bold text-zinc-900">
                            Data Reservasi
                        </h2>

                    </div>

                </div>

            </div>

            {{-- TABLE --}}
            <div class="overflow-x-auto">

                <table class="w-full">

                    {{-- HEAD --}}
                    <thead class="bg-zinc-50">
                        <tr>

                            <th class="text-center px-5 py-3 text-sm font-semibold text-zinc-600">
                                Nama Pengguna
                            </th>

                            <th class="text-center px-5 py-3 text-sm font-semibold text-zinc-600">
                                Kursus
                            </th>

                            <th class="text-center px-5 py-3 text-sm font-semibold text-zinc-600">
                                Tanggal Mulai
                            </th>

                            <th class="text-center px-5 py-3 text-sm font-semibold text-zinc-600">
                                Hari Belajar
                            </th>

                            <th class="text-center px-5 py-3 text-sm font-semibold text-zinc-600">
                                Jam
                            </th>

                            <th class="text-center px-5 py-3 text-sm font-semibold text-zinc-600">
                                Tempat
                            </th>

                            <th class="text-center px-5 py-3 text-sm font-semibold text-zinc-600">
                                Pembayaran
                            </th>

                            <th class="text-center px-5 py-3 text-sm font-semibold text-zinc-600">
                                Aksi
                            </th>

                        </tr>
                    </thead>

                    {{-- BODY --}}
                    <tbody>

                        @forelse ($reserv as $item)
                            <tr class="border-t border-zinc-100 hover:bg-zinc-50 transition">

                                {{-- USER --}}
                                <td class="px-5 py-4 text-center">
                                    <div>
                                        <h5 class="font-semibold text-zinc-800">
                                            {{ $item->user->name ?? '-' }}
                                        </h5>

                                        <p class="text-xs text-zinc-500 mt-1">
                                            Siswa Kursus
                                        </p>
                                    </div>
                                </td>

                                {{-- KURSUS --}}
                                <td class="px-5 py-4 text-center text-sm text-zinc-700">
                                    {{ $item->kursus->name ?? '-' }}
                                </td>

                                {{-- TANGGAL MULAI --}}
                                <td class="px-5 py-4 text-center text-sm text-zinc-700">
                                    {{ $item->tanggal_mulai ? \Carbon\Carbon::parse($item->tanggal_mulai)->translatedFormat('d F Y') : '-' }}
                                </td>

                                {{-- HARI BELAJAR --}}
                                <td class="px-5 py-4 text-center text-sm text-zinc-700">
                                    {{ $item->jadwals->pluck('hari')->unique()->implode(', ') ?: '-' }}
                                </td>

                                <td class="px-5 py-4 text-center text-sm text-zinc-700">
                                    {{ $item->jadwals->pluck('jam')->unique()->implode(', ') ?: '-' }}
                                </td>

                                {{-- TEMPAT --}}
                                <td class="px-5 py-4 text-center text-sm text-zinc-700">

                                    {{ $item->ruangan ?? '-' }}

                                </td>

                                {{-- STATUS PEMBAYARAN --}}
                                <td class="px-5 py-4 text-center">

                                    @if (!$item->pembayaran)
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-zinc-100 text-zinc-700">
                                            Belum Ada Data
                                        </span>
                                    @elseif($item->pembayaran->status == 'pending')
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
                                            Menunggu
                                        </span>
                                    @elseif(in_array($item->pembayaran->status, ['settlement', 'capture']))
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                            Lunas
                                        </span>
                                    @elseif($item->pembayaran->status == 'expire')
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-zinc-100 text-zinc-700">
                                            Expired
                                        </span>
                                    @elseif(in_array($item->pembayaran->status, ['cancel', 'deny', 'failure']))
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                            Gagal
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-zinc-900 text-white">
                                            {{ ucfirst($item->pembayaran->status) }}
                                        </span>
                                    @endif

                                </td>

                                {{-- AKSI --}}
                                <td class="px-5 py-4">

                                    <div class="flex items-center justify-center gap-2">

                                        @if ($item->pembayaran && $item->pembayaran->status == 'dibayar')
                                            <form action="{{ route('admin.pembayaran.konfirmasi', $item->pembayaran->id) }}"
                                                method="POST">

                                                @csrf
                                                @method('PUT')

                                                <button
                                                    class="w-9 h-9 rounded-xl bg-green-100 text-green-600 hover:bg-green-500 hover:text-white transition flex items-center justify-center">

                                                    <i class="fas fa-check text-xs"></i>

                                                </button>

                                            </form>
                                        @endif

                                        <form action="{{ route('reservasi.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus reservasi ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="w-9 h-9 rounded-xl bg-red-100 text-red-600 hover:bg-red-500 hover:text-white transition flex items-center justify-center">

                                                <i class="fas fa-trash text-xs"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="8" class="px-5 py-10 text-center text-zinc-500">
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
