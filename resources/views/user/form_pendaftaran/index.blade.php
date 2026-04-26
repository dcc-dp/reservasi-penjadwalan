@extends('layouts.siswa.siswa')

@section('title', 'Form Pendaftaran')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card reservasi-form-hero border-0 shadow-lg">
                <div class="card-body text-white p-4 p-md-5 position-relative">
                    <h3 class="reservasi-form-title mb-2">Form Pendaftaran</h3>
                    <p class="reservasi-form-subtitle mb-0">
                        Lengkapi data pendaftaran kursus dan pilih jadwal belajarmu.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card reservasi-form-card">
                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('form-pendaftaran.store') }}" method="POST">
                        @csrf

                        {{-- INFO PAKET --}}
                        @if($paketDipilih)
                            <div class="info-box mb-4">
                                <div class="info-label">Paket Dipilih</div>
                                <div class="info-value mb-1">{{ $paketDipilih->jenis }}</div>
                                <div class="payment-total">
                                    Rp {{ number_format($paketDipilih->harga, 0, ',', '.') }}
                                </div>

                                <input type="hidden" name="id_paket" value="{{ $paketDipilih->id }}">
                            </div>
                        @endif

                        {{-- USER --}}
                        <div class="mb-3">
                            <label class="form-label reservasi-label">User</label>
                            <input type="text" class="form-control reservasi-input" value="{{ $user->name }}" readonly>
                            <input type="hidden" name="id_user" value="{{ $user->id }}">
                        </div>

                        {{-- KURSUS --}}
                        <div class="mb-4">
                            <label class="form-label reservasi-label">Kursus</label>
                            <input
                                type="text"
                                class="form-control reservasi-input"
                                value="{{ $kursus ? ($kursus->name ?? $kursus->nama_kursus ?? 'Kursus belum tersedia') : 'Kursus belum tersedia' }}"
                                readonly
                            >
                            <input type="hidden" name="id_kursus" value="{{ $kursus ? $kursus->id : '' }}">
                        </div>

                        {{-- JADWAL --}}
                        <div class="jadwal-block mb-4">
                            <h5 class="jadwal-block-title mb-3">
                                <i class="fas fa-calendar-alt me-2 text-primary"></i>
                                Jadwal Belajar
                            </h5>

                            {{-- HARI PERTAMA --}}
                            <div class="jadwal-item-box mb-3">
                                <h6 class="fw-bold mb-3">Hari Pertama</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label reservasi-label">Tanggal</label>
                                        <input type="date" name="hari1" class="form-control reservasi-input" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label reservasi-label">Jam</label>
                                        <input type="time" name="jam1" class="form-control reservasi-input" required>
                                    </div>
                                </div>
                            </div>

                            {{-- HARI KEDUA --}}
                            <div class="jadwal-item-box">
                                <h6 class="fw-bold mb-3">Hari Kedua</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label reservasi-label">Tanggal</label>
                                        <input type="date" name="hari2" class="form-control reservasi-input" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label reservasi-label">Jam</label>
                                        <input type="time" name="jam2" class="form-control reservasi-input" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- JUMLAH PERTEMUAN --}}
                        <div class="reservasi-price-box mb-4">
                            <strong>15 Pertemuan</strong>
                        </div>

                        {{-- BUTTON --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg reservasi-submit-btn">
                                <i class="fas fa-paper-plane me-2"></i>
                                Kirim Pendaftaran
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection