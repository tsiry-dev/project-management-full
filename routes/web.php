<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/verify/{token}', [RegisterController::class, 'verifyEmail'])
      ->name('verifyEmail');

Route::get('/', function () {
    return view('welcome');
});
