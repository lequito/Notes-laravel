<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller{
    public function login(){
        return view('login');
    }

    public function loginSubmit(Request $req){
        //form validate
        $req->validate(
            [
                'text_username' => 'required',
                'text_password' => 'required'
            ]
        );

        $username = $req->input('text_username');
        $username = $req->input('text_password');

        echo "ok";
    }
    

    public function logout(){
        echo "Logout";
    }
}
