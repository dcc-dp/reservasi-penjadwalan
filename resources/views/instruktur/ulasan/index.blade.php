@extends('layouts.instruktur.instruktur')

@section('title', 'Ulasan Siswa')

@section('content')
<div class="container-fluid py-4">

    <div class="card instruktur-page-hero border-0 shadow-lg mb-4">
        <div class="card-body p-4">
            <span class="instruktur-hero-badge mb-2">Ulasan Siswa</span>
            <h4 class="instruktur-hero-title mb-1">Feedback dari Siswa</h4>
            <p class="instruktur-hero-subtitle mb-0">
                Lihat ulasan siswa terhadap kursus yang kamu ajar.
            </p>
        </div>
    </div>

    <div class="row">
        @forelse($ulasans as $ulasan)
            <div class="col-lg-6 mb-4">
                <div class="card instruktur-content-card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="fw-bold mb-1">{{ $ulasan->kursus->name ?? '-' }}</h5>
                                <p class="text-muted text-sm mb-0">
                                    Oleh: {{ $ulasan->user->name ?? '-' }}
                                </p>
                            </div>

                            <span class="badge badge-instruktur">
                                Rating {{ $ulasan->rating }}/5
                            </span>
                        </div>

                        <div class="instruktur-rating mb-3">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $ulasan->rating)
                                    ⭐
                                @else
                                    ☆
                                @endif
                            @endfor
                        </div>

                        <div class="instruktur-review-box">
                            {{ $ulasan->ulasan ?? 'Tidak ada komentar.' }}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card border-0 shadow-sm instruktur-panel-card">
                    <div class="card-body text-center py-5">
                        <div class="instruktur-empty-icon mb-3">
                            <i class="ni ni-like-2"></i>
                        </div>
                        <h5>Belum ada ulasan</h5>
                        <p class="text-muted mb-0">Belum ada siswa yang memberi ulasan.</p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection