@extends('layouts.siswa')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-gradient-info text-white p-4 shadow">
                <h4 class="mb-1">Reservasi Saya</h4>
                <p class="mb-0"></p>
            </div>
        </div>
    </div>

    {{-- Jadwal Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header pb-0">
                    <h6 class="mb-0">Reservasi</h6>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-3">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Kursus
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Hari 1
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Hari 2
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- Dummy data dulu --}}
                                <tr>
                                    <td>
                                        <h6 class="mb-0 text-sm">Lorem</h6>
                                    </td>
                                    <td>
                                        <span class="text-sm">Senin <br>15:00 - 16:30</span>
                                    </td>
                                    <td>
                                        <span class="text-sm">Selasa <br>15:00 - 16:30</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
