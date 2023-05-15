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


//internal route for our viewer -- these need to go first otherwise it will get confused and think that relative is a grid id
Route::get('/relative/internal/{gridID}/{z}/{y}/{x}',[TileController::class,"relative_internal"]);
Route::get('/relative/internal/{z}/{y}/{x}',[TileController::class,"true_relative_internal"]);



 //protected routes
Route::group(["middleware"=>"auth:sanctum"] ,function () {
    Route::get('/welcome',function(Request $request){
        return ["message"=>"Hello BathMap User!"];
    });
    Route::get('/version',function(Request $request){
        return ["version"=>"1.0"];
    });
    Route::get('/relative/{gridID}/{z}/{y}/{x}',[TileController::class,"relative"]);
    Route::get('/relative/{z}/{y}/{x}',[TileController::class,"true_relative"]);
    
}); 



//Route::get('/coordinate/{lattitude}/{longitude}/{scope}',[TileController::class,"coordinate"]);


