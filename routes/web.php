<?php

use App\Http\Controllers\admin\MateriController;
use App\Http\Controllers\admin\PaketController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\InstrukturProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UlasanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => 'auth'], function () {

	Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

	Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

	Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

	Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

	Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
	Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
  
	//Manajemen Kursus
	Route::get('/materi', [MateriController::class, 'index'])->name('materi');
	Route::post('/materi/store', [MateriController::class, 'store'])->name('materi.store');
	Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create');
	route::get('/materi/edit{id}', [MateriController::class, 'edit'])->name('materi.edit');
	route::put('/materi/update{id}', [MateriController::class, 'update'])->name('materi.update');
	Route::delete('/materi/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');

	//Manajemen User
	Route::get('/user', [UserController::class, 'index'])->name('user');
	Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
	Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
	route::get('/user/edit{id}', [UserController::class, 'edit'])->name('user.edit');
	route::put('/user/update{id}', [UserController::class, 'update'])->name('user.update');
	Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

	// paket
	Route::get('/paket', [PaketController::class, 'index'])->name('paket.index');
	Route::get('/create', [PaketController::class, 'create'])->name('paket.create');
	Route::post('/index', [PaketController::class, 'store'])->name('paket.store');
	Route::post('/edit', [PaketController::class, 'store'])->name('paket.store');
	Route::get('/edit/{id}', [PaketController::class, 'edit'])->name('paket.edit');
	Route::put('/paket/{id}', [PaketController::class, 'update'])->name('paket.update');
	Route::delete('/paket/{id}', [PaketController::class, 'destroy'])->name('paket.destroy');

	// Profile Instruktur
	Route::get('/profile-instuktur', [InstrukturProfileController::class, 'index'])->name('profile-instuktur.index');
});



Route::group(['middleware' => 'guest'], function () {
	Route::get('/register', [RegisterController::class, 'create']);
	Route::post('/register', [RegisterController::class, 'store']);
	Route::get('/login', [SessionsController::class, 'create']);
	Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

	// Kursus
	Route::get('/kursus', [KursusController::class, 'index'])->name('kursus.index');
	Route::get('/kursus/create', [KursusController::class, 'create'])->name('kursus.create');
	Route::post('/kursus/store', [KursusController::class, 'store'])->name('kursus.store');
	Route::get('/kursus/edit/{id}', [KursusController::class, 'edit'])->name('kursus.edit');
	Route::put('/kursus/edit/{kursus}', [KursusController::class, 'update'])->name('kursus.update');
	Route::delete('/kursus/{kursus}', [KursusController::class, 'destroy'])->name('kursus.destroy');

	// ulasan
	Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');

	



Route::get('/login', function () {
	return view('session/login-session');
})->name('login');
