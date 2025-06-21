<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::controller(ProjectController::class)->group(function() {
    Route::get('/projects', 'index')->name('projects.index');
    Route::post('/projects', 'store')->name('projects.store');
    Route::put('/projects', 'update')->name('projects.update');
    Route::patch('/projects/pinned', 'pinned')->name('projects.pinned');
});

Route::post('/members', [MemberController::class, 'store'])->name('members.store');
Route::put('/members', [MemberController::class, 'update'])->name('members.update');

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


