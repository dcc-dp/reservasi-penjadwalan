@extends('modern.layouts.app')

@section('title', 'Edit Kursus')

@section('page-title', 'Edit Kursus')

@section('content')

<div class="max-w-4xl mx-auto">

    {{-- CARD --}}
    <div class="bg-white rounded-2xl border border-zinc-200 shadow-sm">

        {{-- HEADER --}}
        <div class="px-6 py-5 border-b border-zinc-200">

            <h2 class="text-lg font-bold text-zinc-900">
                Edit Kursus
            </h2>

            <p class="text-sm text-zinc-500 mt-1">
                Perbarui data kursus.
            </p>

        </div>

        {{-- FORM --}}
        <form
            action="{{ route('kursus.update', $kursus->id) }}"
            method="POST"
            class="p-6 space-y-6">

            @csrf
            @method('PUT')

            {{-- NAMA --}}
            <div>

                <label class="block text-sm font-semibold text-zinc-700 mb-2">
                    Nama Kursus
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name', $kursus->name) }}"
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

                    @foreach($instrukturList as $instruktur)

                        <option
                            value="{{ $instruktur->id }}"
                            {{ old('id_instruktur', $kursus->id_instruktur) == $instruktur->id ? 'selected' : '' }}>

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
                    class="w-full rounded-xl border border-zinc-300 px-4 py-3 text-sm focus:outline-none focus:ring-2 focus:ring-zinc-900">{{ old('deskripsi', $kursus->deskripsi) }}</textarea>

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

                    Update Kursus

                </button>

            </div>

        </form>

    </div>

</div>

@endsection
