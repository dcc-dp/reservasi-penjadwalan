@extends('layouts.siswa.siswa')
@section('title', 'Reservasi')
@section('content')
<div class="container-fluid py-4">

    
    {{-- Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header pb-0">
                    <h6 class="mb-0">Data Reservasi</h6>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                    <th>Kursus</th>
                                    <th>Hari 1</th>
                                    <th>Hari 2</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($reservasiList as $item)
                                <tr class="text-center">
                                    <td>
                                        <h6 class="mb-0 text-sm">
                                            {{ $item->kursus->name ?? '-' }}
                                        </h6>
                                    </td>

                                    <td>
                                        <span class="text-sm">
                                            {{ $item->hari1 }} <br>
                                            {{ $item->jam1 }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="text-sm">
                                            {{ $item->hari2 ?? '-' }} <br>
                                            {{ $item->jam2 ?? '-' }}
                                        </span>
                                    </td>

                                    <td>
                                        @if(!$item->pembayaran)
                                            <span class="badge bg-secondary">
                                                Belum Ada Data
                                            </span>

                                        @elseif($item->pembayaran->status == 'proses')
                                            <span class="badge bg-warning text-dark">
                                                Menunggu Konfirmasi
                                            </span>

                                        @elseif($item->pembayaran->status == 'selesai')
                                            <span class="badge bg-success">
                                                Lunas
                                            </span>

                                        @elseif($item->pembayaran->status == 'gagal')
                                            <span class="badge bg-danger">
                                                Gagal
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">
                                        Belum ada reservasi
                                    </td>
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
@endsection