@extends('modern.layouts.app')

@section('title', 'Pembayaran')

@section('page-title', 'Pembayaran')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div
            class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">

            {{ session('success') }}

        </div>

    @endif

    {{-- CARD --}}
    <div class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden mx-8">

        {{-- HEADER --}}
        <div class="px-8 py-5 border-b border-zinc-200">

            <div class="flex items-center justify-between">

                {{-- LEFT --}}
                <div>

                    <h2 class="text-lg font-bold text-zinc-900">
                        Data Pembayaran
                    </h2>

                    <p class="text-sm text-zinc-500 mt-1">
                        Monitoring transaksi pembayaran siswa.
                    </p>

                </div>

                {{-- SEARCH --}}
                <div class="relative w-72">

                    <input
                        type="text"
                        placeholder="Cari pembayaran..."
                        class="w-full rounded-xl border border-zinc-200 bg-zinc-50 py-2 pl-10 pr-4 text-sm focus:outline-none focus:ring-2 focus:ring-zinc-900">

                    <i
                        class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400 text-xs">
                    </i>

                </div>

            </div>

        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table class="w-full">

                {{-- TABLE HEAD --}}
                <thead class="bg-zinc-50 border-b border-zinc-200">

                    <tr>

                        <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            User
                        </th>

                        <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Kursus
                        </th>

                        <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Paket
                        </th>

                        <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Metode
                        </th>

                        <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Total
                        </th>

                        <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Status
                        </th>

                        <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Aksi
                        </th>

                    </tr>

                </thead>

                {{-- TABLE BODY --}}
                <tbody class="divide-y divide-zinc-100">

                    @forelse($pembayarans as $item)

                        <tr class="hover:bg-zinc-50 transition">

                            {{-- USER --}}
                            <td class="px-5 py-4 text-center">

                                <div>

                                    <h5 class="font-semibold text-sm text-zinc-800">

                                        {{ $item->reservasi?->user?->name ?? '-' }}

                                    </h5>

                                    <p class="text-xs text-zinc-500 mt-1">

                                        {{ $item->order_id }}

                                    </p>

                                </div>

                            </td>

                            {{-- KURSUS --}}
                            <td class="px-5 py-4 text-center text-sm text-zinc-700">

                                {{ $item->reservasi?->kursus?->name ?? '-' }}

                            </td>

                            {{-- PAKET --}}
                            <td class="px-5 py-4 text-center">

                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-zinc-100 text-zinc-700">

                                    {{ $item->reservasi?->paket?->jenis ?? '-' }}

                                </span>

                            </td>

                            {{-- METODE --}}
                            <td class="px-5 py-4 text-center text-sm text-zinc-700">

                                {{ ucfirst($item->payment_type ?? '-') }}

                            </td>

                            {{-- TOTAL --}}
                            <td class="px-5 py-4 text-center text-sm font-semibold text-zinc-800">

                                Rp {{ number_format($item->total, 0, ',', '.') }}

                            </td>

                            {{-- STATUS --}}
                            <td class="px-5 py-4 text-center">

                                @if(in_array($item->status, ['settlement', 'capture']))

                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">

                                        Lunas

                                    </span>

                                @elseif($item->status == 'pending')

                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">

                                        Pending

                                    </span>

                                @elseif($item->status == 'expire')

                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-zinc-100 text-zinc-700">

                                        Expired

                                    </span>

                                @else

                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">

                                        Gagal

                                    </span>

                                @endif

                            </td>

                            {{-- ACTION --}}
                            <td class="px-5 py-4">

                                <div class="flex items-center justify-center gap-2">

                                    {{-- KONFIRMASI --}}
                                    @if($item->status == 'pending')

                                        <form
                                            action="{{ route('admin.pembayaran.konfirmasi', $item->id) }}"
                                            method="POST">

                                            @csrf
                                            @method('PUT')

                                            <button
                                                class="w-9 h-9 rounded-xl bg-green-100 text-green-600 hover:bg-green-500 hover:text-white transition flex items-center justify-center">

                                                <i class="fas fa-check text-xs"></i>

                                            </button>

                                        </form>

                                    @endif

                                    {{-- DELETE --}}
                                    <form
                                        action="{{ route('pembayaran.destroy', $item->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus pembayaran ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="w-9 h-9 rounded-xl bg-red-100 text-red-600 hover:bg-red-500 hover:text-white transition flex items-center justify-center">

                                            <i class="fas fa-trash text-xs"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="px-5 py-12 text-center text-zinc-500">

                                Belum ada data pembayaran.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- PAGINATION --}}
        <div class="px-6 py-4 border-t border-zinc-200">

            {{ $pembayarans->links() }}

        </div>

    </div>

</div>

@endsection

