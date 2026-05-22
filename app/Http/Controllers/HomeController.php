<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kursus;
use App\Models\Materi;
use App\Models\Paket;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function home()
    // {
    //     return redirect('admin.dashboard');
    // }
    public function dashboard()
    {
        $paket = Paket::count();
        $materi = Materi::count();
        $kursus = Kursus::count();
        $jadwal = Jadwal::count();

        $pembayaran = Pembayaran::sum('total');

        return view('dashboard', compact(
            'paket',
            'materi',
            'kursus',
            'jadwal',
            'pembayaran'
        ));
    }
}
