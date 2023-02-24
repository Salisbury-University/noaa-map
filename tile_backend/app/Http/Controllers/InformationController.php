<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function documentation(){
        return view("informational.documentation");
    }

    public function tutorial(){
        return view("informational.tutorial");
    }

    public function about(){
        return view("informational.about");
    }
}
