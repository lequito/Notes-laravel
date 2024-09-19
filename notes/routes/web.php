<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "Hello world";
});

Route::get('/aboute', function(){
    echo "Aboute us";
});

Route::get('/main', [MainController::class, 'index']);
Route::get('/page1', [MainController::class, 'page1']);
Route::get('/page2', [MainController::class, 'page2']);