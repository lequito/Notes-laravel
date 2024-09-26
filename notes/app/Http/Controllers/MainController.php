<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Operations;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller{

    public function index(){
        
        //load user's notes
        $id = session('user.id');
        $notes = User::find($id)->notes()->get()->toArray();
        //show home view
        return view('home', ['notes' => $notes]);
    }

    public function newNote(){
        //show new note view
        return view('new_note');
    }

    public function newNoteSubmite(Request $req){

    }

    public function editNote($id){
        $id = Operations::decriptId($id);        
    }

    public function deleteNote($id){
        $id = Operations::decriptId($id);
    }
}
