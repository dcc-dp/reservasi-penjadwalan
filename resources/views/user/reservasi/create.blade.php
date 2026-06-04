@extends('layouts.siswa.siswa')

@section('title', 'Reservasi Kursus')

@section('content')

    <div class="container-fluid py-4">

        {{-- HEADER --}}
        <div class="row mb-4">
            <div class="col-12">
                <div class="card reservasi-form-hero border-0 shadow-lg">
                    <div class="card-body text-white p-4 p-md-5 position-relative">
                        <h3 class="reservasi-form-title mb-2">Reservasi Kursus</h3>
                        <p class="reservasi-form-subtitle mb-0">
                            Pilih kursus, paket, jadwal belajar, dan tempat belajar kamu.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- FORM --}}
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card reservasi-form-card">
                    <div class="card-body p-4 p-md-5">

                        <form action="{{ route('siswa.reservasi.store') }}" method="POST">
                            @csrf

                            {{-- JIKA SISWA DATANG DARI DETAIL KURSUS / PILIH PAKET --}}
                            @if (isset($selectedPaket) && $selectedPaket)

                                <input type="hidden" name="id_kursus" value="{{ $selectedPaket->kursus_id }}">
                                <input type="hidden" name="id_paket" value="{{ $selectedPaket->id }}">

                                {{-- KURSUS OTOMATIS --}}
                                <div class="mb-4">
                                    <label class="form-label reservasi-label">
                                        <i class="fas fa-book me-2 text-primary"></i>
                                        Kursus
                                    </label>

                                    <input type="text" class="form-control reservasi-input"
                                        value="{{ $selectedPaket->kursus->name ?? '-' }}" readonly>
                                </div>

                                {{-- PAKET OTOMATIS --}}
                                <div class="mb-4">
                                    <label class="form-label reservasi-label">
                                        <i class="fas fa-layer-group me-2 text-primary"></i>
                                        Paket Kursus
                                    </label>

                                    <input type="text" class="form-control reservasi-input"
                                        value="{{ $selectedPaket->jenis }}" readonly>
                                </div>

                                {{-- HARGA OTOMATIS --}}
                                <div class="mb-4">
                                    <label class="form-label reservasi-label">
                                        <i class="fas fa-money-bill-wave me-2 text-primary"></i>
                                        Harga
                                    </label>

                                    <div class="reservasi-price-box">
                                        Rp {{ number_format($selectedPaket->harga, 0, ',', '.') }}
                                    </div>
                                </div>
                            @else
                                {{-- JIKA SISWA BUKA FORM RESERVASI LANGSUNG --}}
                                {{-- PILIH KURSUS --}}
                                <div class="mb-4">
                                    <label class="form-label reservasi-label">
                                        <i class="fas fa-book me-2 text-primary"></i>
                                        Kursus
                                    </label>

                                    <select name="id_kursus" id="kursusSelect" class="form-select reservasi-input" required>
                                        <option value="" disabled selected>Pilih kursus</option>

                                        @foreach ($kursusList as $k)
                                            <option value="{{ $k->id }}">
                                                {{ $k->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- PILIH PAKET --}}
                                <div class="mb-4">
                                    <label class="form-label reservasi-label">
                                        <i class="fas fa-layer-group me-2 text-primary"></i>
                                        Paket Kursus
                                    </label>

                                    <select name="id_paket" id="paketSelect" class="form-select reservasi-input" required>
                                        <option value="" disabled selected>Pilih paket</option>

                                        @foreach ($paketList as $p)
                                            <option value="{{ $p->id }}" data-harga="{{ $p->harga }}"
                                                data-kursus="{{ $p->kursus_id }}" hidden>
                                                {{ $p->jenis }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- HARGA --}}
                                <div class="mb-4">
                                    <label class="form-label reservasi-label">
                                        <i class="fas fa-money-bill-wave me-2 text-primary"></i>
                                        Harga
                                    </label>

                                    <div id="hargaText" class="reservasi-price-box">
                                        Pilih paket terlebih dahulu
                                    </div>
                                </div>

                            @endif

                            {{-- JADWAL --}}
                            <div class="jadwal-block mb-4">
                                <h5 class="jadwal-block-title mb-3">
                                    <i class="fas fa-calendar-alt me-2 text-primary"></i>
                                    Preferensi Jadwal Belajar
                                </h5>

                                <div class="alert alert-light border mb-4">
                                    <small>
                                        Pilih hari dan jam yang paling sesuai. Kursus terdiri dari
                                        <strong>15 pertemuan</strong>
                                    </small>
                                </div>

                                {{-- Tanggal Mulai --}}
                                <div class="mb-4">
                                    <label class="form-label reservasi-label">
                                        Tanggal Mulai Belajar
                                    </label>
                                    <input type="date" name="tanggal_mulai" class="form-control reservasi-input"
                                        required>
                                </div>

                                {{-- Hari Belajar --}}
                                <div class="mb-4">
                                    <label class="form-label reservasi-label">
                                        Pilih Hari Belajar
                                    </label>

                                    <div class="row">
                                        <div class="col-md-3 col-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hari[]"
                                                    value="Senin">
                                                <label class="form-check-label">Senin</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hari[]"
                                                    value="Selasa">
                                                <label class="form-check-label">Selasa</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hari[]"
                                                    value="Rabu">
                                                <label class="form-check-label">Rabu</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hari[]"
                                                    value="Kamis">
                                                <label class="form-check-label">Kamis</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hari[]"
                                                    value="Jumat">
                                                <label class="form-check-label">Jumat</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hari[]"
                                                    value="Sabtu">
                                                <label class="form-check-label">Sabtu</label>
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="hari[]"
                                                    value="Minggu">
                                                <label class="form-check-label">Minggu</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Jam --}}
                                <div>
                                    <label class="form-label reservasi-label">
                                        Jam Belajar
                                    </label>
                                    <input type="time" name="jam" class="form-control reservasi-input" required>
                                </div>
                            </div>

                            {{-- BUTTON --}}
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg reservasi-submit-btn">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Kirim Reservasi
                                </button>
                            </div>

                            <div class="text-center mt-3">
                                <a href="{{ url()->previous() }}" class="reservasi-back-link">
                                    Kembali
                                </a>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- SCRIPT HANYA DIPAKAI JIKA FORM DIBUKA MANUAL --}}
    @if (!isset($selectedPaket) || !$selectedPaket)
        <script>
            const kursusSelect = document.getElementById('kursusSelect');
            const paketSelect = document.getElementById('paketSelect');
            const hargaText = document.getElementById('hargaText');

            kursusSelect.addEventListener('change', function() {
                let kursusID = this.value;

                Array.from(paketSelect.options).forEach(option => {
                    if (!option.value) return;

                    if (option.dataset.kursus == kursusID) {
                        option.hidden = false;
                    } else {
                        option.hidden = true;
                    }
                });

                paketSelect.value = '';
                hargaText.innerHTML = 'Pilih paket terlebih dahulu';
            });

            paketSelect.addEventListener('change', function() {
                let harga = this.options[this.selectedIndex].dataset.harga;

                if (!harga) {
                    hargaText.innerHTML = 'Pilih paket terlebih dahulu';
                    return;
                }

                let format = new Intl.NumberFormat('id-ID').format(harga);
                hargaText.innerHTML = 'Rp ' + format;
            });
        </script>
    @endif

@endsection
