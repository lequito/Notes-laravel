<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller{
    public function login(){
        return view('login');
    }

    public function loginSubmit(Request $req){
        //form validate
        $req->validate(
            [
                'text_username' => 'required | email',
                'text_password' => 'required | min:6 | max:12'
            ],
            [
                'text_username.required' => 'O campo Usuário deve ser preenchido!',
                'text_username.email' => 'O campo Usuário deve ser preenchido com um E-mail válido!',
                'text_password.required' => 'O campo Senha é obrigatório!',
                'text_password.min' => 'O campo Senha deve ter pelo menos :min caractéres!',
                'text_password.max' => 'O campo Senha deve ter no máximo :max caractéres!',
            ]
        );

        $username = $req->input('text_username');
        $username = $req->input('text_password');

        try {
            DB::connection()->getPdo();
            echo "connection ok";
        } catch (\PDOException $e) {
            echo "connection failed" . $e->getMessage();
        }

        echo "fim";
    }
    

    public function logout(){
        echo "Logout";
    }
}
