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
        $password = $req->input('text_password');

        // check if users exists
        $user = User::where('username', $username)//compara o user passado no form com o do banco
                    ->where('deleted_at', NULL)//verifica se o user não foi deletado
                    ->first();

        if(!$user){
            return redirect()//redireciona 
                   ->back()//volta para tela de login
                   ->withInput()//matém os dados nos inputs
                   ->with('loginError', 'Login e ou senha inválidos!');
        }   
        
        //check if password is valid
        if(!password_verify($password, $user->password)){
            return redirect()//redireciona 
                   ->back()//volta para tela de login
                   ->withInput()//matém os dados nos inputs
                   ->with('loginError', 'Login e ou senha inválidos!');
        }

        //update last login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

        //login user
        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username
            ]
        ]);
        
        echo "LOGIN COM SUCESSO";
    }
    

    public function logout(){
        //Logout
        session()->forget('user');
        return redirect()->to('/login');
    }
}
