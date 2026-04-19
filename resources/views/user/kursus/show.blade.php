@extends('layouts.siswa.siswa')
@section('title', 'Detail Kursus')

@section('content')

<style>
    .detail-hero {
        background: linear-gradient(135deg, #4A6CF7, #6f8cff);
        border-radius: 24px;
        overflow: hidden;
        position: relative;
    }

    .detail-hero::before {
        content: "";
        position: absolute;
        top: -35px;
        right: -30px;
        width: 160px;
        height: 160px;
        background: rgba(255,255,255,0.10);
        border-radius: 50%;
    }

    .detail-hero::after {
        content: "";
        position: absolute;
        bottom: -45px;
        right: 70px;
        width: 120px;
        height: 120px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
    }

    .detail-card {
        border: none;
        border-radius: 24px;
        box-shadow: 0 16px 35px rgba(15, 23, 42, 0.07);
    }

    .course-icon-box {
        width: 70px;
        height: 70px;
        border-radius: 20px;
        background: linear-gradient(135deg, #eef4ff, #dfe8ff);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #4A6CF7;
        font-size: 28px;
        margin-bottom: 18px;
    }

    .course-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 30px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 12px;
    }

    .course-desc {
        color: #6b7280;
        font-size: 15px;
        line-height: 1.8;
    }

    .info-box {
        background: #f8fafc;
        border: 1px solid #eef2f7;
        border-radius: 18px;
        padding: 16px 18px;
        margin-top: 22px;
    }

    .info-label {
        font-size: 12px;
        color: #9ca3af;
        margin-bottom: 4px;
    }

    .info-value {
        font-size: 15px;
        font-weight: 700;
        color: #1f2937;
    }

    .section-title {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 22px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 18px;
    }

    .paket-card {
        border: 1px solid #e8eefc;
        border-radius: 20px;
        padding: 18px;
        margin-bottom: 16px;
        background: #fff;
        transition: .25s ease;
    }

    .paket-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(74,108,247,0.08);
        border-color: #d8e3ff;
    }

    .paket-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }

    .paket-name {
        font-weight: 700;
        color: #111827;
        font-size: 16px;
    }

    .paket-price {
        color: #4A6CF7;
        font-weight: 700;
        font-size: 15px;
    }

    .paket-desc {
        font-size: 13px;
        color: #6b7280;
        margin-bottom: 14px;
    }

    .badge-soft-primary {
        background: #eef4ff;
        color: #3156f3;
        border-radius: 999px;
        padding: 7px 12px;
        font-size: 12px;
        font-weight: 700;
    }

    .empty-paket {
        text-align: center;
        padding: 28px 16px;
        color: #6b7280;
    }
</style>

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card detail-hero border-0 shadow-lg">
                <div class="card-body text-white p-4 p-md-5 position-relative">
                    <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-semibold mb-3">
                        Detail Kursus
                    </span>
                    <h3 class="fw-bold mb-2" style="font-family:'Space Grotesk', sans-serif;">
                        {{ $kursus->name }}
                    </h3>
                    <p class="mb-0 opacity-8">
                        Lihat informasi lengkap kursus dan pilih paket belajar yang paling sesuai.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- DETAIL KURSUS --}}
        <div class="col-lg-8 mb-4">
            <div class="card detail-card">
                <div class="card-body p-4 p-md-5">

                    <div class="course-icon-box">
                        <i class="fas fa-book-open"></i>
                    </div>

                    <h3 class="course-title">{{ $kursus->name }}</h3>

                    <p class="course-desc">
                        {{ $kursus->deskripsi }}
                    </p>

                    <div class="info-box">
                        <div class="info-label">Instruktur</div>
                        <div class="info-value">
                            {{ $kursus->instruktur->name ?? '-' }}
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- PAKET --}}
        <div class="col-lg-4">
            <div class="card detail-card">
                <div class="card-body p-4">
                    <h5 class="section-title">Pilih Paket</h5>

                    @forelse($kursus->pakets as $paket)
                        <div class="paket-card">
                            <div class="paket-header">
                                <div class="paket-name">
                                    {{ $paket->jenis }}
                                </div>
                                <div class="paket-price">
                                    Rp {{ number_format($paket->harga, 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="paket-desc">
                                Paket {{ $paket->jenis }} untuk kursus {{ $kursus->name }}.
                            </div>

                            <a href="{{ route('siswa.form-pendaftaran', ['paket_id' => $paket->id]) }}"
                               class="btn btn-outline-primary w-100">
                                <i class="fas fa-check-circle me-2"></i>Pilih Paket
                            </a>
                        </div>
                    @empty
                        <div class="empty-paket">
                            <i class="fas fa-box-open mb-2" style="font-size: 22px;"></i>
                            <div>Belum ada paket tersedia.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</div>
@endsection