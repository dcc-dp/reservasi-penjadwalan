<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('static-sign-up');
    }

    public function store(Request $request)
    {
        $request = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'notelp' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'password' => 'required|min:6',
            'agreement' => 'accepted'
        ]);

        // Enkripsi password
        $request['password'] = bcrypt($request['password']);

        // Simpan ke database
        User::create($request);

        // Redirect ke login
        return redirect()->route('loginUser')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
