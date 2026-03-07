@extends('layouts.user_type.auth')

@section('content')

<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg">

    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">

                <div class="card mb-4">

                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Daftar Paket</h6>

                        <a href="{{ route('paket.create') }}" class="btn btn-sm btn-primary">
                            ADD NEW
                        </a>
                    </div>


                    <div class="card-body px-0 pt-0 pb-2">

                        <div class="table-responsive p-0">

                            <table class="table align-items-center mb-0">

                                <thead>
                                    <tr class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 text-center">
                                        <th>Nama Kursus</th>
                                        <th>Jenis</th>
                                        <th>Harga</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>


                                <tbody>

                                    @foreach ($data as $item)

                                        <tr class="text-center">

                                            <td class="ps-3">
                                                {{ optional($item->kursus)->name ?? '-' }}
                                            </td>

                                            <td>
                                                {{ $item->jenis }}
                                            </td>

                                            <td>
                                                Rp{{ number_format($item->harga,0,',','.') }}
                                            </td>

                                            <td>

                                                <a href="{{ route('paket.edit',$item->id) }}"
                                                   class="btn btn-sm bg-gradient-secondary me-1">
                                                    Edit
                                                </a>

                                                <button
                                                    type="button"
                                                    class="btn btn-sm btn-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#hapusPaket{{ $item->id }}">
                                                    Hapus
                                                </button>

                                            </td>

                                        </tr>


                                        <!-- Modal Hapus -->
                                        <div class="modal fade"
                                             id="hapusPaket{{ $item->id }}"
                                             tabindex="-1"
                                             aria-hidden="true">

                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Hapus Paket</h5>

                                                        <button type="button"
                                                                class="btn-close"
                                                                data-bs-dismiss="modal">
                                                        </button>
                                                    </div>


                                                    <div class="modal-body text-center">

                                                        <p>
                                                            Yakin ingin menghapus paket
                                                            <strong>{{ $item->jenis }}</strong>
                                                            dari kursus
                                                            <strong>{{ $item->kursus->name }}</strong> ?
                                                        </p>

                                                    </div>


                                                    <div class="modal-footer">

                                                        <form action="{{ route('paket.destroy',$item->id) }}" method="POST">
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