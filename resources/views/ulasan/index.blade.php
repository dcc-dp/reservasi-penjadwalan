@extends('layouts.user_type.auth')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">📋 Daftar Ulasan</h1>

    <!-- Alert sukses -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Wrapper tabel -->
    <div class="bg-white shadow rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm text-gray-700">
                <thead class="bg-gray-100 border-b text-gray-900 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">No</th>
                        <th class="px-6 py-3">User</th>
                        <th class="px-6 py-3">Kursus</th>
                        <th class="px-6 py-3">Rating</th>
                        <th class="px-6 py-3">Ulasan</th>
                        <th class="px-6 py-3">Tanggal</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($ulasan->count() > 0)
                        @foreach ($ulasan as $index => $item)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium">
                                {{ $ulasan->firstItem() + $index }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->user->name ?? 'User Tidak Diketahui' }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->kursus->nama ?? 'Kursus Tidak Diketahui' }}
                            </td>
                            <td class="px-6 py-4 text-yellow-500 font-semibold">
                                ⭐ {{ $item->rating }}
                            </td>
                            <td class="px-6 py-4 max-w-xs truncate">
                                {{ $item->ulasan }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->created_at->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                <form action="{{ route('ulasan.destroy', $item->id) }}" method="POST" 
                                      onsubmit="return confirm('Yakin hapus ulasan ini?');" 
                                      class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg shadow-sm transition">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="h-40">
                                <div class="flex items-center justify-center h-full text-gray-500">
                                    📭 Belum ada ulasan.
                                </div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $ulasan->links() }}
    </div>
</div>
@endsection
