<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\User;
use App\Models\Paket;
use Illuminate\Http\Request;

class pendaftaranController extends Controller
{
    public function index(Request $request)
    {
        // data untuk form
        $users  = User::all();
        $kursus = Kursus::all();

        // ambil paket dari URL (?paket_id=1)
        $paketDipilih = null;
        if ($request->has('paket_id')) {
            $paketDipilih = Paket::find($request->paket_id);
        }

        return view(
            'user.form_pendaftaran.index',
            compact('users', 'kursus', 'paketDipilih')
        );
    }
}
