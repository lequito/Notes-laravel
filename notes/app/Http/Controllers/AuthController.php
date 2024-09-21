<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        // Get users input
        $username = $req->input('text_username');
        $username = $req->input('text_password');

        // get all the users from the database
        //$users = User::all()->toArray();

        $userModel = new User();
        $users = $userModel->all()->toArray();

        echo "<pre>";
        print_r($users);
        
    }
    

    public function logout(){
        echo "Logout";
    }
}
