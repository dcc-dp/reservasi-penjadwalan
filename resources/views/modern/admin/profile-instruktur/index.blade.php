@extends('modern.layouts.app')

@section('title', 'Manajemen Instruktur')

@section('content')

<div class="p-6">

    {{-- HEADER --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

        <div>

            <h1 class="text-2xl font-bold text-zinc-900">
                Manajemen Instruktur
            </h1>

            <p class="text-sm text-zinc-500 mt-1">
                Kelola akun dan data instruktur yang mengajar kursus.
            </p>

        </div>

        <a
            href="{{ route('instruktur.create') }}"
            class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-white text-sm font-medium transition">

            <i class="fas fa-plus"></i>

            Tambah Instruktur

        </a>

    </div>

    {{-- SEARCH --}}
    <div class="bg-white rounded-2xl border border-zinc-200 p-4 mb-5">

        <div class="relative max-w-md">

            <i
                class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-zinc-400">
            </i>

            <input
                type="text"
                placeholder="Cari instruktur..."
                class="w-full h-11 pl-11 pr-4 rounded-xl border border-zinc-300 focus:border-zinc-900 focus:ring-0">

        </div>

    </div>

    {{-- TABLE --}}
    <div
        class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-zinc-50 border-b border-zinc-200">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Instruktur
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Email
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            No Telepon
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Keahlian
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Pengalaman
                        </th>

                        <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-zinc-200">

                    @forelse($profiles as $profile)

                        <tr class="hover:bg-zinc-50 transition">

                            {{-- INSTRUKTUR --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center gap-3">

                                    @if($profile->user && $profile->user->photo)

                                        <img
                                            src="{{ asset('storage/' . $profile->user->photo) }}"
                                            alt="Profile"
                                            class="w-11 h-11 rounded-xl object-cover">

                                    @else

                                        <div
                                            class="w-11 h-11 rounded-xl bg-zinc-100 flex items-center justify-center text-zinc-700 font-semibold">

                                            {{ strtoupper(substr($profile->user->name ?? 'I', 0, 1)) }}

                                        </div>

                                    @endif

                                    <div>

                                        <p class="font-semibold text-zinc-900">
                                            {{ $profile->user->name ?? '-' }}
                                        </p>

                                        <p class="text-sm text-zinc-500">
                                            Instruktur
                                        </p>

                                    </div>

                                </div>

                            </td>

                            {{-- EMAIL --}}
                            <td class="px-6 py-4 text-sm text-zinc-700">

                                {{ $profile->user->email ?? '-' }}

                            </td>

                            {{-- TELEPON --}}
                            <td class="px-6 py-4 text-sm text-zinc-700">

                                {{ $profile->user->notelp ?? '-' }}

                            </td>

                            {{-- KEAHLIAN --}}
                            <td class="px-6 py-4">

                                <span
                                    class="inline-flex px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm">

                                    {{ $profile->keahlian }}

                                </span>

                            </td>

                            {{-- PENGALAMAN --}}
                            <td class="px-6 py-4 text-sm text-zinc-700">

                                {{ $profile->pengalaman }}

                            </td>

                            {{-- AKSI --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center justify-center gap-2">

                                    <a
                                        href="{{ route('instruktur.edit', $profile->id) }}"
                                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-sm font-medium transition">

                                        <i class="fas fa-pen"></i>

                                        Edit

                                    </a>

                                    <form
                                        action="{{ route('instruktur.destroy', $profile->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus instruktur ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-red-100 hover:bg-red-200 text-red-700 text-sm font-medium transition">

                                            <i class="fas fa-trash"></i>

                                            Hapus

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="px-6 py-14 text-center">

                                <div class="flex flex-col items-center">

                                    <div
                                        class="w-20 h-20 rounded-3xl bg-zinc-100 flex items-center justify-center text-zinc-400 text-3xl mb-4">

                                        <i class="fas fa-user-tie"></i>

                                    </div>

                                    <h3
                                        class="text-lg font-semibold text-zinc-900">

                                        Belum Ada Instruktur

                                    </h3>

                                    <p
                                        class="text-sm text-zinc-500 mt-1">

                                        Tambahkan instruktur pertama untuk mulai mengelola kursus.

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