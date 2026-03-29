<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\User\LandingPageController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\ChangePasswordController;

use App\Http\Controllers\admin\MateriController;
use App\Http\Controllers\admin\PaketController;
use App\Http\Controllers\admin\ReservasiController;
use App\Http\Controllers\InstrukturProfileController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KursusController;

use App\Http\Controllers\User\SiswaController;
use App\Http\Controllers\User\KursusSiswaController;
use App\Http\Controllers\User\JadwalSiswaController;
use App\Http\Controllers\user\ReservasiSiswaController;

use App\Http\Controllers\pendaftaranController;
use App\Http\Controllers\PembayaranController;

/*
|--------------------------------------------------------------------------
| GLOBAL LOGOUT (WAJIB DI ATAS)
|--------------------------------------------------------------------------
*/
Route::post('/logout', function () {
    auth()->logout();
    return redirect('/login');
})->name('siswa.logout');

/*
|--------------------------------------------------------------------------
| LANDING PAGE (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingPageController::class, 'index'])->name('landingPage');
Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::get('/benefit', [LandingPageController::class, 'benefit'])->name('benefit');
Route::get('/pakets', [LandingPageController::class, 'pakets'])->name('pakets');

/*
|--------------------------------------------------------------------------
| AUTH (GUEST)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/login', [SessionsController::class, 'store']);

    Route::get('/siswa/login', [SessionsController::class, 'createSiswa'])->name('siswa.login');
    Route::post('/siswa/login', [SessionsController::class, 'store']);

    Route::get('/siswa/register', [LoginController::class, 'registerIndex'])->name('siswa.register');
    Route::post('/siswa/register', [LoginController::class, 'register'])->name('siswa.register.store');

    Route::get('/forgot-password', [ResetController::class, 'create']);
    Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass']);
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword']);
});

/*
|--------------------------------------------------------------------------
| ADMIN (AUTH + ROLE ADMIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('admin.dashboard');

    // logout admin (opsional, beda nama biar tidak bentrok)
    Route::post('/logout', [SessionsController::class, 'destroy'])->name('admin.logout');

    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create');
    Route::post('/materi/store', [MateriController::class, 'store'])->name('materi.store');

    Route::get('/paket', [PaketController::class, 'index'])->name('paket.index');

    Route::get('/kursus', [KursusController::class, 'index'])->name('kursus.index');

    Route::get('/kursus/jadwal', [JadwalController::class, 'index'])->name('kursus.jadwal');

    Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');

    Route::get('/instruktur', [InstrukturProfileController::class, 'index'])->name('instruktur.index');
});

/*
|--------------------------------------------------------------------------
| SISWA (AUTH + ROLE SISWA)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->group(function () {

    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');

    Route::get('/form-pendaftaran', [pendaftaranController::class, 'index'])->name('siswa.form-pendaftaran');
    Route::post('/form-pendaftaran/store', [ReservasiSiswaController::class, 'store'])->name('form-pendaftaran.store');

    Route::get('/jadwal', [JadwalSiswaController::class, 'index'])->name('siswa.jadwal');

    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('siswa.pembayaran');

    Route::get('/reservasi', [ReservasiSiswaController::class, 'index'])->name('siswa.reservasi.index');
    Route::get('/reservasi/create', [ReservasiSiswaController::class, 'create'])->name('siswa.reservasi.create');
    Route::post('/reservasi/store', [ReservasiSiswaController::class, 'store'])->name('siswa.reservasi.store');

    Route::get('/kursus', [KursusSiswaController::class, 'index'])->name('siswa.kursus.index');
});