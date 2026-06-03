@extends('modern.layouts.app')

@section('content')

<div class="p-6">

    <div class="max-w-3xl mx-auto">

        {{-- HEADER --}}
        <div class="mb-6">

            <h1 class="text-2xl font-bold text-zinc-900">
                Edit Profile Instruktur
            </h1>

            <p class="text-sm text-zinc-500 mt-1">
                Perbarui data profile instruktur.
            </p>

        </div>

        {{-- CARD --}}
        <div class="bg-white rounded-2xl shadow-sm border border-zinc-200 p-6">

            <form action="{{ route('instruktur.update', $profile->id) }}" method="POST">

                @csrf
                @method('PUT')

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

                            @foreach ($users as $user)

                                <option
                                    value="{{ $user->id }}"
                                    {{ $profile->user_id == $user->id ? 'selected' : '' }}>

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
                            value="{{ $profile->keahlian }}"
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
                            value="{{ $profile->pengalaman }}"
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
                            class="w-full rounded-xl border border-zinc-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-zinc-900">{{ $profile->bio }}</textarea>

                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="flex items-center gap-3 mt-6">

                    <button
                        type="submit"
                        class="px-5 py-3 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-white text-sm font-medium transition">

                        Update

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
