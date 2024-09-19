<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "Hello world";
});

Route::get('/aboute', function(){
    echo "Aboute us";
});
