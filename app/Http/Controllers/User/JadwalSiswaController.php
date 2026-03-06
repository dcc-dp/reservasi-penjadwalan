<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalSiswaController extends Controller
{
    public function index()
    {
        $reservasiList = Reservasi::with([
        'jadwal',
        'kursus.instruktur.user',
        'pembayaran'
    ])
    ->where('id_user', Auth::id())
    ->get();

        return view('user.jadwal.index', compact('reservasiList'));
    }
}
