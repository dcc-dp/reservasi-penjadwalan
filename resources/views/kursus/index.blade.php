@extends('layouts.user_type.auth')

@section('content')

@push('styles')
<link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush


<div class="container mt-4">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Daftar Kursus</h4>

            <a href="{{ route('kursus.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Kursus
            </a>
        </div>


        @if(session('success'))
            <div class="alert alert-success m-3">
                {{ session('success') }}
            </div>
        @endif


        <div class="card-body px-0 pt-0 pb-2">

            <div class="table-responsive p-0">

                <table class="table align-items-center mb-0">

                    <thead>
                        <tr class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                            <th>Kursus</th>
                            <th>Instruktur</th>
                            <th>Paket</th>
                            <th>Deskripsi</th>
                            <th width="150px">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($kursusList as $kursus)

                            <tr class="text-center">

                                <td class="text-sm font-weight-bold">
                                    {{ $kursus->name }}
                                </td>

                                <td>
                                    {{ $kursus->instruktur->name ?? '-' }}
                                </td>

                                <td>

                                    @forelse($kursus->pakets as $paket)

                                        <span class="badge bg-success me-1">
                                            {{ $paket->jenis }}
                                        </span>

                                        <span class="badge bg-info text-dark me-1">
                                            Rp{{ number_format($paket->harga,0,',','.') }}
                                        </span>

                                        <br>

                                    @empty

                                        <span class="text-muted">
                                            Belum ada paket
                                        </span>

                                    @endforelse

                                </td>
                                <td style="max-width:200px">
                                    {{ $kursus->deskripsi ?? '-' }}
                                </td>
                                <td>
                                    <a href="{{ route('kursus.edit', $kursus->id) }}" 
                                    class="btn btn-warning btn-sm">edit
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('kursus.destroy', $kursus->id) }}" 
                                        method="POST" 
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            onclick="return confirm('Yakin hapus kursus ini?')" 
                                            class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>delete
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

</div>

@endsection