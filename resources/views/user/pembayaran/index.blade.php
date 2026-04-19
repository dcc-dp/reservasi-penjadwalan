@extends('layouts.siswa.siswa')
@section('title', 'Pembayaran')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card payment-hero border-0 shadow-lg">
                <div class="card-body text-white p-4 p-md-5 position-relative">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <div>
                            <h4 class="payment-title mb-2">Pembayaran Saya</h4>
                            <p class="payment-subtitle mb-0">
                                Lihat status pembayaran kursus yang sudah kamu ambil.
                            </p>
                        </div>

                        <div class="mt-3 mt-md-0">
                            <span class="badge bg-white text-primary px-3 py-2 rounded-pill fw-semibold">
                                {{ $pembayaranList->count() }} Pembayaran
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
            <div class="card payment-table-card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table payment-table align-items-center mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>Kursus</th>
                                    <th>Paket</th>
                                    <th>Metode Bayar</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($pembayaranList as $item)
                                    <tr class="text-center">
                                        <td>
                                            <div class="text-start">
                                                <div class="payment-course-name">
                                                    {{ $item->reservasi?->kursus?->name ?? '-' }}
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <span class="payment-course-meta">
                                                {{ $item->reservasi?->paket?->jenis ?? '-' }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="payment-method">
                                                {{ $item->metode_bayar ?? '-' }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="payment-total">
                                                Rp {{ number_format($item->total ?? 0, 0, ',', '.') }}
                                            </span>
                                        </td>

                                        <td>
                                            @if($item->status == 'selesai')
                                                <span class="badge badge-soft-success">Lunas</span>
                                            @elseif($item->status == 'proses')
                                                <span class="badge badge-soft-warning">Menunggu</span>
                                            @else
                                                <span class="badge badge-soft-danger">Gagal</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="payment-empty-state">
                                                <div class="payment-empty-icon">
                                                    <i class="fas fa-credit-card"></i>
                                                </div>
                                                <div class="payment-empty-title">Belum ada pembayaran</div>
                                                <div class="payment-empty-text">
                                                    Data pembayaran kamu akan muncul di sini.
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