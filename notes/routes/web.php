<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\CheckIsLogged;
use App\Http\Middleware\CheckIsNoteLogged;
use Illuminate\Support\Facades\Route;

//Auth routes

Route::middleware(CheckIsNoteLogged::class)->group(function(){
    Route::get('/login', [AuthController::class, 'login']);
    Route::post('/loginSubmit', [AuthController::class, 'loginSubmit']);

});

Route::middleware(CheckIsLogged::class)->group(function(){
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [MainController::class, 'index'])->name('home');
    Route::get('/newNote', [MainController::class, 'newNote'])->name('new');
    Route::get('/editNote{id}', [MainController::class, 'editNote'])->name('edit');
    Route::get('/deleteNote{id}', [MainController::class, 'deleteNote'])->name('delete');
});

