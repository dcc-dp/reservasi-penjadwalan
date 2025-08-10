@extends('layouts.user_type.auth')

@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="mb-0">Daftar Materi</h6>
                                <a href="{{ route('user.create') }}"
                                    class="btn btn-primary btn-sm ms-2 justify-content-end">
                                    <i class="fas fa-plus me-1"></i> Add New
                                </a>

                            </div>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th width="500px"
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Nama </th>
                                            <th width="500px"
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Email</th>
                                            <th width="200px"
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Role</th>
                                            <th width="600px"
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                No Telp</th>
                                            <th width="100px"
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Jenis Kelamin</th>
                                            <th width="700px"
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                                Alamat</th>
                                            <th width="200px"
                                                class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-end">
                                                Action</th>
                                        </tr>
                                    </thead>

                                    @foreach ($user as $index => $y)
                                        <tbody>

                                            <tr class="text-sm">
                                        
                                                <td class="px-4">{{ $y->name }}</td>
                                                <td class="px-4">{{ $y->email }}</td>
                                                <td class="px-4">{{ $y->role }}</td>
                                                <td class="px-4">{{ $y->notelp }}</td>
                                                <td class="px-4 ">{{ $y->jk }}</td>
                                                <td class="px-4">{{ $y->alamat }}</td>

                                                <td>

                                                    <a href="{{ route('user.edit', $y->id) }}"
                                                        class= "btn btn bg-gradient-secondary" data-bs-toggle="tooltip">edit
                                                    </a>
                                                     {{-- Tombol Hapus --}}
                                                    <button type="button" class="btn btn bg-gradient-danger btn-block mb-3"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#Hapusdata{{ $y->id }}">Hapus</button>

                                                </td>
                                            </tr>

                                        </tbody>

                                     {{-- Modal Hapus --}}
                                        <div class="col-md-4">
                                            <div class="modal fade" id="Hapusdata{{ $y->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                                <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <form action="{{ route('user.destroy', $y->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal-header">
                                                                <h6 class="modal-title" id="modal-title-notification">Hapus Data</h6>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="py-3 text-center">
                                                                    <i class="ni ni-bell-55 ni-3x"></i>
                                                                    <h6 class="text-gradient text-danger mt-4">
                                                                        Yakin ingin menghapus
                                                                        <strong>{{ $y->name }}</strong>?
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Ya,
                                                                    Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
