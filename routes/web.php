<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ReservasiController;
use App\Http\Controllers\admin\MateriController;
use App\Http\Controllers\admin\PaketController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\InstrukturProfileController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\user\JadwalSiswaController;
use App\Http\Controllers\pendaftaranController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\User\LandingPageController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/
Route::get('/', [LandingPageController::class, 'index'])->name('landingPage');
Route::get('/about', [LandingPageController::class, 'about'])->name('about');
Route::get('/benefit', [LandingPageController::class, 'benefit'])->name('benefit');
Route::get('/pakets', [LandingPageController::class, 'pakets'])->name('pakets');

/*
|--------------------------------------------------------------------------
| Auth Routes (Guest)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    // User login/register
    Route::prefix('siswa')->name('siswa.')->middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'userLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'userLoginStore'])->name('login.submit');
    Route::get('/register', [LoginController::class, 'registerIndex'])->name('register');
    Route::post('/register/store', [LoginController::class, 'register'])->name('register.store');
});


    // Forgot/reset password
    Route::get('/login/forgot-password', [ResetController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [ResetController::class, 'sendEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
    Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

    // Default login page
    Route::get('/login', [SessionsController::class, 'create'])->name('login');
    Route::post('/session', [SessionsController::class, 'store'])->name('session.store');
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard & general pages
    // Route::get('dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('billing', function () { return view('billing'); })->name('billing');
    Route::get('profile', function () { return view('profile'); })->name('profile');
    Route::get('rtl', function () { return view('rtl'); })->name('rtl');
    Route::get('user-management', function () { return view('laravel-examples/user-management'); })->name('user-management');
    Route::get('tables', function () { return view('tables'); })->name('tables');
    Route::get('virtual-reality', function () { return view('virtual-reality'); })->name('virtual-reality');
    Route::get('static-sign-in', function () { return view('static-sign-in'); })->name('sign-in');

    Route::post('/logout', [SessionsController::class, 'destroy'])->name('logout');

    // User profile
    Route::get('/user-profile', [InfoUserController::class, 'create']);
    Route::post('/user-profile', [InfoUserController::class, 'store']);

    /*
    |--------------------------------------------------------------------------
    | Admin / Management Routes
    |--------------------------------------------------------------------------
    */
    // Manajemen Kursus
    Route::prefix('materi')->name('materi.')->group(function () {
        Route::get('/', [MateriController::class, 'index'])->name('index');
        Route::get('/create', [MateriController::class, 'create'])->name('create');
        Route::post('/store', [MateriController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [MateriController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [MateriController::class, 'update'])->name('update');
        Route::delete('/{id}', [MateriController::class, 'destroy'])->name('destroy');
    });

    // Reservasi
    Route::prefix('reservasi')->name('reservasi.')->group(function () {
        Route::get('/', [ReservasiController::class, 'index'])->name('index');
        Route::get('/create', [ReservasiController::class, 'create'])->name('create');
        Route::post('/store', [ReservasiController::class, 'store'])->name('store');
        Route::delete('/{id}', [ReservasiController::class, 'destroy'])->name('destroy');
    });

    // User Management
    Route::prefix('user')->name('user.admin.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    });

    // Admin Management
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/store', [AdminController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [AdminController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminController::class, 'destroy'])->name('destroy');
    });

    // Paket
    Route::prefix('paket')->name('paket.')->group(function () {
        Route::get('/', [PaketController::class, 'index'])->name('index');
        Route::get('/create', [PaketController::class, 'create'])->name('create');
        Route::post('/store', [PaketController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PaketController::class, 'edit'])->name('edit');
        Route::put('/update/{id}', [PaketController::class, 'update'])->name('update');
        Route::delete('/{id}', [PaketController::class, 'destroy'])->name('destroy');
    });

    // Profile Instruktur
    Route::resource('profile-instruktur', InstrukturProfileController::class);
});

/*
|--------------------------------------------------------------------------
| User Dashboard / Form Pendaftaran
|--------------------------------------------------------------------------
*/
Route::prefix('siswa')->name('siswa.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [UserAuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('logout');
    Route::get('/form-pendaftaran', [pendaftaranController::class, 'index'])->name('form-pendaftaran');
    Route::post('/form-pendaftaran/store', [ReservasiController::class, 'store'])->name('pendaftaran.store');
/*
|--------------------------------------------------------------------------
| siswa jadwal pelajaran
|--------------------------------------------------------------------------
*/
    Route::get('/jadwal', [JadwalSiswaController::class, 'index'])->name('jadwal');
});

/*
|--------------------------------------------------------------------------
| Kursus, Ulasan, Pembayaran, Jadwal
|--------------------------------------------------------------------------
*/
Route::resource('kursus', KursusController::class);
Route::get('ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
Route::resource('pembayaran', PembayaranController::class);
Route::resource('jadwal', JadwalController::class);
