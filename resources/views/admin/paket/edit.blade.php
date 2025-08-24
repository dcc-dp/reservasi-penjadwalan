@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-lg-6 mx-auto">

        <div class="card">
          <div class="card-header">
            <h5 class="mb-0">Edit Paket</h5>
          </div>
          <div class="card-body">
            <form action="{{ route('paket.update', $paket->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="id_materi" class="form-label">Materi</label>
                <input type="text" name="id_materi" class="form-control" value="{{ $paket->id_materi }}" required>
              </div>

              <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <select name="jenis" class="form-control" required>
                  <option value="Regular" {{ $paket->jenis == 'Regular' ? 'selected' : '' }}>Regular</option>
                  <option value="VIP" {{ $paket->jenis == 'VIP' ? 'selected' : '' }}>VIP</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ $paket->harga }}" required>
              </div>

              <div class="d-flex justify-content-end">
                <a href="{{ route('paket.index') }}" class="btn btn-secondary me-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</main>

@endsection
