<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\User;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {

        return view('user.pages.home');
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
        $pakets = Paket::all();
        return view('user.pakets', compact('pakets'));
    }
}
