<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class PembayaranSiswaController extends Controller
{
    public function index()
    {
        $pembayaranList = Pembayaran::with(['reservasi.kursus', 'reservasi.paket'])
            ->whereHas('reservasi', function ($query) {
                $query->where('id_user', Auth::id());
            })
            ->latest()
            ->get();
    
        return view('user.pembayaran.index', compact('pembayaranList'));
    }
}