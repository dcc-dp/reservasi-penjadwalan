<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.loginUser');
    }
    public function registerIndex()
    {
        return view('user.registerUser');
    }

   
    public function store(Request $request)
    {
         $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect()->route('reservasi');
    }
    public function register(Request $request)
    {
         $request->validate([
            'name'=>'required',
            'email'=>'required | email ',
            'notelp'=>'required | numeric',
            'password'=>'required',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->notelp = $request->notelp;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('loginUser')->with('success', 'Registrasi berhasil!');

    }

   
}
