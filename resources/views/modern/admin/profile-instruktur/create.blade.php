@extends('modern.layouts.app')

@section('content')

<div class="p-6">

    <div class="max-w-3xl mx-auto">

        {{-- HEADER --}}
        <div class="mb-6">

            <h1 class="text-2xl font-bold text-zinc-900">
                Tambah Profile Instruktur
            </h1>

            <p class="text-sm text-zinc-500 mt-1">
                Tambahkan data profile instruktur baru.
            </p>

        </div>

        {{-- CARD --}}
        <div class="bg-white rounded-2xl shadow-sm border border-zinc-200 p-6">

            <form action="{{ route('instruktur.store') }}" method="POST">

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    {{-- USER --}}
                    <div class="md:col-span-2">

                        <label class="block text-sm font-medium text-zinc-700 mb-2">
                            Pilih User
                        </label>

                        <select
                            name="user_id"
                            required
                            class="w-full rounded-xl border border-zinc-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-zinc-900">

                            <option value="">
                                -- Pilih User --
                            </option>

                            @foreach ($users as $user)

                                <option value="{{ $user->id }}">
                                    {{ $user->name }}
                                </option>

                            @endforeach

                        </select>

                    </div>

                    {{-- KEAHLIAN --}}
                    <div>

                        <label class="block text-sm font-medium text-zinc-700 mb-2">
                            Keahlian
                        </label>

                        <input
                            type="text"
                            name="keahlian"
                            required
                            class="w-full rounded-xl border border-zinc-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-zinc-900">

                    </div>

                    {{-- PENGALAMAN --}}
                    <div>

                        <label class="block text-sm font-medium text-zinc-700 mb-2">
                            Pengalaman
                        </label>

                        <input
                            type="text"
                            name="pengalaman"
                            required
                            class="w-full rounded-xl border border-zinc-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-zinc-900">

                    </div>

                    {{-- BIO --}}
                    <div class="md:col-span-2">

                        <label class="block text-sm font-medium text-zinc-700 mb-2">
                            Bio
                        </label>

                        <textarea
                            name="bio"
                            rows="5"
                            class="w-full rounded-xl border border-zinc-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-zinc-900"></textarea>

                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="flex items-center gap-3 mt-6">

                    <button
                        type="submit"
                        class="px-5 py-3 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-white text-sm font-medium transition">

                        Simpan

                    </button>

                    <a href="{{ route('instruktur.index') }}"
                        class="px-5 py-3 rounded-xl border border-zinc-300 hover:bg-zinc-100 text-sm font-medium transition">

                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

