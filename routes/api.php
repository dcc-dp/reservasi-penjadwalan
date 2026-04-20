<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\PembayaranSiswaController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/midtrans/callback', [PembayaranSiswaController::class, 'callback'])
    ->name('midtrans.callback');