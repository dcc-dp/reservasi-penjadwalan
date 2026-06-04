@extends('modern.layouts.guest')

@section('title', 'Login')

@section('content')
<div class="min-h-screen flex">

    {{-- LEFT --}}
    <div class="hidden lg:flex w-1/2 bg-zinc-900 items-center justify-center p-12">

        <div class="max-w-md text-white">

            <h1 class="text-5xl font-bold leading-tight mb-6">
                Sistem Reservasi Kursus
            </h1>

            <p class="text-zinc-300 text-lg">
                Kelola reservasi, jadwal, pembayaran, dan materi kursus
                dalam satu platform.
            </p>

        </div>

    </div>

    {{-- RIGHT --}}
    <div class="w-full lg:w-1/2 flex items-center justify-center bg-zinc-100 p-8">

        <div class="w-full max-w-md bg-white rounded-3xl shadow-xl p-8">

            <div class="mb-8 text-center">

                <h2 class="text-3xl font-bold text-zinc-900">
                    Login
                </h2>

                <p class="text-zinc-500 mt-2">
                    Masuk ke akun Anda
                </p>

            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- EMAIL --}}
                <div class="mb-5">

                    <label class="block text-sm font-medium text-zinc-700 mb-2">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        class="w-full px-4 py-3 rounded-xl border border-zinc-300 focus:outline-none focus:ring-2 focus:ring-zinc-900">

                    @error('email')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- PASSWORD --}}
                <div class="mb-5">

                    <label class="block text-sm font-medium text-zinc-700 mb-2">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        required
                        class="w-full px-4 py-3 rounded-xl border border-zinc-300 focus:outline-none focus:ring-2 focus:ring-zinc-900">

                    @error('password')
                        <p class="text-red-500 text-sm mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- REMEMBER --}}
                <div class="flex items-center mb-6">

                    <input
                        type="checkbox"
                        name="remember"
                        class="rounded border-zinc-300">

                    <label class="ml-2 text-sm text-zinc-600">
                        Remember Me
                    </label>

                </div>

                {{-- BUTTON --}}
                <button
                    type="submit"
                    class="w-full bg-zinc-900 hover:bg-zinc-800 text-white font-semibold py-3 rounded-xl transition">

                    Login

                </button>

            </form>

            <div class="mt-6 text-center">

                <p class="text-zinc-500">

                    Belum punya akun?

                    <a
                        href="{{ route('register.admin') }}"
                        class="font-semibold text-zinc-900 hover:underline">

                        Daftar

                    </a>

                </p>

            </div>

        </div>

    </div>

</div>
@endsection