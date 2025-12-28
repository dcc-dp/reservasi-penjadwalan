@extends('layouts.landingpage.landingPage')

@section('title', 'Paket Kursus')

@section('content')

<div class="container-fluid py-5 bg-light">
    <div class="container">

        <div class="text-center mb-5">
            <span class="badge bg-primary px-3 py-2 rounded-pill">
                Belajar Coding Seru 🚀
            </span>
            <h1 class="mt-3 fw-bold">Paket Kursus</h1>
            <p class="text-muted">
                Pilih paket belajar sesuai kebutuhanmu.
            </p>
        </div>

        <div class="row g-4 justify-content-center">

            @forelse ($data as $paket)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm text-center p-4">

                        <div class="mb-3 fs-1 text-primary">
                            <i class="bi bi-code-slash"></i>
                        </div>

                        <h5 class="fw-bold">
                            {{ $paket->jenis }}
                        </h5>

                        <h3 class="fw-bold text-primary">
                            Rp {{ number_format($paket->harga, 0, ',', '.') }}
                        </h3>

                        <p class="text-muted small">
                            {{ $paket->materi->nama_materi ?? 'Materi belum tersedia' }}
                        </p>

                        <ul class="list-unstyled text-start small">
                            <li>
                                <i class="bi bi-check-circle text-success me-2"></i>
                                Akses Materi Lengkap
                            </li>
                            <li>
                                <i class="bi bi-check-circle text-success me-2"></i>
                                Sertifikat
                            </li>
                            <li>
                                <i class="bi bi-check-circle text-success me-2"></i>
                                Pendampingan
                            </li>
                        </ul>

                        <a href="{{ route('loginUser', $paket->id ?? null) }}"
                           class="btn btn-primary rounded-pill mt-auto">
                            Daftar Sekarang
                        </a>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-muted">Paket belum tersedia.</p>
                </div>
            @endforelse

        </div>

    </div>
</div>

@endsection
