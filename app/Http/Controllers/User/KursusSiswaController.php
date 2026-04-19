<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kursus;

class KursusSiswaController extends Controller
{
    public function index()
    {
        $kursus = Kursus::with(['instruktur', 'pakets'])
            ->latest()
            ->paginate(6);

        return view('user.kursus.index', compact('kursus'));
    }

    public function show($id)
    {
        $kursus = Kursus::with(['instruktur', 'pakets'])->findOrFail($id);

        return view('user.kursus.show', compact('kursus'));
    }
}