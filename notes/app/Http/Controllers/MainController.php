<?php

namespace App\Http\Controllers;

use App\Models\Note;
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

    public function newNoteSubmit(Request $req){
        $req->validate(
            //rules
            [
                'text_title' => 'required | min:3 | max:200',
                'text_note' => 'required | min:3 | max:3000',
            ],
            //error messages
            [
                'text_title.required' => 'O título é obrigatório!',
                'text_title.min'      => 'O título deve ter no mínimo :min caracteres!',
                'text_title.max'      => 'O título deve ter no máximo :max caracteres!',
                'text_note.required'  => 'A nota é obrigatória!',
                'text_note.min'       => 'A nota deve ter no mínimo :min caracteres!',
                'text_note.max'       => 'A nota deve ter no máximo :max caracteres!',
            ]
        );
        //get id user
        $id = session('user.id');

        //create new note
        $note          = new Note();
        $note->user_id = $id;
        $note->title   = $req->text_title;
        $note->text    = $req->text_note;
        $note->save();

        //redirect to home
        return redirect()->route('home');
    }

    public function editNote($id){
        $id = Operations::decriptId($id);
        // load note
        $note = Note::find($id);
        // show edit note view
        return view('edit_note', ['note' => $note]);       
    }

    public function deleteNote($id){
        $id = Operations::decriptId($id);
    }
}
