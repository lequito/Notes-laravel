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