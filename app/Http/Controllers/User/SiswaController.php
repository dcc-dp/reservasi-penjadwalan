<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $reservasiList = Reservasi::with(['pembayaran', 'kursus'])
            ->where('id_user', $user->id)
            ->get();

        // Total semua reservasi
        $totalReservasi = $reservasiList->count();

        // Kursus aktif (status pembayaran selesai)
        $aktif = $reservasiList->filter(function ($r) {
            return $r->pembayaran && $r->pembayaran->status == 'selesai';
        })->count();

        // Menunggu pembayaran
        $menunggu = $reservasiList->filter(function ($r) {
            return $r->pembayaran && $r->pembayaran->status == 'proses';
        })->count();

        // Ambil 1 jadwal terdekat (atau terbaru)
        $jadwalTerdekat = $reservasiList->first();

        return view('user.dashboard.dashboard', compact(
            'user',
            'totalReservasi',
            'aktif',
            'menunggu',
            'jadwalTerdekat'
        ));
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
