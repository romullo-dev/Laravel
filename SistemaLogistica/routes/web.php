<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use Faker\Guesser\Name;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user-create', [UsuarioController::class,'create'])->name('create-user');

Route::post('/user-store', [UsuarioController::class,'store'])->name('create-store');

Route::get('/Login', [AuthController::class, 'index'])->name('login');

Route::post('/Login', [AuthController::class, 'LoginAuth'])->name('auth');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');



