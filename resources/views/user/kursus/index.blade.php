@extends('layouts.siswa.siswa')
@section('title', 'Kursus')

@section('content')

<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card course-hero border-0 shadow-lg">
                <div class="card-body text-white p-4 p-md-5 position-relative">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                        <div>
                            <h3 class="fw-bold mb-2" style="font-family:'Space Grotesk', sans-serif;">
                                Semua Kursus
                            </h3>
                            <p class="mb-0 opacity-8">
                                Pilih kursus terbaik sesuai minat dan kebutuhan belajarmu.
                            </p>
                        </div>

                        <div class="mt-3 mt-md-0">
                            <span class="page-count-badge">
                                Total: {{ $kursus->count() }} Kursus
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- LIST KURSUS --}}
    <div class="row">
        @forelse ($kursus as $item)
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card course-card">

                    <div class="course-cover">
                        <i class="fas fa-book-open"></i>
                    </div>

                    <div class="card-body p-4">
                        <div class="course-title">
                            {{ $item->name }}
                        </div>

                        <p class="course-desc">
                            {{ \Illuminate\Support\Str::limit($item->deskripsi, 110) }}
                        </p>

                        <div class="mb-3">
                            <div class="meta-label">Instruktur</div>
                            <div class="meta-value">
                                {{ $item->instruktur->name ?? '-' }}
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="meta-label">Paket Tersedia</div>

                            @forelse($item->pakets as $paket)
                                <div class="paket-badge">
                                    {{ $paket->jenis }}
                                    <span class="price-text">
                                        • Rp {{ number_format($paket->harga, 0, ',', '.') }}
                                    </span>
                                </div>
                            @empty
                                <div class="text-muted small">
                                    Belum ada paket tersedia
                                </div>
                            @endforelse
                        </div>

                        <div class="d-grid">
                            <a href="{{ route('siswa.kursus.show', $item->id) }}" class="btn btn-primary">
                                <i class="fas fa-eye me-2"></i>Lihat Detail
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Belum ada kursus</h5>
                        <p class="text-muted mb-0">
                            Data kursus belum tersedia saat ini.
                        </p>
                    </div>
                </div>
            </div>
        @endforelse
    </div>

    {{-- PAGINATION --}}
    @if(method_exists($kursus, 'links'))
        <div class="mt-3">
            {{ $kursus->links() }}
        </div>
    @endif

</div>

@endsection