<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return view('home.dashboard');
    })->name('dashboard');

    Route::get('/user-read', [UsuarioController::class, 'read'])->name('read-user');

    Route::post('/user-store', [UsuarioController::class, 'store'])->name('store-user');

    Route::delete('/user-destroy/{user}', [UsuarioController::class, 'destroy'])->name('destroy-user');

    Route::put('user-update/{usuario}',[UsuarioController::class, 'update'])->name('update-user');

    


});
