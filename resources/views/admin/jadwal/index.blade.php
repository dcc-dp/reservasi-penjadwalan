@extends('layouts.user_type.auth')

@section('content')
<div class="container-fluid py-4">
    @if(session('success'))
        <div class="alert alert-success text-white">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow border-0">
        <div class="card-header pb-0">
            <h5 class="mb-0">Daftar Jadwal</h5>
        </div>

        <div class="card-body px-0 pt-3 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead class="bg-light">
                        <tr class="text-center">
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Siswa</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kursus</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ruangan</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Jadwal</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reservasis as $index => $res)
                        <tr class="text-center align-middle">
                            <td>
                                <span class="text-sm font-weight-bold">{{ $index + 1 }}</span>
                            </td>
                            <td>
                                <span class="text-sm font-weight-bold">{{ $res->user->name ?? '-' }}</span>
                            </td>
                            <td>
                                <span class="text-sm font-weight-bold">{{ $res->kursus->name ?? '-' }}</span>
                            </td>
                            <td>
                                <span class="text-sm font-weight-bold">{{ $res->ruangan ?? '-' }}</span>
                            </td>
                            <td>
                                <span class="text-sm font-weight-bold">{{ $res->jadwals->count() }} pertemuan</span>
                            </td>
                            <td>
                                <button type="button"
                                        class="btn btn-info btn-sm mb-0 detailBtn"
                                        data-id="{{ $res->id }}">
                                    Detail
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Belum ada data jadwal.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" id="modalContent">
            <!-- isi dari ajax -->
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).on('click', '.detailBtn', function () {
    let id = $(this).data('id');

    $.ajax({
        url: "{{ route('kursus.jadwal.detail', ':id') }}".replace(':id', id),
        type: "GET",
        success: function (response) {
            $('#modalContent').html(response);
            let modal = new bootstrap.Modal(document.getElementById('detailModal'));
            modal.show();
        },
        error: function (xhr) {
            console.log(xhr.responseText);
            alert('Gagal memuat detail jadwal.');
        }
    });
});
</script>
@endpush