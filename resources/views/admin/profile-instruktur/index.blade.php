@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">

        <div class="card mb-4">
          <div class="card-header pb-0 d-flex justify-content-between align-items-center">
            <h6>Daftar Profile Instruktur</h6>
            <a href="#" class="btn btn-sm btn-primary">+ Tambah Profile</a>
          </div>

          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="ps-3">User</th>
                    <th>Keahlian</th>
                    <th>Pengalaman</th>
                    <th>Bio</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($profiles as $profile)
                  <tr>
                     <td>{{ $profile->user_id }}</td>
                    <td>{{ $profile->keahlian }}</td>
                    <td>{{ $profile->pengalaman }}</td>
                    <td>{{ $profile->bio }}</td>
                    <td class="text-center">
                      <a href="#" class="btn btn-sm btn-warning me-1">Edit</a>
                      <button type="button" class="btn btn-sm btn-danger">
                        Hapus
                      </button>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="5" class="text-center">Belum ada data</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</main>

@endsection
