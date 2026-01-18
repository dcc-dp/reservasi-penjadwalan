<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\User\LandingPageController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\UserAuthController;

use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\ChangePasswordController;

use App\Http\Controllers\admin\MateriController;
use App\Http\Controllers\admin\PaketController;
use App\Http\Controllers\admin\ReservasiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\user\ReservasiSiswaController;
use App\Http\Controllers\user\JadwalSiswaController;

use App\Http\Controllers\pendaftaranController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\User\SiswaController;
use App\Models\Kursus;

/*
|--------------------------------------------------------------------------
| LANDING PAGE (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingPageController::class, 'index'])->name('landingPage');
Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::get('/benefit', [LandingPageController::class, 'benefit'])->name('benefit');
Route::get('/pakets', [LandingPageController::class, 'pakets'])->name('pakets');
// web.php


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

    // Route::get('/siswa/login', [SessionsController::class, 'userLogin'])->name('siswa.login');
    // Route::post('/siswa/login', [SessionsController::class, 'userLoginStore']);
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

    Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');

    // ===== Materi =====
    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
    Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create');
    Route::post('/materi/store', [MateriController::class, 'store']);
    Route::get('/materi/edit/{id}', [MateriController::class, 'edit'])->name('materi.edit');
    Route::post('/materi/update/{id}', [MateriController::class, 'update']);
    Route::post('/materi/delete/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');

    // ===== Paket =====
    Route::get('/paket', [PaketController::class, 'index'])->name('paket.index');
    Route::get('/paket/create', [PaketController::class, 'create']);
    Route::post('/paket/store', [PaketController::class, 'store']);
    Route::get('/paket/edit/{id}', [PaketController::class, 'edit']);
    Route::post('/paket/update/{id}', [PaketController::class, 'update']);
    Route::post('/paket/delete/{id}', [PaketController::class, 'destroy']);

    // ===== Kursus =====
    Route::get('/kursus', [KursusController::class, 'index'])->name('kursus.index');
    Route::get('/kursus/create', [KursusController::class, 'create'])->name('kursus.create');
    Route::post('/kursus/store', [KursusController::class, 'store']);
    Route::get('/kursus/edit/{id}', [KursusController::class, 'edit'])->name('kursus.edit');
    Route::post('/kursus/update/{id}', [KursusController::class, 'update']);
    Route::post('/kursus/delete/{id}', [KursusController::class, 'destroy'])->name('kursus.destroy');

    // jadwal 
    Route::get('/kursus/jadwal', [JadwalController::class, 'index'])->name('kursus.jadwal');
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');
    Route::post('/kursus/jadwal/store/{id}', [JadwalController::class, 'store'])->name('jadwal.store');
    Route::post('/kursus/jadwal/delete/{id}', [JadwalController::class, 'destroyJadwal'])->name('kursus.jadwal.destroy');   

    // ===== Reservasi =====
    Route::get('/reservasi', [ReservasiController::class, 'index']);
    Route::post('/reservasi/konfirmasi/{id}', [ReservasiController::class, 'konfirmasi']);
});

/*
|--------------------------------------------------------------------------
| SISWA (AUTH + ROLE SISWA)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:siswa'])->prefix('siswa')->group(function () {

    Route::get('/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
    Route::post('/logout', [SiswaController::class, 'destroy'])->name('siswa.logout');

    // ===== Form Pendaftaran =====
    Route::get('/form-pendaftaran', [pendaftaranController::class, 'index'])->name('siswa.form-pendaftaran');
    Route::post('/form-pendaftaran/store', [ReservasiSiswaController::class, 'store'])->name('form-pendaftaran.store');

    // ===== Jadwal =====
    Route::get('/jadwal', [JadwalSiswaController::class, 'index'])->name('siswa.jadwal');

    // ===== Pembayaran =====
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('siswa.pembayaran');

    // ===== Reservasi =====
    Route::get('/reservasi/create', [ReservasiSiswaController::class, 'create'])->name('siswa.reservasi.create');
    Route::post('/reservasi/store', [ReservasiSiswaController::class, 'store'])->name('siswa.reservasi.store');
});
