@extends('modern.layouts.app')

@section('title', 'Ulasan')

@section('page-title', 'Ulasan')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- SUCCESS --}}
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
                        Data Ulasan Siswa
                    </h2>

                    <p class="text-sm text-zinc-500 mt-1">
                        Daftar review dan rating dari siswa.
                    </p>

                </div>

                {{-- SEARCH --}}
                <div class="relative w-72">

                    <input
                        type="text"
                        placeholder="Cari ulasan..."
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

                {{-- HEAD --}}
                <thead class="bg-zinc-50 border-b border-zinc-200">

                    <tr>

                        <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            No
                        </th>

                        <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Nama Siswa
                        </th>

                        <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Kursus
                        </th>

                        <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Rating
                        </th>

                        <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Ulasan
                        </th>

                        <th class="px-5 py-4 text-center text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Aksi
                        </th>

                    </tr>

                </thead>

                {{-- BODY --}}
                <tbody class="divide-y divide-zinc-100">

                    @forelse($ulasans as $index => $ulasan)

                        <tr class="hover:bg-zinc-50 transition">

                            {{-- NO --}}
                            <td class="px-5 py-4 text-center text-sm text-zinc-500">

                                {{ $index + 1 }}

                            </td>

                            {{-- USER --}}
                            <td class="px-5 py-4 text-center">

                                <div>

                                    <h5 class="font-semibold text-sm text-zinc-800">

                                        {{ $ulasan->user->name ?? '-' }}

                                    </h5>

                                    <p class="text-xs text-zinc-500 mt-1">

                                        Siswa Kursus

                                    </p>

                                </div>

                            </td>

                            {{-- KURSUS --}}
                            <td class="px-5 py-4 text-center text-sm text-zinc-700">

                                {{ $ulasan->kursus->name ?? '-' }}

                            </td>

                            {{-- RATING --}}
                            <td class="px-5 py-4 text-center">

                                <div class="flex items-center justify-center gap-1 text-yellow-400 text-sm">

                                    @for($i = 1; $i <= 5; $i++)

                                        @if($i <= $ulasan->rating)

                                            <i class="fas fa-star"></i>

                                        @else

                                            <i class="far fa-star text-zinc-300"></i>

                                        @endif

                                    @endfor

                                </div>

                            </td>

                            {{-- ULASAN --}}
                            <td class="px-5 py-4 text-sm text-zinc-600 max-w-sm">

                                <div class="line-clamp-3">

                                    {{ $ulasan->ulasan ?? '-' }}

                                </div>

                            </td>

                            {{-- AKSI --}}
                            <td class="px-5 py-4">

                                <div class="flex items-center justify-center">

                                    <form
                                        action="{{ route('admin.ulasan.destroy', $ulasan->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus ulasan ini?')">

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
                                colspan="6"
                                class="px-5 py-12 text-center text-zinc-500">

                                Belum ada ulasan.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection

