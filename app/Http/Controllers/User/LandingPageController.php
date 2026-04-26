<?php

namespace App\Http\Controllers\User;
use App\Models\Paket;
use App\Models\Materi;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Instruktur_Profile;


class LandingPageController extends Controller
{
<<<<<<< HEAD
  public function index()
{
    $instrukturs = Instruktur_Profile::with('user')->get();
    return view('user.landingpage', data: compact(var_name: 'instrukturs'));
}
=======
    public function index()
    {

        return view('user.pages.home');
    }
>>>>>>> 35f2f9660757573f057bf74cf514e55c1afe271c
    public function about()
    {

        return view('user.pages.about');
    }
    public function benefit()
    {

        return view('user.pages.benefit');
    }

<<<<<<< HEAD
=======
     public function pakets()
    {
        $pakets = Paket::all();
        return view('user.pages.pakets', compact('pakets'));
    }
>>>>>>> 35f2f9660757573f057bf74cf514e55c1afe271c
}
