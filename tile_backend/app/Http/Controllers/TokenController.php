<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class TokenController extends Controller
{
    public function index()
    {
        $tokens=auth()->user()->tokens;
        return view('tokens.index',compact('tokens'));
    }

    public function create(){
        return view('tokens.create');
    }
}
