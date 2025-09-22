@extends('layouts.user_type.auth')

@section('content')

    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    <div class="card mb-4">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h6>Daftar Profile Instruktur</h6>
                            <a href="{{ route('profile-instruktur.create') }}" class="btn btn-sm btn-primary">+ Tambah
                                Profile</a>
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
                                        @foreach ($profiles as $profile)
                                            <tr>
                                                <td class="ps-3">{{ $profile->user->name ?? '-' }}</td>
                                                <td>{{ $profile->keahlian }}</td>
                                                <td>{{ $profile->pengalaman }}</td>
                                                <td>{{ $profile->bio }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('profile-instruktur.edit', $profile->id) }}"
                                                        class="btn btn-sm btn-warning me-1">Edit</a>
                                                    <!-- Tombol Hapus -->
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#hapusProfile{{ $profile->id }}">
                                                        Hapus
                                                    </button>
                                                    <!-- Modal Hapus Profile -->
                                                    <div class="modal fade" id="hapusProfile{{ $profile->id }}" tabindex="-1"
                                                        aria-labelledby="hapusProfileLabel{{ $profile->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5"
                                                                        id="hapusProfileLabel{{ $profile->id }}">Hapus Profile
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('profile-instruktur.destroy', $profile->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <h5 class="text-primary text-center text-wrap" style="white-space: normal; word-break: break-word; overflow-wrap: anywhere;">
                                                                            Yakin ingin menghapus profile
                                                                            <strong>{{ $profile->user->name ?? '-' }}</strong>?
                                                                        </h5>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </td>
                                            </tr>
                                        @endforeach
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