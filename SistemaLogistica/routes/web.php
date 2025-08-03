<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImportacaoController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\MotoristaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VeiculoController;

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

    /*Route::prefix('user')->name('user.')->group(function() {
        
    });*/

    
    Route::get('/user-read', [UsuarioController::class, 'read'])->name('read-user');

    Route::post('/user-store', [UsuarioController::class, 'store'])->name('store-user');

    Route::delete('/user-destroy/{user}', [UsuarioController::class, 'destroy'])->name('destroy-user');

    Route::put('user-update/{usuario}',[UsuarioController::class, 'update'])->name('update-user');

    Route::prefix('motorista')->name('motorista.')->group(function (){
        Route::get('/', [MotoristaController::class, 'index'] )->name('index');
        Route::post('/store',[MotoristaController::class, 'store'])->name('store');
    });
    
    Route::prefix('modelo')->name('modelo.')->group(function (){
        Route::get('/', [ModeloController::class, 'index'] )->name('index');
        Route::post('/store',[ModeloController::class, 'store'])->name('store');    
    });

    Route::prefix('veiculo')->name('veiculo.')->group(function (){
        Route::get('/', [VeiculoController::class, 'index'] )->name('index');
        Route::post('/store',[VeiculoController::class, 'store'])->name('store');    
    });

    Route::prefix('importacao')->name('importacao.')->group(function() {
        Route::get('/' ,[ImportacaoController::class,'index'])->name('index');
        Route::post('/store',  [ImportacaoController::class,'store'])->name('store');
    });
});
