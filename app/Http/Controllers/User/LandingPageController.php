<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {

        return view('user.landingpage');
    }
    public function about()
    {

        return view('user.about');
    }
    public function benefit()
    {

        return view('user.benefit');
    }

     public function pakets()
    {

        return view('user.pakets');
    }
}
