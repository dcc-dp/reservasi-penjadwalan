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
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Daftar Kursus</h4>
            <a href="{{ route('kursus.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Kursus
            </a>
        </div>
    
        @if (session('success'))
            <div class="alert alert-success m-3">{{ session('success') }}</div>
        @endif

        <div class="card-body px-0 pt-0 pb-2">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center">
                        <th>Kursus</th>
                        <th>Instruktur</th>
                        <th>Paket</th>
                        <th>Deskripsi</th>
                        <th width="150px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kursusList as $kursus)
                        <tr class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center">
                            <td>{{ $kursus->name }}</td>
                            <td>{{ $kursus->instruktur->user->name ?? '-' }}</td>
                            <td>{{ $kursus->paket->materi->Judul ?? '-' }}</td>
                            <td>{{ $kursus->deskripsi ?? '-' }}</td>
                            <td class="text-center">
                                <form action="{{ route('kursus.destroy', $kursus->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin hapus kursus ini?')" 
                                        class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                📭 Belum ada kursus yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
