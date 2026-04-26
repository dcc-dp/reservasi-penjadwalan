<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanSiswaController extends Controller
{
    public function index()
    {
        $reservasis = Reservasi::with(['kursus', 'pembayaran'])
            ->where('id_user', Auth::id())
            ->get();

        $ulasans = Ulasan::with('kursus')
            ->where('id_user', Auth::id())
            ->latest()
            ->get();

        return view('user.ulasan.index', compact('reservasis', 'ulasans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_kursus' => 'required|exists:kursuses,id',
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'nullable|string',
        ]);

        Ulasan::updateOrCreate(
            [
                'id_user' => Auth::id(),
                'id_kursus' => $request->id_kursus,
            ],
            [
                'rating' => $request->rating,
                'ulasan' => $request->ulasan,
            ]
        );

        return redirect()->route('siswa.ulasan.index')
            ->with('success', 'Ulasan berhasil disimpan.');
    }
}