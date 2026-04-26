@extends('layouts.user_type.auth')

@section('content')
<div class="container-fluid py-4">
    <div class="card shadow border-0">
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0">Create Materi</h6>
        </div>

        <div class="card-body pt-4 p-3">
            <form action="{{ route('materi.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="paket_id">Pilih Paket</label>
                    <select name="paket_id" id="paket_id" class="form-control @error('paket_id') is-invalid @enderror">
                        <option value="">-- Pilih Paket --</option>
                        @foreach ($pakets as $paket)
                            <option value="{{ $paket->id }}" {{ old('paket_id') == $paket->id ? 'selected' : '' }}>
                                {{ $paket->kursus->name ?? '-' }} - {{ $paket->jenis }} - Rp{{ number_format($paket->harga, 0, ',', '.') }}
                            </option>
                        @endforeach
                    </select>
                    @error('paket_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="judul">Nama Materi</label>
                    <input type="text"
                           class="form-control @error('judul') is-invalid @enderror"
                           id="judul"
                           name="judul"
                           value="{{ old('judul') }}">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="deskripsi">Deskripsi Materi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                              id="deskripsi"
                              name="deskripsi"
                              rows="4">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('materi.index') }}" class="btn bg-secondary text-white mx-4 btn-md mt-4 mb-4">
                        Batal
                    </a>
                    <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection