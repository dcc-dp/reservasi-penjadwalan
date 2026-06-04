@extends('modern.layouts.app')

@section('title', 'Paket')

@section('page-title', 'Paket')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- TABLE CARD --}}
    <div class="bg-white rounded-2xl border border-zinc-200 overflow-hidden shadow-sm mx-8">

        {{-- TOPBAR --}}
        <div class="px-10 py-5 border-b border-zinc-200">

            <div class="flex items-center justify-between">

                {{-- SEARCH --}}
                <div class="relative w-72 ml-4">

                    <input
                        type="text"
                        placeholder="Cari paket..."
                        class="w-full rounded-xl border border-zinc-200 bg-zinc-50 px-4 py-2 pl-10 text-sm focus:outline-none focus:ring-2 focus:ring-zinc-900">

                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400 text-xs"></i>

                </div>

                {{-- ACTION --}}
                <div class="px-4 py-2 rounded-xl text-sm font-medium">

                    {{-- TAMBAH --}}
                    <a
                        href="{{ route('paket.create') }}"
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-zinc-900 text-white hover:bg-zinc-800 transition text-sm font-medium">

                        <i class="fas fa-plus text-xs"></i>

                        Tambah Paket

                    </a>

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
                            No
                        </th>

                        <th class="text-center px-5 py-3 text-sm font-semibold text-zinc-600">
                            Nama Kursus
                        </th>

                        <th class="text-center px-5 py-3 text-sm font-semibold text-zinc-600">
                            Jenis Paket
                        </th>

                        <th class="text-center px-5 py-3 text-sm font-semibold text-zinc-600">
                            Harga
                        </th>

                        <th class="text-center px-5 py-3 text-sm font-semibold text-zinc-600">
                            Aksi
                        </th>

                    </tr>

                </thead>

                {{-- BODY --}}
                <tbody>

                    @forelse ($data as $item)

                        <tr
                            class="border-t border-zinc-100 hover:bg-zinc-50 transition">

                            {{-- NO --}}
                            <td class="px-5 py-4 text-center text-zinc-500">

                                {{ $loop->iteration }}

                            </td>

                            {{-- KURSUS --}}
                            <td class="px-5 py-4 text-center">

                                <div>

                                    <h5 class="font-semibold text-zinc-800">

                                        {{ optional($item->kursus)->name ?? '-' }}

                                    </h5>

                                    <p class="text-xs text-zinc-500 mt-1">

                                        Kursus Online

                                    </p>

                                </div>

                            </td>

                            {{-- JENIS --}}
                            <td class="px-5 py-4 text-center">

                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-zinc-100 text-zinc-700">

                                    {{ $item->jenis }}

                                </span>

                            </td>

                            {{-- HARGA --}}
                            <td class="px-5 py-4 text-center text-zinc-700 font-medium">

                                Rp{{ number_format($item->harga,0,',','.') }}

                            </td>

                            {{-- AKSI --}}
                            <td class="px-5 py-4">

                                <div class="flex items-center justify-center gap-2">

                                    {{-- EDIT --}}
                                    <a
                                        href="{{ route('paket.edit', $item->id) }}"
                                        class="w-9 h-9 rounded-xl bg-yellow-100 text-yellow-600 hover:bg-yellow-500 hover:text-white transition flex items-center justify-center">

                                        <i class="fas fa-pen text-xs"></i>

                                    </a>

                                    {{-- DELETE --}}
                                    <form
                                        action="{{ route('paket.destroy', $item->id) }}"
                                        method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            onclick="return confirm('Yakin ingin menghapus paket ini?')"
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
                                colspan="5"
                                class="px-5 py-10 text-center text-zinc-500">

                                Belum ada data paket

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

