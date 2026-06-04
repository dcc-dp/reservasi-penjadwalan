
@extends('modern.layouts.app')

@section('title', 'Tambah Kursus')

@section('page-title', 'Tambah Kursus')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- CARD --}}
    <div class="bg-white rounded-2xl border border-zinc-200 shadow-sm">

        {{-- FORM --}}
        <form
            action="{{ route('kursus.store') }}"
            method="POST"
            class="p-6 space-y-6">

            @csrf

            {{-- NAMA --}}
            <div>

                <label class="block text-sm font-semibold text-zinc-700 mb-2">
                    Nama Kursus
                </label>

                <input
                    type="text"
                    name="name"
                    placeholder="Masukkan nama kursus"
                    class="w-full h-11 rounded-xl border border-zinc-300 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-zinc-900"
                    required>

            </div>

            {{-- INSTRUKTUR --}}
            <div>

                <label class="block text-sm font-semibold text-zinc-700 mb-2">
                    Pilih Instruktur
                </label>

                <select
                    name="id_instruktur"
                    class="w-full h-11 rounded-xl border border-zinc-300 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-zinc-900"
                    required>

                    <option value="">
                        -- Pilih Instruktur --
                    </option>

                    @foreach($instrukturList as $instruktur)

                        <option value="{{ $instruktur->id }}">

                            {{ $instruktur->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            {{-- DESKRIPSI --}}
            <div>

                <label class="block text-sm font-semibold text-zinc-700 mb-2">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    placeholder="Masukkan deskripsi kursus"
                    class="w-full rounded-xl border border-zinc-300 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-zinc-900"></textarea>

            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 pt-4">

                <a
                    href="{{ route('kursus.index') }}"
                    class="h-11 px-5 rounded-xl border border-zinc-300 text-sm font-medium text-zinc-700 hover:bg-zinc-100 transition flex items-center">

                    Batal

                </a>

                <button
                    type="submit"
                    class="h-11 px-5 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-white text-sm font-medium transition">

                    Simpan Kursus

                </button>

            </div>

        </form>

    </div>

</div>

@endsection

