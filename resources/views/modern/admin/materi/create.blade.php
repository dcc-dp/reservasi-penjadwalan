@extends('modern.layouts.app')

@section('title', 'Tambah Materi')

@section('page-title', 'Tambah Materi')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- CARD --}}
    <div class="bg-white rounded-2xl border border-zinc-200 shadow-sm">


        {{-- FORM --}}
        <form
            action="{{ route('materi.store') }}"
            method="POST"
            class="p-6 space-y-6">

            @csrf

            {{-- PAKET --}}
            <div>

                <label
                    for="paket_id"
                    class="block text-sm font-semibold text-zinc-700 mb-2">

                    Pilih Paket

                </label>

                <select
                    name="paket_id"
                    id="paket_id"
                    class="w-full h-11 rounded-xl border border-zinc-300 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-zinc-900">

                    <option value="">
                        -- Pilih Paket --
                    </option>

                    @foreach ($pakets as $paket)

                        <option
                            value="{{ $paket->id }}"
                            {{ old('paket_id') == $paket->id ? 'selected' : '' }}>

                            {{ $paket->kursus->name ?? '-' }}
                            -
                            {{ $paket->jenis }}
                            -
                            Rp{{ number_format($paket->harga, 0, ',', '.') }}

                        </option>

                    @endforeach

                </select>

                @error('paket_id')

                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>

                @enderror

            </div>

            {{-- JUDUL --}}
            <div>

                <label
                    for="judul"
                    class="block text-sm font-semibold text-zinc-700 mb-2">

                    Nama Materi

                </label>

                <input
                    type="text"
                    id="judul"
                    name="judul"
                    value="{{ old('judul') }}"
                    placeholder="Masukkan nama materi"
                    class="w-full h-11 rounded-xl border border-zinc-300 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-zinc-900">

                @error('judul')

                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>

                @enderror

            </div>

            {{-- DESKRIPSI --}}
            <div>

                <label
                    for="deskripsi"
                    class="block text-sm font-semibold text-zinc-700 mb-2">

                    Deskripsi Materi

                </label>

                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    rows="5"
                    placeholder="Masukkan deskripsi materi"
                    class="w-full rounded-xl border border-zinc-300 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-zinc-900">{{ old('deskripsi') }}</textarea>

                @error('deskripsi')

                    <p class="text-red-500 text-xs mt-2">
                        {{ $message }}
                    </p>

                @enderror

            </div>

            {{-- BUTTON --}}
            <div class="flex items-center justify-end gap-3 pt-4">

                <a
                    href="{{ route('materi.index') }}"
                    class="h-11 px-5 rounded-xl border border-zinc-300 text-sm font-medium text-zinc-700 hover:bg-zinc-100 transition flex items-center">

                    Batal

                </a>

                <button
                    type="submit"
                    class="h-11 px-5 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-white text-sm font-medium transition">

                    Simpan Materi

                </button>

            </div>

        </form>

    </div>

</div>

@endsection
