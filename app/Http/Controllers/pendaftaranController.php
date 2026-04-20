<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Kursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $paketDipilih = null;
        $kursus = null;

        if ($request->filled('paket_id')) {
            $paketDipilih = Paket::find($request->paket_id);

            if ($paketDipilih) {
                $kursus = $paketDipilih->kursus;
            }
        }

        $paketList = Paket::with('kursus')->get();
        $kursusList = Kursus::with('pakets')->get();

        return view('user.form_pendaftaran.index', compact(
            'user',
            'paketDipilih',
            'kursus',
            'paketList',
            'kursusList'
        ));
    }
}