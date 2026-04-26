<?php

namespace App\Http\Controllers\Instruktur;

use App\Http\Controllers\Controller;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Auth;

class UlasanInstrukturController extends Controller
{
    public function index()
    {
        $ulasans = Ulasan::with(['user', 'kursus'])
            ->whereHas('kursus', function ($query) {
                $query->where('id_instruktur', Auth::id());
            })
            ->latest()
            ->get();

        return view('instruktur.ulasan.index', compact('ulasans'));
    }
}