@extends('modern.layouts.guest')

@section('title', 'Register')

@section('content')
<div class="min-h-screen flex">

    {{-- LEFT SIDE --}}
    <div class="hidden lg:flex w-1/2 bg-zinc-900 items-center justify-center p-12">

        <div class="max-w-md text-white">

            <h1 class="text-5xl font-bold mb-6">
                Sistem Reservasi Kursus
            </h1>

            <p class="text-zinc-300 text-lg leading-relaxed">
                Daftarkan akun Anda untuk mengakses berbagai kursus,
                melakukan reservasi, pembayaran, dan melihat jadwal belajar.
            </p>

        </div>

    </div>

    {{-- RIGHT SIDE --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center bg-zinc-100 p-8">

        <div class="w-full max-w-xl bg-white rounded-3xl shadow-xl p-8">

            <div class="text-center mb-8">

                <h2 class="text-3xl font-bold text-zinc-900">
                    Register
                </h2>

                <p class="text-zinc-500 mt-2">
                    Buat akun siswa baru
                </p>

            </div>

            <form method="POST" action="{{ route('register.admin.store') }}">
                @csrf

                {{-- NAMA --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        class="w-full px-4 py-3 border border-zinc-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-zinc-900">

                    @error('name')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full px-4 py-3 border border-zinc-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-zinc-900">

                    @error('email')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- NO TELP --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">
                        Nomor Telepon
                    </label>

                    <input
                        type="text"
                        name="notelp"
                        value="{{ old('notelp') }}"
                        required
                        class="w-full px-4 py-3 border border-zinc-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-zinc-900">

                    @error('notelp')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- JENIS KELAMIN --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">
                        Jenis Kelamin
                    </label>

                    <select
                        name="jenis_kelamin"
                        required
                        class="w-full px-4 py-3 border border-zinc-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-zinc-900">

                        <option value="">
                            Pilih Jenis Kelamin
                        </option>

                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                            Laki-laki
                        </option>

                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                            Perempuan
                        </option>

                    </select>

                    @error('jenis_kelamin')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- ALAMAT --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        rows="3"
                        required
                        class="w-full px-4 py-3 border border-zinc-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-zinc-900">{{ old('alamat') }}</textarea>

                    @error('alamat')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        class="w-full px-4 py-3 border border-zinc-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-zinc-900">

                    @error('password')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- AGREEMENT --}}
                <div class="flex items-center mb-6">

                    <input
                        type="checkbox"
                        name="agreement"
                        value="1"
                        required
                        class="rounded border-zinc-300">

                    <label class="ml-2 text-sm text-zinc-600">
                        Saya menyetujui syarat dan ketentuan yang berlaku
                    </label>

                </div>

                {{-- BUTTON --}}
                <button
                    type="submit"
                    class="w-full bg-zinc-900 hover:bg-zinc-800 text-white font-semibold py-3 rounded-xl transition">

                    Daftar Sekarang

                </button>

            </form>

            <div class="mt-6 text-center">

                <p class="text-zinc-500">

                    Sudah punya akun?

                    <a
                        href="{{ route('login') }}"
                        class="font-semibold text-zinc-900 hover:underline">

                        Login

                    </a>

                </p>

            </div>

        </div>

    </div>

</div>
@endsection