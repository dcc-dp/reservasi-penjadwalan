<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    public function index()
    {
        // Ambil semua ulasan beserta user yang membuatnya
        $ulasan = Ulasan::with('user')
                        ->orderBy('created_at', 'desc')
                        ->get();

        // Kirim ke view khusus ulasan
        return view('ulasan.index', compact('ulasan'));
    }

}
