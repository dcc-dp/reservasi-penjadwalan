<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use Illuminate\Http\Request;

class KursusController extends Controller
{
    // Menampilkan daftar kursus
    public function index()
    {
        $kursusList = Kursus::with(['instruktur', 'paket'])->get();
        return view('kursus.index', compact('kursusList'));
    }

    // Hapus kursus
    public function destroy(Kursus $kursus)
    {
        $kursus->delete();
        return redirect()->route('kursus.index')->with('success', 'Kursus berhasil dihapus.');
    }
}
