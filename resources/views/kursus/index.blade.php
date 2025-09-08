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

    <a href="{{ route('kursus.create') }}" class="btn btn-primary mb-3">Tambah Kursus</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kursus</th>
                    <th>Instruktur</th>
                    <th>Paket</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kursusList as $kursus)
                    <tr>
                        <td>{{ $kursus->name }}</td>
                        <td>{{ $kursus->instruktur->user->name ?? '-' }}</td>
                        <td>{{ $kursus->paket->materi->Judul ?? '-' }}</td>
                        <td>{{ $kursus->deskripsi }}</td>
                        <td>
                            <a href="{{ route('kursus.edit', $kursus->id) }}" class="btn btn-warning">Edit</a>
                            
                            <form action="{{ route('kursus.destroy', $kursus->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>
@endsection
