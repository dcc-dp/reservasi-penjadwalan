@extends('layouts.user_type.auth')

@section('content')
<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Edit Paket') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">

                <form action="{{ route('paket.update', $paket->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="id_materi">ID Materi</label>
                        <input type="text" class="form-control @error('id_materi') is-invalid @enderror"
                               id="id_materi" name="id_materi"
                               value="{{ old('id_materi', $paket->id_materi) }}">
                        @error('id_materi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="jenis">Jenis</label>
                        <select class="form-control @error('jenis') is-invalid @enderror" id="jenis" name="jenis">
                            <option value="Regular" {{ old('jenis', $paket->jenis) == 'Regular' ? 'selected' : '' }}>Regular</option>
                            <option value="VIP" {{ old('jenis', $paket->jenis) == 'VIP' ? 'selected' : '' }}>VIP</option>
                        </select>
                        @error('jenis')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control @error('harga') is-invalid @enderror"
                               id="harga" name="harga"
                               value="{{ old('harga', $paket->harga) }}">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('paket.index') }}"
                           class="btn bg-secondary text-white mx-4 btn-md mt-4 mb-4">Batal</a>
                        <button type="submit"
                                class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Simpan Perubahan' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
