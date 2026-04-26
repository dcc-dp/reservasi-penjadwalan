@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-lg-6 mx-auto">

                <div class="card">

                    <div class="card-header">
                        <h5 class="mb-0">Tambah Paket</h5>
                    </div>
                        <div class="card-body">
                            <form action="{{ route('paket.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Kursus</label>
                                    <select name="kursus_id" class="form-control" required>
                                        <option value="">-- Pilih Kursus --</option>

                                        @foreach($kursus as $k)
                                            <option value="{{ $k->id }}" 
                                                {{ old('kursus_id') == $k->id ? 'selected' : '' }}>
                                                {{ $k->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Jenis Paket</label>
                                    <select name="jenis" class="form-control" required>

                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="Regular">Regular</option>
                                        <option value="VIP">VIP</option>
                                        <option value="VVIP">VVIP</option>

                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Harga</label>
                                    <input
                                        type="number"
                                        name="harga"
                                        class="form-control"
                                        value="{{ old('harga') }}"
                                        required
                                    >
                                </div>

                                <div class="d-flex">
                                    <button class="btn btn-primary me-2">Simpan</button>
                                    <a href="{{ route('paket.index') }}" class="btn btn-secondary">Kembali</a>
                                </div>

                            </form>
                        </div>
                </div>

            </div>
        </div>

    </div>
</main>

@endsection