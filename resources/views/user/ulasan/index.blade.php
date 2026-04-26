@extends('layouts.siswa.siswa')

@section('title', 'Ulasan')

@section('content')
<div class="container-fluid py-4">

    {{-- HEADER --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card review-hero border-0 shadow-lg">
                <div class="card-body text-white p-4 p-md-5 position-relative">
                    <h3 class="review-title mb-2">Ulasan Saya</h3>
                    <p class="review-subtitle mb-0">
                        Berikan penilaian terhadap kursus yang sudah kamu ikuti.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        {{-- FORM ULASAN --}}
        <div class="col-lg-5 mb-4">
            <div class="card review-card">
                <div class="card-body p-4 p-md-5">
                    <h5 class="section-title mb-4">
                        <i class="fas fa-star text-primary me-2"></i>
                        Beri Ulasan
                    </h5>

                    <form action="{{ route('siswa.ulasan.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label review-label">Pilih Kursus</label>
                            <select name="id_kursus" class="form-select review-input" required>
                                <option value="">Pilih Kursus</option>

                                @foreach($reservasis as $reservasi)
                                    @if($reservasi->pembayaran && in_array($reservasi->pembayaran->status, ['selesai', 'settlement', 'capture']))
                                        <option value="{{ $reservasi->id_kursus }}">
                                            {{ $reservasi->kursus->name ?? '-' }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label review-label">Rating</label>
                            <select name="rating" class="form-select review-input" required>
                                <option value="">Pilih Rating</option>
                                <option value="5">★★★★★ - Sangat Baik</option>
                                <option value="4">★★★★☆ - Baik</option>
                                <option value="3">★★★☆☆ - Cukup</option>
                                <option value="2">★★☆☆☆ - Kurang</option>
                                <option value="1">★☆☆☆☆ - Buruk</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label review-label">Ulasan</label>
                            <textarea
                                name="ulasan"
                                class="form-control review-input"
                                rows="5"
                                placeholder="Tulis pengalaman belajar kamu..."
                            ></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 review-submit-btn">
                            <i class="fas fa-paper-plane me-2"></i>
                            Simpan Ulasan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- RIWAYAT ULASAN --}}
        <div class="col-lg-7 mb-4">
            <div class="card review-card">
                <div class="card-body p-4 p-md-5">
                    <h5 class="section-title mb-4">
                        <i class="fas fa-clock-rotate-left text-primary me-2"></i>
                        Riwayat Ulasan Saya
                    </h5>

                    @forelse($ulasans as $ulasan)
                        <div class="review-item">
                            <div class="d-flex justify-content-between align-items-start gap-3 flex-wrap">
                                <div>
                                    <h6 class="review-course mb-1">
                                        {{ $ulasan->kursus->name ?? '-' }}
                                    </h6>

                                    <div class="review-stars mb-2">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $ulasan->rating)
                                                <i class="fas fa-star"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    </div>
                                </div>

                                <span class="badge badge-soft-primary">
                                    {{ $ulasan->rating }}/5
                                </span>
                            </div>

                            <p class="review-text mb-0">
                                {{ $ulasan->ulasan ?? 'Tidak ada komentar.' }}
                            </p>
                        </div>
                    @empty
                        <div class="review-empty">
                            <div class="review-empty-icon">
                                <i class="fas fa-comment-dots"></i>
                            </div>
                            <h6 class="fw-bold mb-2">Belum ada ulasan</h6>
                            <p class="text-muted mb-0">
                                Ulasan yang kamu berikan akan muncul di sini.
                            </p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

</div>
@endsection