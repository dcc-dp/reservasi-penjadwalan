@extends('layouts.landingpage.landingPage')

@section('title', 'Form Pendaftaran')

@section('content')

<style>
    .form-card {
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        border: none;
    }
    .paket-box {
        background: linear-gradient(135deg, #0072ff, #00c6ff);
        color: #fff;
        border-radius: 16px;
        padding: 20px;
    }
    .paket-box h5 {
        margin-bottom: 5px;
    }
    .jumlah-pertemuan {
        background: #f0f8ff;
        border-radius: 10px;
        padding: 12px;
        text-align: center;
        font-weight: 600;
        margin-bottom: 20px;
    }
</style>

<div class="container-fluid py-5 hero-header bg-light"></div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">

            <div class="card form-card p-4">

                {{-- INFO PAKET --}}
                @if($paketDipilih)
                    <div class="paket-box mb-4 text-center">
                        <h5 class="fw-bold">
                            Paket Dipilih: {{ $paketDipilih->jenis }}
                        </h5>
                        <p class="mb-0">
                            Harga: <strong>Rp {{ number_format($paketDipilih->harga, 0, ',', '.') }}</strong>
                        </p>

                        <input type="hidden" name="id_paket" value="{{ $paketDipilih->id }}">
                    </div>
                @endif

                <h4 class="fw-bold text-center mb-4">
                    Form Pendaftaran Kursus
                </h4>

                <form action="{{ route('form-pendaftaran.store') }}" method="POST">
                    @csrf

                    {{-- USER --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">User</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                        <input type="hidden" name="id_user" value="{{ $user->id }}">
                    </div>

                    {{-- KURSUS --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Kursus</label>
                        <input type="text" class="form-control" 
                            value="{{ $kursus ? $kursus->nama_kursus : 'Kursus belum tersedia' }}" readonly>
                        <input type="hidden" name="id_kursus" 
                            value="{{ $kursus ? $kursus->id : '' }}">
                    </div>

                    <hr>

                    {{-- JADWAL 1 --}}
                    <h6 class="fw-bold mb-3">Hari Pertama</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="hari1" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jam</label>
                            <input type="time" name="jam1" class="form-control" required>
                        </div>
                    </div>

                    {{-- JADWAL 2 --}}
                    <h6 class="fw-bold mt-3 mb-3">Hari Kedua</h6>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="hari2" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label">Jam</label>
                            <input type="time" name="jam2" class="form-control" required>
                        </div>
                    </div>

                    {{-- JUMLAH PERTEMUAN --}}
                    <div class="jumlah-pertemuan">
                         <strong>15 pertemuan</strong>
                    </div>

                    {{-- SUBMIT --}}
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill">
                            Kirim Pendaftaran
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

@endsection
