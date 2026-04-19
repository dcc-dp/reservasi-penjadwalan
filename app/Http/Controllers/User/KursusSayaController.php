<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use Illuminate\Support\Facades\Auth;

class KursusSayaController extends Controller
{
    public function index()
    {
        $kursusSaya = Reservasi::with(['kursus', 'paket', 'pembayaran', 'jadwal'])
            ->where('id_user', Auth::id())
            ->latest()
            ->get();

        return view('user.kursus_saya.index', compact('kursusSaya'));
    }
}