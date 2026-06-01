<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function register(Request $request)
    {
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('siswa.login')->with('success', 'Berhasil logout');
    }
}
