<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformationController extends Controller
{
    public function documentation(){
        $grids=DB::table("grid")->get();
        return view("informational.documentation",compact("grids"));
    }

    public function tutorial(){
        return view("informational.tutorial");
    }

    public function about(){
        return view("informational.about");
    }
}
