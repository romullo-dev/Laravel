<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user-create', [UsuarioController::class,'create'])->name('create-user');

Route::post('/user-store', [UsuarioController::class,'store'])->name('create-store');