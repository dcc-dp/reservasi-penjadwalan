<?php

namespace App\Http\Controllers\Instruktur;

use App\Http\Controllers\Controller;
use App\Models\Kursus;
use Illuminate\Support\Facades\Auth;

class KursusInstrukturController extends Controller
{
    public function index()
    {
        $kursus = Kursus::with(['pakets.materis'])
            ->where('id_instruktur', Auth::id())
            ->get();

        return view('instruktur.kursus.index', compact('kursus'));
    }
}