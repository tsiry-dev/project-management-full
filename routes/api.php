<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


