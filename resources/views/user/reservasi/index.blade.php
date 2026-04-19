@extends('layouts.siswa.siswa')
@section('title', 'Reservasi')

@section('content')


<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card reservasi-hero border-0 shadow-lg">
                <div class="card-body text-white p-4 p-md-5 position-relative">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <div>
                            <h4 class="reservasi-title mb-2">Data Reservasi</h4>
                            <p class="reservasi-subtitle mb-0">
                                Lihat kursus yang sudah kamu reservasi beserta jadwal dan status pembayarannya.
                            </p>
                        </div>

                        <div class="mt-3 mt-md-0">
                            <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-semibold">
                                {{ $reservasiList->count() }} Reservasi
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- TABLE --}}
    <div class="row">
        <div class="col-12">
            <div class="card reservasi-table-card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table reservasi-table align-items-center mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>Kursus</th>
                                    <th>Jadwal</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($reservasiList as $item)
                                    <tr class="text-center">

                                        {{-- Kursus --}}
                                        <td>
                                            <div class="course-box">
                                                <div class="course-name">
                                                    {{ $item->kursus->name ?? '-' }}
                                                </div>
                                                <div class="course-meta">
                                                    Paket:
                                                    {{ $item->paket->jenis ?? 'Belum dipilih' }}
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Jadwal --}}
                                        <td>
                                            @if($item->jadwal && $item->jadwal->count())
                                                @foreach($item->jadwal as $jadwal)
                                                    <div class="jadwal-card">
                                                        <div class="jadwal-main">
                                                            <div class="jadwal-day">
                                                                {{ $jadwal->hari }}
                                                            </div>
                                                            <div class="jadwal-time">
                                                                <i class="fas fa-clock me-1"></i>
                                                                {{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }}
                                                            </div>
                                                        </div>
                                                        <div class="jadwal-info">
                                                            Pertemuan {{ $jadwal->pertemuan }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <span class="text-muted small">
                                                    <i class="fas fa-calendar-times me-1"></i>
                                                    Belum ada jadwal
                                                </span>
                                            @endif
                                        </td>

                                        {{-- Status Pembayaran --}}
                                        <td>
                                            @if(!$item->pembayaran)
                                                <span class="badge-soft-secondary">
                                                    Belum Ada Data
                                                </span>

                                            @elseif($item->pembayaran->status == 'proses')
                                                <span class="badge-soft-warning">
                                                    Menunggu Konfirmasi
                                                </span>

                                            @elseif($item->pembayaran->status == 'selesai')
                                                <span class="badge-soft-success">
                                                    Lunas
                                                </span>

                                            @elseif($item->pembayaran->status == 'gagal')
                                                <span class="badge-soft-danger">
                                                    Gagal
                                                </span>
                                            @endif
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3">
                                            <div class="empty-state">
                                                <div class="empty-icon">
                                                    <i class="fas fa-bookmark"></i>
                                                </div>
                                                <div class="empty-title">Belum ada reservasi</div>
                                                <div class="empty-text">
                                                    Silakan pilih kursus dan lakukan reservasi terlebih dahulu.
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection