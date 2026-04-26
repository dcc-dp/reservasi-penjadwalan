<?php

namespace App\Http\Controllers\Instruktur;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use Illuminate\Support\Facades\Auth;

class JadwalInstrukturController extends Controller
{
    public function index()
    {
        $reservasis = Reservasi::with(['user', 'kursus', 'paket', 'jadwals', 'pembayaran'])
            ->whereHas('kursus', function ($query) {
                $query->where('id_instruktur', Auth::id());
            })
            ->get();

        return view('instruktur.jadwal.index', compact('reservasis'));
    }
}