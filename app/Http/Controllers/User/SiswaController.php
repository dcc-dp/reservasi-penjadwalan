<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $reservasi = Reservasi::with('pembayaran')
            ->where('id_user', $user->id)
            ->latest()
            ->first();

        return view('user.dashboard.dashboard', compact('user', 'reservasi'));
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
