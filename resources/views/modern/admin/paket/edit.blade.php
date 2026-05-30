
@extends('modern.layouts.app')

@section('title', 'Edit Paket')

@section('page-title', 'Edit Paket')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-2xl border border-zinc-200 shadow-sm">

        {{-- FORM --}}
        <form
            action="{{ route('paket.update',$paket->id) }}"
            method="POST"
            class="p-6 space-y-6">

            @csrf
            @method('PUT')

            {{-- KURSUS --}}
            <div>

                <label class="block text-sm font-semibold text-zinc-700 mb-2">
                    Kursus
                </label>

                <select
                    name="kursus_id"
                    class="w-full h-11 rounded-xl border border-zinc-300 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-zinc-900">

                    @foreach ($kursus as $k)

                        <option
                            value="{{ $k->id }}"
                            {{ $paket->kursus_id == $k->id ? 'selected' : '' }}>

                            {{ $k->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            {{-- JENIS --}}
            <div>

                <label class="block text-sm font-semibold text-zinc-700 mb-2">
                    Jenis Paket
                </label>

                <select
                    name="jenis"
                    class="w-full h-11 rounded-xl border border-zinc-300 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-zinc-900">

                    <option value="Regular" {{ $paket->jenis == 'Regular' ? 'selected' : '' }}>
                        Regular
                    </option>

                    <option value="VIP" {{ $paket->jenis == 'VIP' ? 'selected' : '' }}>
                        VIP
                    </option>

                    <option value="VVIP" {{ $paket->jenis == 'VVIP' ? 'selected' : '' }}>
                        VVIP
                    </option>

                </select>

            </div>

            {{-- HARGA --}}
            <div>

                <label class="block text-sm font-semibold text-zinc-700 mb-2">
                    Harga
                </label>

                <input
                    type="number"
                    name="harga"
                    value="{{ $paket->harga }}"
                    class="w-full h-11 rounded-xl border border-zinc-300 px-4 text-sm focus:outline-none focus:ring-2 focus:ring-zinc-900">

            </div>

            {{-- BUTTON --}}
            <div class="flex justify-end gap-3 pt-4">

                <a
                    href="{{ route('paket.index') }}"
                    class="h-11 px-5 rounded-xl border border-zinc-300 text-sm font-medium text-zinc-700 hover:bg-zinc-100 transition flex items-center">

                    Kembali

                </a>

                <button
                    type="submit"
                    class="h-11 px-5 rounded-xl bg-zinc-900 hover:bg-zinc-800 text-white text-sm font-medium transition">

                    Update Paket

                </button>

            </div>

        </form>

    </div>

</div>

@endsection

