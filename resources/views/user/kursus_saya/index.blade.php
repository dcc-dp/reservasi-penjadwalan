@extends('layouts.siswa.siswa')
@section('title', 'Kursus Saya')

@section('content')


<div class="container-fluid py-4">

    <div class="row mb-4">
        <div class="col-12">
            <div class="card my-course-hero border-0 shadow-lg">
                <div class="card-body text-white p-4 p-md-5 position-relative">
                    <h3 class="fw-bold mb-2" style="font-family:'Space Grotesk', sans-serif;">
                        Kursus Saya
                    </h3>
                    <p class="mb-0 opacity-8">
                        Daftar kursus yang sudah kamu ambil dan sedang kamu ikuti.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @forelse($kursusSaya as $item)
            @php
                $status = $item->pembayaran->status ?? 'belum';
            @endphp

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card my-course-card">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-primary">
                                {{ $item->paket->jenis ?? 'Paket' }}
                            </span>

                            @if($status == 'selesai')
                                <span class="status-badge status-success">Aktif</span>
                            @elseif($status == 'proses')
                                <span class="status-badge status-warning">Menunggu</span>
                            @else
                                <span class="status-badge status-danger">Belum Bayar</span>
                            @endif
                        </div>

                        <h5 class="fw-bold mb-2">{{ $item->kursus->name ?? '-' }}</h5>

                        <div class="mb-3">
                            <div class="meta-label">Instruktur</div>
                            <div class="meta-value">{{ $item->kursus?->instruktur?->name ?? '-' }}</div>
                        </div>

                        <div class="mb-3">
                            <div class="meta-label">Jumlah Jadwal</div>
                            <div class="meta-value">{{ $item->jadwals->count() }} Pertemuan</div>
                        </div>

                        <div class="mb-4">
                            <div class="meta-label">Ruangan</div>
                            <div class="meta-value">{{ $item->ruangan ?? '-' }}</div>
                        </div>

                        <a href="{{ route('siswa.jadwal') }}" class="btn btn-primary w-100">
                            Lihat Jadwal
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-graduation-cap fa-2x text-primary mb-3"></i>
                        <h5 class="fw-bold">Belum ada kursus yang diambil</h5>
                        <p class="text-muted mb-0">Silakan pilih kursus terlebih dahulu.</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection