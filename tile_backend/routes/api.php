<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TileController;
use App\Http\Controllers\TokenController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::get('/welcome',function(Request $request){
    return "Hello BathMap User!";
})->middleware('auth:sanctum');

Route::get('/version',function(Request $request){
    return "1.0";
})->middleware('auth:sanctum');

Route::get('/relative/{x}/{y}/{z}',[TileController::class,"relative"])->middleware("auth:sanctum");
Route::get('/coordinate/{lattitude}/{longitude}/{scope}',[TileController::class,"coordinate"])->middleware("auth:sanctum");