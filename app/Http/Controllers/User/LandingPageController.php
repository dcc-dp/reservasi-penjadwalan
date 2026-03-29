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
  public function index()
{
    $instrukturs = Instruktur_Profile::with('user')->get();
    return view('user.landingpage', data: compact(var_name: 'instrukturs'));
}
    public function about()
    {

        return view('user.about');
    }
    public function benefit()
    {

        return view('user.benefit');
    }

}
