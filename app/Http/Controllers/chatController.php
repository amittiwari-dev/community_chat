<?php

namespace App\Http\Controllers;
use App\Events\chat;
use Illuminate\Http\Request;
use validate;
class chatController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    // here code for enter username with
    public function chat(Request $req)
    {
        $valid=$req->validate([
            'username'=>'required',
        ]);

        return view('chat',['username'=>$req->username]);
    }

    // here code for broadcast Chat
    public function broadcastChat(Request $req)
    {
        $req->validate([
            'username'=>'required',
            'message'=>'required'
        ]);
        event(new chat($req->username,$req->message));
        return response()->json($req->all());
    }
}
