@extends('layouts.instruktur.instruktur')

@section('title', 'Jadwal Mengajar')

@section('content')
<div class="container-fluid py-4">

    <div class="card instruktur-page-hero border-0 shadow-lg mb-4">
        <div class="card-body p-4">
            <span class="instruktur-hero-badge mb-2">Jadwal Mengajar</span>
            <h4 class="instruktur-hero-title mb-1">Daftar Jadwal Mengajar</h4>
            <p class="instruktur-hero-subtitle mb-0">
                Lihat jadwal siswa yang mengambil kursus yang kamu ajar.
            </p>
        </div>
    </div>

    <div class="card instruktur-panel-card border-0 shadow-sm">
        <div class="card-body px-0 pt-3 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead class="bg-light">
                        <tr class="text-center">
                            <th>Siswa</th>
                            <th>Kursus</th>
                            <th>Paket</th>
                            <th>Jadwal</th>
                            <th>Tempat</th>
                            <th>Status Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservasis as $res)
                            <tr class="text-center align-middle">
                                <td class="fw-bold">{{ $res->user->name ?? '-' }}</td>
                                <td>{{ $res->kursus->name ?? '-' }}</td>
                                <td>
                                    <span class="badge badge-instruktur">
                                        {{ $res->paket->jenis ?? '-' }}
                                    </span>
                                </td>
                                <td>
                                    @forelse($res->jadwals as $jadwal)
                                        <div class="instruktur-schedule-pill mb-1">
                                            {{ $jadwal->hari }} | {{ $jadwal->jam }}
                                        </div>
                                    @empty
                                        <span class="text-muted">-</span>
                                    @endforelse
                                </td>
                                <td>{{ $res->ruangan ?? '-' }}</td>
                                <td>
                                    @if($res->pembayaran && in_array($res->pembayaran->status, ['settlement', 'capture']))
                                        <span class="badge bg-success">Lunas</span>
                                    @elseif($res->pembayaran && $res->pembayaran->status == 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @else
                                        <span class="badge bg-secondary">
                                            {{ $res->pembayaran->status ?? 'Belum Ada' }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    Belum ada jadwal mengajar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection