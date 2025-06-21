<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);

Route::controller(ProjectController::class)->group(function() {
    Route::get('/projects', 'index')->name('projects.index');
    Route::get('/projects/count', 'count')->name('projects.count');
    Route::post('/projects', 'store')->name('projects.store');
    Route::get('/projects/{slug}', 'show')->name('projects.show');
    Route::put('/projects', 'update')->name('projects.update');
    Route::patch('/projects/pinned', 'pinned')->name('projects.pinned');
});

Route::controller(MemberController::class)->group(function() {
    Route::post('/members', 'store');
    Route::put('/members',  'update');
});

Route::controller(TaskController::class)->group(function() {
    Route::post('/tasks', 'store');;
    Route::post('/tasks/update_statu_to_not_started',  'updateStatuToNotStarted');
    Route::post('/tasks/update_statu_to_pending',  'updateStatuToPending');
    Route::post('/tasks/update_statu_to_completed', 'updateStatuToCompleted');
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


