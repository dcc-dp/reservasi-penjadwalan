<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\UserMember;

class UserAuthController extends Controller
{
    // Form login
    public function showLoginForm()
    {
        return view('user.auth.login');
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('user')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('user.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    // Form register
    public function showRegisterForm()
    {
        return view('user.auth.Register');
    }

    // Register
    public function register(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:user_members,email', // sesuaikan nama tabel
        'password' => 'required|string|min:6|confirmed',
    ]);


        $user = UserMember::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('user')->login($user);

        return redirect()->route('user.auth.dashboard.Dashboard');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.login');
    }

    // Dashboard
    public function dashboard()
    {
        return view('user.dashboard.Dashboard');
    }
}
