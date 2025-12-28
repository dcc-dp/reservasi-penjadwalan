<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Tampilkan halaman login siswa
     */
    public function userLogin()
    {
        return view('user.loginUser'); // pastikan view ini ada
    }

    /**
     * Proses login siswa
     */
    public function userLoginStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('siswa.dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    /**
     * Tampilkan halaman registrasi siswa
     */
    public function registerIndex()
    {
        return view('user.registerUser'); // pastikan view ini ada
    }

    /**
     * Proses registrasi siswa
     */
    public function register(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'notelp' => 'required',
            'password' => 'required',
            'jk' => 'nullable|in:L,P',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'notelp' => $request->notelp,
            'jk' => $request->jk ?? null,
            'alamat' => null,
            'role' => 'siswa',
            'password' => Hash::make($request->password),
        ]);

        // Setelah registrasi, redirect ke halaman login siswa
        return redirect()->route('siswa.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    /**
     * Logout siswa
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('siswa.login')->with('success', 'Berhasil logout');
    }
}
