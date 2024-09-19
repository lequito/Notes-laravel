<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
       return view('main');
    }

    public function page1(){
       return view('page1');
    }

    public function page2(){
       return view('page2');
    }
}
