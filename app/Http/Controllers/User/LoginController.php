<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;


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


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('landingPage')->with('success', 'Registrasi berhasil! Silakan login.');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'notelp' => 'required|numeric',
                'password' => 'required|min:6',
            ]);

            $data = $request->all();


            // Simpan user ke database
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'notelp' => $data['notelp'],
                'alamat' => null,
                'jk' => $data['jk'] ?? null, // optional
                'role' => 'user', // tambahkan default role
                'password' => Hash::make($data['password']),
            ]);
            // Redirect ke login
            return redirect()->route('loginUser')->with('success', 'Registrasi berhasil! Silakan login.');
        } catch (\Throwable $th) {

            throw $th;
        }
    }
}
