@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">

        <div class="card mb-4">
          <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h6>Reservasi kursus</h6>
            <a href="{{ ('/reservasi') }}" class="btn btn-sm btn-primary">+ Tambah Paket</a>
          </div>

          {{-- <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="ps-3">Nama 
                        
                        Materi</th>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                  <tr>
                    <td class="ps-3">{{ $item->id_materi }}</td>
                    <td>{{ $item->jenis }}</td>
                    <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                    <td class="text-center">
                      <a href="{{ route('paket.edit', $item->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                      <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusPaket{{ $item->id }}">
                        Hapus
                      </button>
                    </td>
                  </tr>

                  <!-- Modal Hapus -->
                  <div class="modal fade" id="hapusPaket{{ $item->id }}" tabindex="-1" aria-labelledby="hapusPaketLabel{{ $item->id }}" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="hapusPaketLabel{{ $item->id }}">Hapus Paket</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  <form action="{{ route('paket.destroy', $item->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <h5 class="text-primary text-center">
                                          Yakin ingin menghapus paket jenis <strong>{{ $item->jenis }}</strong>?
                                      </h5>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                  <button type="submit" class="btn btn-danger">Hapus</button>
                              </div>
                                  </form>
                          </div>
                      </div>
                  </div>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div> --}}
        </div>

      </div>
    </div>
  </div>
</main>

@endsection
