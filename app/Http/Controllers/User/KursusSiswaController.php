<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Kursus;

class KursusSiswaController extends Controller
{
    public function index()
    {
        $kursus = Kursus::latest();

        return view('user.kursus.index', compact('kursus'));
    }
}