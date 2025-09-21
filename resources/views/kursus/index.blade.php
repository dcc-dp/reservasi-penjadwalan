@extends('layouts.user_type.auth')

@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
        <!-- SweetAlert2 CDN -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endpush

<div class="container mt-5">
    <div class="card">
    <h2>Daftar Kursus</h2>
    <div class="container mt-5">

        <div class="d-flex justify-content-between align-items-center">
            <h6 class="mb-0">Daftar Kursus</h6>
            <a href="{{ route('kursus.create') }}" class="btn btn-primary btn-sm ms-2 justify-content-end">
                <i class="fas fa-plus me-1"></i> Add New
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="500px" class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Kursus
                        </th>
                        <th width="500px" class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                            Instruktur</th>
                        <th width="500px" class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Paket
                        </th>
                        <th width="500px" class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                            Deskripsi</th>
                        <th width="500px" class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kursusList as $kursus)
                        <tr class="text-sm">
                            <td>{{ $kursus->name }}</td>
                            <td>{{ $kursus->instruktur->user->name ?? '-' }}</td>
                            <td>{{ $kursus->paket->materi->Judul }}</td>
                            <td>{{ $kursus->deskripsi }}</td>
                            <td>
                                <a href="{{ route('kursus.edit', $kursus->id) }}" class= "btn btn bg-gradient-secondary"
                                    data-bs-toggle="tooltip">Edit</a>

                                <form action="{{ route('kursus.destroy', $kursus->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus?')" 
                                        class="btn btn bg-gradient-danger btn-block mb-3">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</div>
@endsection
