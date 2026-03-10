@extends('layouts.user_type.auth')

@section('content')
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Daftar Jadwal</h5>
            <a href="{{ route('jadwal.create') }}" class="btn btn-sm btn-primary">+ Tambah Jadwal</a>
        </div>
        <div class="card-body table-responsive">
            <table class="table align-items-center mb-0">
                <thead class="thead-light">
                    <tr class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center">
                        <th>User</th>
                        <th>Kursus</th>
                        <th>Total Jadwal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservasis as $res)
                    <tr class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center">
                        <td>{{ $res->user->name }}</td>
                        <td>{{ $res->kursus->name }}</td>
                        <td>{{ $res->jadwal->count() }} pertemuan</td>
                        <td>
                            <button class="btn btn-sm btn-info detailBtn" data-id="{{ $res->id }}">Detail</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" id="modalContent">
            <!-- konten akan di-load via AJAX -->
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){

    $('.detailBtn').click(function() {
        var id = $(this).data('id');

        $.ajax({
            url: '/admin/kursus/jadwal/detail/' + id,
            type: 'GET',
            success: function(res) {

                $('#modalContent').html(res);

                var modal = new bootstrap.Modal(document.getElementById('detailModal'));
                modal.show();

            }
        });

    });

});
</script>
@endpush