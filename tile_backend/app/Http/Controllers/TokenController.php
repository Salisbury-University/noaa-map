<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TokenController extends Controller
{
    public function index()
    {
        $tokens=auth()->user()->tokens;
        dd($tokens[0]->plainTextToken);
        return view('tokens.index',compact('tokens'));
    }

    public function create(){
        return view('tokens.create');
    }

    public function store(Request $request){
        $token_plain_text = $request->user()->createToken($request->token_name)->plainTextToken;

        return redirect(route("home",compact($token_plain_text)));
    }

    public function destroy($tokenId){
        $user=auth()->user();
        $user->tokens()->where('id', $tokenId)->delete();
        return view('/home');

    }
}
