<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Controller;
use App\Models\Kursus;
use App\Models\Paket;
use App\Models\User;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $kursus = Kursus::all();
        $paket = Paket::latest()->take(3)->get();

        return view('user.pages.home', compact('kursus', 'paket'));
    }
    public function about()
    {

        return view('user.pages.about');
    }
    public function benefit()
    {

        return view('user.pages.benefit');
    }

    public function pakets()
    {
        $pakets = Paket::latest()->take(3)->get();
        return view('user.pages.pakets', compact('pakets'));
    }
}
