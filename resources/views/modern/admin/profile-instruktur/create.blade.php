@extends('modern.layouts.app')

@section('title', 'Tambah Instruktur')

@section('content')

<div class="p-6">

    <div class="max-w-5xl mx-auto">

        {{-- HEADER --}}
        <div class="mb-6">

            <h1 class="text-2xl font-bold text-zinc-900">
                Tambah Instruktur
            </h1>

            <p class="text-sm text-zinc-500 mt-1">
                Buat akun instruktur baru beserta profil pengajarnya.
            </p>

        </div>

        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                <p class="font-semibold mb-2">Data gagal disimpan:</p>
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <p class="mt-2 text-red-600">
                    Field password dikosongkan ulang demi keamanan — isi password lagi lalu simpan.
                </p>
            </div>
        @endif

        <form action="{{ route('instruktur.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- DATA AKUN --}}
                <div class="bg-white rounded-2xl border border-zinc-200 p-6">

                    <h3 class="text-lg font-semibold text-zinc-900 mb-5">
                        Data Akun
                    </h3>

                    <div class="space-y-5">

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                class="w-full rounded-xl border border-zinc-300 px-4 py-3">

                        </div>

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                class="w-full rounded-xl border border-zinc-300 px-4 py-3 @error('email') border-red-500 @enderror">

                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                required
                                minlength="6"
                                class="w-full rounded-xl border border-zinc-300 px-4 py-3 @error('password') border-red-500 @enderror">

                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                        </div>

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Nomor Telepon
                            </label>

                            <input
                                type="text"
                                name="notelp"
                                value="{{ old('notelp') }}"
                                class="w-full rounded-xl border border-zinc-300 px-4 py-3">

                        </div>

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Alamat
                            </label>

                            <textarea
                                name="alamat"
                                rows="4"
                                class="w-full rounded-xl border border-zinc-300 px-4 py-3">{{ old('alamat') }}</textarea>

                        </div>

                    </div>

                </div>

                {{-- DATA INSTRUKTUR --}}
                <div class="bg-white rounded-2xl border border-zinc-200 p-6">

                    <h3 class="text-lg font-semibold text-zinc-900 mb-5">
                        Data Instruktur
                    </h3>

                    <div class="space-y-5">

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Keahlian
                            </label>

                            <input
                                type="text"
                                name="keahlian"
                                value="{{ old('keahlian') }}"
                                required
                                class="w-full rounded-xl border border-zinc-300 px-4 py-3">

                        </div>

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Pengalaman
                            </label>

                            <input
                                type="text"
                                name="pengalaman"
                                value="{{ old('pengalaman') }}"
                                required
                                class="w-full rounded-xl border border-zinc-300 px-4 py-3">

                        </div>

                        <div>

                            <label class="block text-sm font-medium mb-2">
                                Bio
                            </label>

                            <textarea
                                name="bio"
                                rows="8"
                                class="w-full rounded-xl border border-zinc-300 px-4 py-3">{{ old('bio') }}</textarea>

                        </div>

                    </div>

                </div>

            </div>

            {{-- BUTTON --}}
            <div class="flex items-center gap-3 mt-6">

                <button
                    type="submit"
                    class="px-5 py-3 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-white text-sm font-medium">

                    Simpan Instruktur

                </button>

                <a
                    href="{{ url('/instruktur/create') }}"
                    class="px-5 py-3 rounded-xl border border-zinc-300 hover:bg-zinc-100 text-sm font-medium">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection
