@extends('layouts.landingpage.landingPage')

@section('title', 'Login')

@section('content')

    <div class="container-fluid py-5  hero-header">
    </div>
    <div class="d-flex justify-content-center align-items-center   hero-header min-vh-100 bg-light">
        <div class="card shadow-lg p-5 rounded-4" style="max-width: 600px; width: 100%; min-height: 550px;margin-bottom:50px">

            <h3 class="text-center fw-bold mb-2 text-success">Registrasi</h3>

            <p class="text-center text-muted mb-4">Silakan Registrasi Terlebih Dahulu</p>

            @if (session('error'))
                <div class="alert alert-danger text-center py-2">{{ session('error') }}</div>
            @endif

            <form action="{{ route('siswa.register.store') }}" method="POST" class="mt-4">
                @csrf
                <div class="mb-4">
                    <label class="fw-semibold mb-2">Nama Lengkap</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 rounded-start-pill ps-3">
                            <i class="bi bi-person text-success"></i>
                        </span>
                        <input type="text" name="name" class="form-control border-start-0 rounded-end-pill"
                            placeholder="Masukkan Nama Lengkap" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="fw-semibold mb-2">Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 rounded-start-pill ps-3">
                            <i class="bi bi-envelope text-success"></i>
                        </span>
                        <input type="email" name="email" class="form-control border-start-0 rounded-end-pill"
                            placeholder="Masukkan email" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="fw-semibold mb-2">No Telepon</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 rounded-start-pill ps-3">
                            <i class="bi-phone text-success"></i>
                        </span>
                        <input type="number" name="notelp" class="form-control border-start-0 rounded-end-pill"
                            placeholder="Masukkan No Telepon" required>
                    </div>
                </div>

                <div class="mb-2">
                    <label class="fw-semibold mb-2">Password</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0 rounded-start-pill ps-3">
                            <i class="bi bi-lock text-success"></i>
                        </span>
                        <input type="password" name="password" class="form-control border-start-0 rounded-end-pill"
                            placeholder="Masukkan password" required>
                    </div>
                </div>


                <button type="submit" class="btn btn-success w-100 rounded-pill fw-semibold mt-3 py-2 shadow-sm">
                    Register
                </button>

                <div class="mt-2 text-center">
                    <p>Sudah Memiliki akun?<a href="{{ route('siswa.login') }}">Login</a></p>
                </div>
            </form>

        </div>
    </div>

@endsection
