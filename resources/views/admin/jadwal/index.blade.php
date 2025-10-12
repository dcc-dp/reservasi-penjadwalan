@extends('layouts.user_type.auth')

@section('content')

    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">

                    <div class="card mb-4">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h6>Daftar Jadwal</h6>
                            <a href="{{ route('jadwal.create') }}" class="btn btn-sm btn-primary">+ Tambah Jadwal</a>
                        </div>

                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="ps-3">User</th>
                                            <th>Kursus</th>
                                            <th>Tanggal</th>
                                            <th>Hari</th>
                                            <th>Jam</th>
                                            <th>Ruangan</th>
                                            <th>Pertemuan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jadwals as $item)
                                            <tr>
                                                <td class="ps-3">{{ $item->user->name ?? '-' }}</td>
                                                <td>{{ $item->kursus->name ?? '-' }}</td>
                                                <td>{{ $item->tanggal ?? '-' }}</td>
                                                <td>{{ $item->hari ?? '-' }}</td>
                                                <td>{{ $item->jam ?? '-' }}</td>
                                                <td>{{ $item->ruangan ?? '-' }}</td>
                                                <td>{{ $item->pertemuan ?? '-' }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('jadwal.edit', $item->id) }}" class="btn btn-sm btn-warning" class="btn btn-sm btn-warning me-1">Edit</a>
                                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#hapusJadwal{{ $item->id }}">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="hapusJadwal{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="hapusJadwalLabel{{ $item->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="hapusJadwalLabel{{ $item->id }}">
                                                                Hapus Jadwal</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <h5 class="text-primary text-center">
                                                                    Yakin ingin menghapus jadwal pada tanggal
                                                                    <strong>{{ $item->tanggal }}</strong>?
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
