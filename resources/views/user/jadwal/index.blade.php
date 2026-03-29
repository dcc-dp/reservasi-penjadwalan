@extends('layouts.siswa')

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-gradient-info text-white p-4 shadow">
                <h4 class="mb-1">📅 Jadwal Belajar</h4>
                <p class="mb-0">Lihat jadwal kursus dan sesi belajarmu</p>
            </div>
        </div>
    </div>

    {{-- Jadwal Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-header pb-0">
                    <h6 class="mb-0">Jadwal Aktif</h6>
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
                                        Instruktur
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Hari
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Jam
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- Dummy data dulu --}}
                                <tr>
                                    <td>
                                        <h6 class="mb-0 text-sm">Matematika Dasar</h6>
                                    </td>
                                    <td>
                                        <span class="text-sm">Budi Santoso</span>
                                    </td>
                                    <td>
                                        <span class="text-sm">Senin</span>
                                    </td>
                                    <td>
                                        <span class="text-sm">15:00 - 16:30</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-sm bg-gradient-success">
                                            Aktif
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <h6 class="mb-0 text-sm">Bahasa Inggris</h6>
                                    </td>
                                    <td>
                                        <span class="text-sm">Siti Aminah</span>
                                    </td>
                                    <td>
                                        <span class="text-sm">Rabu</span>
                                    </td>
                                    <td>
                                        <span class="text-sm">13:00 - 14:30</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-sm bg-gradient-warning">
                                            Menunggu
                                        </span>
                                    </td>
                                </tr>

                                {{-- Jika belum ada jadwal --}}
                                {{-- 
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        Belum ada jadwal terdaftar
                                    </td>
                                </tr>
                                --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
