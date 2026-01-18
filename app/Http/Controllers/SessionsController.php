<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SessionsController extends Controller
{
    public function create()
    {
        // default login (misalnya admin)
        return view('session.login-session');
    }

    public function createSiswa()
    {
        return view('user.loginUser');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return match (Auth::user()->role) {
                'admin' => redirect()->route('admin.dashboard'),
                'instruktur' => redirect()->route('instruktur.dashboard'),
                'siswa' => redirect()->route('siswa.dashboard'),
                default => abort(403, 'Role tidak dikenali'),
            };
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
