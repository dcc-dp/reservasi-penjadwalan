@extends('modern.layouts.app')

@section('title', 'Jadwal')

@section('page-title', 'Jadwal')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- SUCCESS --}}
    @if(session('success'))

        <div
            class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-700">

            {{ session('success') }}

        </div>

    @endif

    {{-- TABLE CARD --}}
    <div class="bg-white rounded-2xl border border-zinc-200 overflow-hidden shadow-sm mx-8">

        {{-- TOPBAR --}}
        <div class="px-10 py-5 border-b border-zinc-200">

            <div class="flex items-center justify-between">

                {{-- SEARCH --}}
                <div class="relative w-72 ml-4">

                    <input
                        type="text"
                        placeholder="Cari jadwal..."
                        class="w-full rounded-xl border border-zinc-200 bg-zinc-50 px-4 py-2 pl-10 text-sm focus:outline-none focus:ring-2 focus:ring-zinc-900">

                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-zinc-400 text-xs"></i>

                </div>

                {{-- TITLE --}}
                <div>

                    <h2 class="text-lg font-bold text-zinc-900">
                        Daftar Jadwal
                    </h2>

                </div>

            </div>

        </div>

        {{-- TABLE --}}
        <div class="overflow-x-auto">

            <table class="w-full">

                {{-- HEAD --}}
                <thead class="bg-zinc-50">

                    <tr>

                        <th class="text-center px-5 py-3 text-sm font-semibold text-zinc-600">
                            No
                        </th>

                        <th class="text-center px-5 py-3 text-sm font-semibold text-zinc-600">
                            Nama Siswa
                        </th>

                        <th class="text-center px-5 py-3 text-sm font-semibold text-zinc-600">
                            Kursus
                        </th>

                       

                        <th class="text-center px-5 py-3 text-sm font-semibold text-zinc-600">
                            Total Jadwal
                        </th>

                       

                    </tr>

                </thead>

                {{-- BODY --}}
                <tbody>

                    @forelse ($reservasis as $index => $res)

                        <tr
                            class="border-t border-zinc-100 hover:bg-zinc-50 transition">

                            {{-- NO --}}
                            <td class="px-5 py-4 text-center text-zinc-500">

                                {{ $index + 1 }}

                            </td>

                            {{-- SISWA --}}
                            <td class="px-5 py-4 text-center">

                                <div>

                                    <h5 class="font-semibold text-zinc-800">

                                        {{ $res->user->name ?? '-' }}

                                    </h5>

                                    <p class="text-xs text-zinc-500 mt-1">

                                        Siswa Kursus

                                    </p>

                                </div>

                            </td>

                            {{-- KURSUS --}}
                            <td class="px-5 py-4 text-center text-sm text-zinc-700">

                                {{ $res->kursus->name ?? '-' }}

                            </td>

                            {{-- TOTAL --}}
                            <td class="px-5 py-4 text-center text-sm font-medium text-zinc-700">

                                {{ $res->jadwals->count() }} Pertemuan

                            </td>


                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="px-5 py-10 text-center text-zinc-500">

                                Belum ada data jadwal.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

{{-- MODAL --}}
<div
    id="detailModal"
    class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 p-4">

    <div
        class="w-full max-w-3xl rounded-2xl bg-white shadow-xl overflow-hidden">

        <div id="modalContent">

            {{-- AJAX CONTENT --}}

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

        url: "{{ route('admin.jadwal.detail', ':id') }}".replace(':id', id),

        type: "GET",

        success: function (response) {

            $('#modalContent').html(response);

            $('#detailModal').removeClass('hidden').addClass('flex');

        },

        error: function () {

            alert('Gagal memuat detail jadwal.');

        }

    });

});

$(document).on('click', '#detailModal', function (e) {

    if (e.target.id === 'detailModal') {

        $('#detailModal').addClass('hidden').removeClass('flex');

    }

});

</script>

@endpush

