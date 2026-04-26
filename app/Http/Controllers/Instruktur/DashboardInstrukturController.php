<?php

namespace App\Http\Controllers\Instruktur;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use App\Models\Reservasi;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Auth;

class DashboardInstrukturController extends Controller
{
    public function index()
    {
        $totalKursus = Kursus::where('id_instruktur', Auth::id())->count();

        $totalSiswa = Reservasi::whereHas('kursus', function ($query) {
            $query->where('id_instruktur', Auth::id());
        })->count();

        $totalUlasan = Ulasan::whereHas('kursus', function ($query) {
            $query->where('id_instruktur', Auth::id());
        })->count();

        return view('instruktur.dashboard', compact(
            'totalKursus',
            'totalSiswa',
            'totalUlasan'
        ));
    }
}