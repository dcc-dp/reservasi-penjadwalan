@extends('layouts.siswa.siswa')
@section('title', 'Jadwal')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card schedule-hero border-0 shadow-lg">
                <div class="card-body text-white p-4 p-md-5 position-relative">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <div>
                            <h4 class="schedule-title mb-2">Jadwal Kursus</h4>
                            <p class="schedule-subtitle mb-0">
                                Lihat semua jadwal belajar, instruktur, dan status kursus kamu di sini.
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
            <div class="card schedule-table-card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table schedule-table align-items-center mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>Kursus</th>
                                    <th>Instruktur</th>
                                    <th>Jadwal Belajar</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($reservasiList as $reservasi)
                                    <tr class="text-center">

                                        {{-- Kursus --}}
                                        <td>
                                            <div class="text-start">
                                                <div class="course-name">
                                                    {{ $reservasi->kursus->name ?? '-' }}
                                                </div>
                                                <div class="course-meta">
                                                    Paket:
                                                    {{ $reservasi->paket->jenis ?? 'Belum dipilih' }}
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Instruktur --}}
                                        <td>
                                            @php
                                                $instrukturName = $reservasi->kursus?->instruktur?->name ?? '-';
                                                $initial = $instrukturName !== '-' ? strtoupper(substr($instrukturName, 0, 1)) : '?';
                                            @endphp

                                            <div class="instructor-box">
                                                <div class="instructor-avatar">
                                                    {{ $initial }}
                                                </div>
                                                <div class="text-start">
                                                    <div class="fw-bold text-dark">
                                                        {{ $instrukturName }}
                                                    </div>
                                                    <small class="text-muted">
                                                        Instruktur
                                                    </small>
                                                </div>
                                            </div>
                                        </td>

                                        {{-- Jadwal --}}
                                        <td class="text-start">
                                            @if($reservasi->jadwals && $reservasi->jadwals->count())
                                                @foreach ($reservasi->jadwals as $jadwal)
                                                    <div class="jadwal-item">
                                                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                                                            <div class="jadwal-day">
                                                                {{ $jadwal->hari }}
                                                            </div>
                                                            <div class="jadwal-time">
                                                                <i class="fas fa-clock me-1"></i>
                                                                {{ \Carbon\Carbon::parse($jadwal->jam)->format('H:i') }}
                                                            </div>
                                                        </div>

                                                        <div class="jadwal-meta">
                                                            <div>Pertemuan {{ $jadwal->pertemuan }}</div>
                                                            <div>Ruangan: {{ $reservasi->ruangan ?? '-' }}</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="text-muted small">
                                                    <i class="fas fa-calendar-times me-1"></i>
                                                    Belum ditentukan
                                                </div>
                                            @endif
                                        </td>

                                        {{-- Status --}}
                                        <td>
                                            @php
                                                $status = $reservasi->pembayaran?->status ?? 'pending';
                                            @endphp

                                            @if (in_array($status, ['settlement', 'capture']))
                                                <span class="badge-soft-success">
                                                    Aktif
                                                </span>
                                            @elseif ($status === 'pending')
                                                <span class="badge-soft-warning">
                                                    Menunggu
                                                </span>
                                            @elseif ($status === 'expire')
                                                <span class="badge-soft-secondary">
                                                    Kedaluwarsa
                                                </span>
                                            @else
                                                <span class="badge-soft-danger">
                                                    Gagal
                                                </span>
                                            @endif
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
                                            <div class="empty-state">
                                                <div class="empty-icon">
                                                    <i class="fas fa-calendar-alt"></i>
                                                </div>
                                                <div class="empty-title">Belum ada jadwal kursus</div>
                                                <div class="empty-text">
                                                    Jadwal akan muncul setelah reservasi dan pembayaran diproses.
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