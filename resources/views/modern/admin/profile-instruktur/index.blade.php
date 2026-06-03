@extends('modern.layouts.app')

@section('content')

<div class="p-6">

    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-6">

        <div>

            <h1 class="text-2xl font-bold text-zinc-900">
                Profile Instruktur
            </h1>

            <p class="text-sm text-zinc-500 mt-1">
                Kelola data profile instruktur.
            </p>

        </div>

        <a href="{{ route('instruktur.create') }}"
            class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-white text-sm font-medium transition">

            <i class="fas fa-plus"></i>

            Tambah Profile

        </a>

    </div>

    {{-- CARD --}}
    <div class="bg-white rounded-2xl border border-zinc-200 shadow-sm overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-zinc-50 border-b border-zinc-200">

                    <tr>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            User
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Keahlian
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Pengalaman
                        </th>

                        <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Bio
                        </th>

                        <th class="px-6 py-4 text-center text-xs font-semibold uppercase tracking-wider text-zinc-500">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-zinc-200">

                    @forelse ($profiles as $profile)

                        <tr class="hover:bg-zinc-50 transition">

                            {{-- USER --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center gap-3">

                                    <div
                                        class="w-10 h-10 rounded-xl bg-zinc-100 flex items-center justify-center text-zinc-700 font-semibold">

                                        {{ strtoupper(substr($profile->user->name ?? 'U', 0, 1)) }}

                                    </div>

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

                            {{-- KEAHLIAN --}}
                            <td class="px-6 py-4 text-sm text-zinc-700">

                                {{ $profile->keahlian }}

                            </td>

                            {{-- PENGALAMAN --}}
                            <td class="px-6 py-4 text-sm text-zinc-700">

                                {{ $profile->pengalaman }}

                            </td>

                            {{-- BIO --}}
                            <td class="px-6 py-4 text-sm text-zinc-600 max-w-xs">

                                <div class="line-clamp-2">
                                    {{ $profile->bio ?? '-' }}
                                </div>

                            </td>

                            {{-- AKSI --}}
                            <td class="px-6 py-4">

                                <div class="flex items-center justify-center gap-2">

                                    {{-- EDIT --}}
                                    <a href="{{ route('instruktur.edit', $profile->id) }}"
                                        class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-yellow-100 hover:bg-yellow-200 text-yellow-700 text-sm font-medium transition">

                                        <i class="fas fa-pen"></i>

                                        Edit

                                    </a>

                                    {{-- DELETE --}}
                                    <form action="{{ route('instruktur.destroy', $profile->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus profile ini?')">

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

                            <td colspan="5"
                                class="px-6 py-12 text-center">

                                <div class="flex flex-col items-center">

                                    <div
                                        class="w-16 h-16 rounded-2xl bg-zinc-100 flex items-center justify-center text-zinc-400 text-2xl mb-4">

                                        <i class="fas fa-user-tie"></i>

                                    </div>

                                    <h3 class="text-lg font-semibold text-zinc-800">
                                        Belum Ada Profile
                                    </h3>

                                    <p class="text-sm text-zinc-500 mt-1">
                                        Tambahkan profile instruktur terlebih dahulu.
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