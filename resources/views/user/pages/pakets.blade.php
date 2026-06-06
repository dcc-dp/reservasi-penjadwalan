@extends('layouts.landingpage.landingPage')

@section('title', 'Paket Kursus')

@section('content')

    <section class="pt-150 pb-80 text-center bg-light">
        <div class="container">
            <h1 class="mb-20">Paket Kursus</h1>
            <p class="lead">
                Pilih paket belajar yang sesuai dengan kebutuhanmu.
                Mulai dari dasar hingga menjadi developer profesional.
            </p>
        </div>
    </section>

    <section class="pricing-section pt-5 pb-5 bg-light min-vh-100 d-flex align-items-center">
        <div class="container py-4">

            {{-- Pricing Cards Grid --}}
            <div class="row g-4 justify-content-center align-items-stretch">

                @foreach ($pakets as $p)
                    <div class="col-lg-4 col-md-6 d-flex">

                        <div class="card border-0 shadow-sm rounded-3 w-100">

                            <div class="card-body text-center p-4 p-xl-5 d-flex flex-column">

                                {{-- Dynamic Badge --}}
                                <div class="mb-3">
                                    <span
                                        class="badge bg-primary px-3 py-2 rounded-pill fw-bold text-uppercase tracking-wider small">
                                        {{ $p->jenis }}
                                    </span>
                                </div>

                                {{-- Nama Kursus --}}
                                <h4 class="fw-bold text-dark text-capitalize mb-3">
                                    {{ $p->kursus->name }}
                                </h4>

                                {{-- Harga --}}
                                <div class="mb-3">
                                    <h2 class="fw-bold text-primary mb-0">
                                        Rp {{ number_format($p->harga, 0, ',', '.') }}
                                    </h2>
                                </div>

                                {{-- Deskripsi dengan Alignment Flexbox --}}
                                <div class="flex-grow-1 d-flex align-items-center justify-content-center mb-4">
                                    <p class="text-muted small mb-0 px-2">
                                        {{ Str::limit($p->kursus->deskripsi, 50) ?: 'Tidak ada deskripsi tersedia.' }}
                                    </p>
                                </div>

                                {{-- Tombol Aksi --}}
                                <div class="mt-auto pt-2">
                                    <a href="{{ route('pakets') }}"
                                        class="btn btn-primary rounded-pill px-4 py-2 fw-semibold w-100 shadow-sm">
                                        Lihat Detail
                                    </a>
                                </div>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
