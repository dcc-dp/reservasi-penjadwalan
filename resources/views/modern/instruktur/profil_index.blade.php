@extends('modern.layouts.app')

@section('title', 'Profil Instruktur')

@section('content')

<div class="p-6">

    {{-- HEADER --}}
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-zinc-900 mb-2">
            Profil Instruktur
        </h1>

        <p class="text-zinc-500">
            Kelola informasi akun dan profil instruktur.
        </p>

    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- PROFILE CARD --}}
        <div>

            <div
                class="bg-white rounded-3xl border border-zinc-200 p-6">

                <div class="flex flex-col items-center">

                    {{-- PHOTO --}}
                    <div
                        class="w-28 h-28 rounded-3xl bg-zinc-100 overflow-hidden flex items-center justify-center text-4xl font-bold text-zinc-700 mb-5">

                        @if(auth()->user()->photo)

                        {{ Storage::url($user->photo) }}
                            <img
                                src="{{ asset('storage/' . auth()->user()->photo) }}"
                                class="w-full h-full object-cover">

                        @else

                            {{ strtoupper(substr(auth()->user()->name ?? 'I',0,1)) }}

                        @endif

                    </div>

                    <h2
                        class="text-xl font-bold text-zinc-900">

                        {{ auth()->user()->name }}

                    </h2>

                    <span
                        class="mt-2 px-4 py-1 rounded-full bg-zinc-100 text-zinc-700 text-sm">

                        Instruktur

                    </span>

                </div>

                <div
                    class="mt-8 space-y-5">

                    <div>

                        <p
                            class="text-sm text-zinc-500 mb-1">

                            Email

                        </p>

                        <p
                            class="font-medium text-zinc-900">

                            {{ auth()->user()->email }}

                        </p>

                    </div>

                    <div>

                        <p
                            class="text-sm text-zinc-500 mb-1">

                            Nomor Telepon

                        </p>

                        <p
                            class="font-medium text-zinc-900">

                            {{ auth()->user()->notelp ?? '-' }}

                        </p>

                    </div>

                    <div>

                        <p
                            class="text-sm text-zinc-500 mb-1">

                            Alamat

                        </p>

                        <p
                            class="font-medium text-zinc-900">

                            {{ auth()->user()->alamat ?? '-' }}

                        </p>

                    </div>

                </div>

            </div>

        </div>

        {{-- FORM --}}
        <div class="xl:col-span-2">

            <div
                class="bg-white rounded-3xl border border-zinc-200 p-6">

                <div class="mb-6">

                    <h2
                        class="text-xl font-bold text-zinc-900 mb-1">

                        Edit Profil

                    </h2>

                    <p
                        class="text-zinc-500 text-sm">

                        Perbarui informasi akun instruktur.

                    </p>

                </div>

                <form
                    action="{{ route('instruktur.profil.update') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div
                        class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- NAMA --}}
                        <div>

                            <label
                                class="block text-sm font-medium mb-2">

                                Nama Lengkap

                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name', auth()->user()->name) }}"
                                class="w-full h-12 px-4 rounded-2xl border border-zinc-300 focus:border-zinc-900 focus:ring-0">

                        </div>

                        {{-- EMAIL --}}
                        <div>

                            <label
                                class="block text-sm font-medium mb-2">

                                Email

                            </label>

                            <input
                                type="email"
                                value="{{ auth()->user()->email }}"
                                readonly
                                class="w-full h-12 px-4 rounded-2xl bg-zinc-100 border border-zinc-200">

                        </div>

                        {{-- TELEPON --}}
                        <div>

                            <label
                                class="block text-sm font-medium mb-2">

                                Nomor Telepon

                            </label>

                            <input
                                type="text"
                                name="notelp"
                                value="{{ old('notelp', auth()->user()->notelp) }}"
                                class="w-full h-12 px-4 rounded-2xl border border-zinc-300 focus:border-zinc-900 focus:ring-0">

                        </div>

                        {{-- FOTO --}}
                        <div>

                            <label
                                class="block text-sm font-medium mb-2">

                                Foto Profil

                            </label>

                            <input
                                type="file"
                                name="photo"
                                class="w-full h-12 px-3 py-2 rounded-2xl border border-zinc-300">

                        </div>

                    </div>

                    {{-- ALAMAT --}}
                    <div class="mt-5">

                        <label
                            class="block text-sm font-medium mb-2">

                            Alamat

                        </label>

                        <textarea
                            name="alamat"
                            rows="5"
                            class="w-full px-4 py-3 rounded-2xl border border-zinc-300 focus:border-zinc-900 focus:ring-0">{{ old('alamat', auth()->user()->alamat) }}</textarea>

                    </div>

                    <div
                        class="flex justify-end mt-6">

                        <button
                            type="submit"
                            class="px-6 py-3 rounded-2xl bg-zinc-900 hover:bg-zinc-800 text-white font-medium transition">

                            Simpan Perubahan

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection