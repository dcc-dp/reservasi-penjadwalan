@extends('layouts.landingpage.landingPage')

@section('title', 'Reservasi Kursus')

@section('content')

<div class="container-fluid py-5  hero-header">
    <div class="card shadow-lg border-0 rounded-4 p-4 mx-5" style="margin-top: 100px">
        <h2 class="text-center text-success fw-bold mb-4">Formulir Reservasi Kursus</h2>

        {{-- Formulir --}}
        <form action="{{ route('siswa.reservasi.store') }}" method="POST">
            @csrf

            {{-- Pilih Paket Kursus --}}
            <div class="mb-4" style="ma">
                <label class="form-label fw-semibold">Pilih Paket Kursus</label>
                <select name="id_kursus" class="form-select" required>
                    <option value="" selected disabled>-- Pilih Paket --</option>
                    @foreach ($kursusList as $k)
                        <option value="{{ $k->id }}">
                            {{ $k->name }} - Rp {{ number_format($k->harga_normal, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Jadwal Pertama --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Hari Pertama <span class="text-danger">*</span></label>
                    <input type="date" name="hari1" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jam Pertama <span class="text-danger">*</span></label>
                    <input type="time" name="jam1" class="form-control" required>
                </div>
            </div>

            {{-- Jadwal Kedua (Opsional) --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Hari Kedua (Opsional)</label>
                    <input type="date" name="hari2" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Jam Kedua (Opsional)</label>
                    <input type="time" name="jam2" class="form-control">
                </div>
            </div>

            {{-- Tombol Kirim --}}
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-success rounded-pill py-2 fw-semibold">
                    <i class="bi bi-send me-2"></i> Kirim Reservasi
                </button>
            </div>

            {{-- Tombol Kembali --}}
            <div class="text-center mt-3">
                <a href="{{ url()->previous() }}" class="btn btn-link text-secondary">
                    <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                </a>
            </div>
        </form>
    </div>

    <footer class="text-center text-muted mt-5">
        &copy; {{ date('Y') }} Dipanegara Computer Club — Semua Hak Dilindungi.
    </footer>
</div>

@endsection
