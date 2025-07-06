<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/create-user', [UserController::class,'create'])->name('user.create');

Route::post('/store-user', [UserController::class,'store'])->name('user-store');

Route::get('/read-user', [UserController::class, 'read' ])->name('user-read');

Route::delete('/delete-user/{id}',[UserController::class,'delete'])->name('user-delete');


Route::get('edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');

Route::put('update-user/{user}', [UserController::class, 'update'])->name('user.update');

