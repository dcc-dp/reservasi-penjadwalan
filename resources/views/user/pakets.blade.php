@extends('layouts.landingpage.landingPage')

@section('title', 'Paket Kursus')

@section('content')
<style>
    /* === Modern Card Styling === */
    .pricing-card {
        border: none;
        border-radius: 1.5rem;
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .pricing-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.12);
    }

    .pricing-badge {
        position: absolute;
        top: -10px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 0.85rem;
        font-weight: 600;
        border-radius: 50px;
        padding: 6px 14px;
        letter-spacing: 0.3px;
    }

    .card-price {
        font-size: 1.8rem;
        color: #111;
    }

    .old-price {
        text-decoration: line-through;
        color: #999;
        font-size: 0.9rem;
    }

    .btn-modern {
        border: none;
        border-radius: 50px;
        font-weight: 600;
        padding: 12px 36px;
        transition: all 0.3s ease;
        background: linear-gradient(90deg, #0066ff, #00ccff);
        color: white;
    }

    .btn-modern:hover {
        transform: scale(1.05);
        background: linear-gradient(90deg, #0055dd, #00bbee);
    }

    .popular-card {
        border-top: 6px solid gold;
    }

    .feature-list li {
        margin-bottom: 6px;
    }

    /* Responsive header */
    .hero-header h1 {
        font-size: clamp(1.8rem, 4vw, 2.8rem);
    }

    .hero-header p {
        font-size: clamp(1rem, 2vw, 1.1rem);
    }

</style>

<div class="container-fluid pb-0 hero-header bg-light mb-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <span class="border border-info rounded-pill px-3 py-1 text-info fw-semibold">
                Paket Belajar
            </span>
            <h1 class="fw-bold mt-3">Pilih Program Belajar Terbaik</h1>
            <p class="text-muted">Tentukan jalur suksesmu bersama <strong>Belajar Program 🚀</strong></p>
        </div>

        <div class="row g-4 justify-content-center">

            <!-- Paket 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="card pricing-card text-center position-relative h-100">
                    <span class="pricing-badge bg-secondary text-white">Kuota Terbatas</span>
                    <div class="card-body p-4 mt-3">
                        <h5 class="fw-bold text-primary mb-2">Bimbel Intensif SNBT 2026</h5>
                        <p class="old-price">Rp 7.100.000</p>
                        <h3 class="card-price fw-bold mb-3">Rp 5.000.000</h3>
                        <p class="text-muted small">Belajar intensif 30 hari tanpa menginap, siap hadapi ujian SNBT!</p>
                    </div>
                </div>
            </div>

            <!-- Paket 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="card pricing-card text-center position-relative h-100 popular-card">
                    <span class="pricing-badge bg-danger text-white">Paling Populer</span>
                    <div class="card-body p-4 mt-3">
                        <h5 class="fw-bold text-primary mb-2">Supercamp Karantina</h5>
                        <p class="old-price">Rp 52.663.000</p>
                        <h3 class="card-price fw-bold mb-3">Rp 40.510.000</h3>
                        <p class="text-muted small">Menginap 30 hari di apartemen premium, sistem belajar super intensif.</p>
                        <ul class="list-unstyled text-start d-inline-block feature-list small mb-0">
                            <li><i class="bi bi-check-circle text-success me-2"></i>Garansi Lolos PTN</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Garansi Uang Kembali</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Gratis Belajar Ulang</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Paket 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="card pricing-card text-center position-relative h-100">
                    <span class="pricing-badge bg-danger text-white">Diskon Spesial</span>
                    <div class="card-body p-4 mt-3">
                        <h5 class="fw-bold text-primary mb-2">Privat SNBT 2026</h5>
                        <p class="old-price">Rp 60.754.000</p>
                        <h3 class="card-price fw-bold mb-3">Rp 41.675.000</h3>
                        <p class="text-muted small">Program 1 guru 1 siswa, guru datang ke rumah siswa.</p>
                        <ul class="list-unstyled text-start d-inline-block feature-list small mb-0">
                            <li><i class="bi bi-check-circle text-success me-2"></i>Garansi Lolos PTN</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Garansi Guru Sampai Cocok</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Garansi Uang Kembali</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <!-- Tombol Daftar Satu Saja -->
        <div class="text-center mt-5">
            <a href="{{ route('reservasi.create') }}" class="btn btn-modern">Daftar Sekarang</a>
        </div>
    </div>
</div>
@endsection
