<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    /**
     * Tampilkan halaman login siswa
     */
    public function showLoginForm()
    {
        return view('user.loginUser'); // pastikan view ada
    }

    /**
     * Proses login siswa
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($request->only('email','password'))) {
            $request->session()->regenerate();

            // Redirect sesuai role
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->role == 'instruktur') {
                return redirect()->route('instruktur.dashboard');
            } else {
                return redirect()->route('siswa.dashboard');
            }
        }


        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    /**
     * Tampilkan halaman registrasi siswa
     */
    public function showRegisterForm()
    {
        return view('user.registerUser'); // pastikan view ada
    }

    /**
     * Proses registrasi siswa
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'notelp' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
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

    /**
     * Dashboard siswa
     */
    public function dashboard()
    {
        // dd(Auth::user());
        $reservasi = Reservasi::with('pembayaran')
            ->where('id_user', Auth::user()->id)
            ->latest()
            ->first();

        return view('dashboard', compact('reservasi'));
    }
}
