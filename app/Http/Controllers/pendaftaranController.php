<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index(Request $request)
    {
        
        $user = Auth::user();

        // ambil paket dari URL
        $paketDipilih = Paket::findOrFail($request->paket_id);

        // ambil kursus berdasarkan paket
        // jika 1 paket = 1 kursus
        $kursus = Kursus::where('id_paket', $paketDipilih->id)->first();

        return view('user.form_pendaftaran.index', compact('user','paketDipilih', 'kursus'));
    }
}
