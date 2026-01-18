@extends('layouts.user_type.auth')

@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">

                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data Reservasi Kursus</h6>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">

                            <table class="table align-items-center mb-0">
                                <thead class="thead-light">
                                    <tr class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        <th>Nama Pengguna</th>
                                        <th>Nama Kursus</th>
                                        <th>Hari ke-1</th>
                                        <th>Jam</th>
                                        <th>Hari ke-2</th>
                                        <th>Jam ke-2</th>
                                        <th>Status Pembayaran</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($reserv as $item)
                                        <tr class="text-sm">
                                            <td>{{ $item->user->name ?? '-' }}</td>
                                            <td>{{ $item->kursus->nama_kursus ?? '-' }}</td>
                                            <td>{{ $item->hari1 }}</td>
                                            <td>{{ $item->jam1 }}</td>
                                            <td>{{ $item->hari2 ?? '-' }}</td>
                                            <td>{{ $item->jam2 ?? '-' }}</td>

                                            {{-- STATUS PEMBAYARAN --}}
                                            <td>
                                                @if (!$item->pembayaran)
                                                    <span class="badge bg-secondary">Belum Ada Data</span>

                                                @elseif ($item->pembayaran->status == 'menunggu')
                                                    <span class="badge bg-danger">Belum Bayar</span>

                                                @elseif ($item->pembayaran->status == 'dibayar')
                                                    <span class="badge bg-warning text-dark">
                                                        Menunggu Konfirmasi
                                                    </span>

                                                @elseif ($item->pembayaran->status == 'dikonfirmasi')
                                                    <span class="badge bg-success">Dikonfirmasi</span>
                                                @endif
                                            </td>

                                            {{-- AKSI --}}
                                            <td class="text-center">

                                                {{-- Tombol Konfirmasi Admin --}}
                                                @if ($item->pembayaran && $item->pembayaran->status == 'dibayar')
                                                    <form
                                                        action="{{ route('admin.pembayaran.konfirmasi', $item->pembayaran->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-sm btn-success mb-1">
                                                            Konfirmasi
                                                        </button>
                                                    </form>
                                                @endif

                                                {{-- Tombol Hapus --}}
                                                <button type="button"
                                                    class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#hapusReservasi{{ $item->id }}">
                                                    Hapus
                                                </button>
                                            </td>
                                        </tr>

                                        {{-- MODAL HAPUS --}}
                                        <div class="modal fade"
                                            id="hapusReservasi{{ $item->id }}"
                                            tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Reservasi</h5>
                                                        <button type="button"
                                                            class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <div class="modal-body text-center">
                                                        <p>Yakin ingin menghapus reservasi ini?</p>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <form action="{{ route('reservasi.destroy', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="button"
                                                                class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                Batal
                                                            </button>
                                                            <button type="submit"
                                                                class="btn btn-danger">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center text-muted py-4">
                                                Belum ada data reservasi
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
</main>
@endsection
