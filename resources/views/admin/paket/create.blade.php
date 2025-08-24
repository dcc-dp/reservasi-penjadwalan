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
                <label for="id_materi" class="form-label">ID Materi</label>
                <input type="text" name="id_materi" id="id_materi" 
                       class="form-control" 
                       value="{{ old('id_materi') }}" required>
              </div>

              <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <select name="jenis" id="jenis" class="form-control" required>
                  <option value="">-- Pilih Jenis --</option>
                  <option value="Regular">Regular</option>
                  <option value="VIP">VIP</option>
                </select>
              </div>

              <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" id="harga" 
                       class="form-control" 
                       value="{{ old('harga') }}" required>
              </div>

              <div class="d-flex">
                <button type="submit" class="btn btn-primary me-2">Simpan</button>
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
