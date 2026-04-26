@extends('layouts.instruktur.instruktur')

@section('title', 'Kursus Saya')

@section('content')
<div class="container-fluid py-4">

    <div class="card instruktur-page-hero border-0 shadow-lg mb-4">
        <div class="card-body p-4">
            <span class="instruktur-hero-badge mb-2">Kursus Saya</span>
            <h4 class="instruktur-hero-title mb-1">Daftar Kursus yang Kamu Ajar</h4>
            <p class="instruktur-hero-subtitle mb-0">
                Pantau kursus, paket, dan materi yang terhubung dengan kursus kamu.
            </p>
        </div>
    </div>

    <div class="row">
        @forelse($kursus as $item)
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card instruktur-content-card h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="instruktur-card-icon mb-3">
                            <i class="ni ni-books"></i>
                        </div>

                        <h5 class="fw-bold mb-2">{{ $item->name }}</h5>
                        <p class="text-muted text-sm mb-3">
                            {{ $item->deskripsi ?? 'Belum ada deskripsi.' }}
                        </p>

                        <h6 class="fw-bold mb-2">Paket</h6>

                        @forelse($item->pakets as $paket)
                            <div class="instruktur-mini-box mb-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold">{{ $paket->jenis }}</span>
                                    <span class="text-warning fw-bold">
                                        Rp{{ number_format($paket->harga, 0, ',', '.') }}
                                    </span>
                                </div>

                                <small class="text-muted">
                                    {{ $paket->materis->count() }} materi
                                </small>
                            </div>
                        @empty
                            <p class="text-muted text-sm mb-0">Belum ada paket.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card border-0 shadow-sm instruktur-panel-card">
                    <div class="card-body text-center py-5">
                        <div class="instruktur-empty-icon mb-3">
                            <i class="ni ni-books"></i>
                        </div>
                        <h5>Belum ada kursus</h5>
                        <p class="text-muted mb-0">Kamu belum memiliki kursus yang diajarkan.</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection