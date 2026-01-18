@extends('layouts.landingpage.landingPage')

@section('title', 'Login')

@section('content')

<div class="container-fluid py-5  hero-header">
</div>
    <div class="d-flex justify-content-center align-items-center   hero-header min-vh-100 bg-light">
        <div class="card shadow-lg p-5 rounded-4" style="max-width: 600px; width: 100%; min-height: 550px;margin-bottom:50px">

            <h3 class="text-center fw-bold mb-2 text-success">Login</h3>

            <p class="text-center text-muted mb-4">Silakan masuk untuk melanjutkan</p>

            @if (session('error'))
                <div class="alert alert-danger text-center py-2">{{ session('error') }}</div>
            @endif

            <form action="{{ route('siswa.login') }}" method="POST" class="mt-4">
                @csrf


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
                    <i class="bi bi-box-arrow-in-right me-2"></i> Login
                </button
                <div class="mt-2 text-center"> 
                    <p>Belum memiliki akun? <a href="{{ route('siswa.register') }}">Daftar</a></p>
                </div>



                {{-- <p class="text-center mt-auto small text-muted">
                    Belum punya akun?
                    <a href="{{ route('register') }}" class="text-success fw-semibold text-decoration-none">Daftar
                        Sekarang</a>
                </p> --}}
            </form>
        </div>
    </div>

@endsection
