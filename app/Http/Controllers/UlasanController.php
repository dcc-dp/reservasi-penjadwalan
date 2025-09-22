<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    
    public function index()
    {
        // Ambil ulasan beserta relasi user & kursus
        $ulasan = Ulasan::with(['user', 'kursus'])
                        ->orderBy('created_at', 'desc')
                        ->paginate(10); // pakai pagination biar lebih ringan

        // Kirim ke view ulasan admin
        return view('ulasan.index', compact('ulasan'));
    }

    public function destroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();

        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil dihapus.');
    }
}
