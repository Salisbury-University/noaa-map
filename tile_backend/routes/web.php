<?php

use App\Http\Controllers\InformationController;
use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//informational routes
Route::get('/documentation', [InformationController::class, 'documentation'])->name('documentation');
Route::get('/about', [InformationController::class, 'about'])->name('about');
Route::get('/tutorial', [InformationController::class, 'tutorial'])->name('tutorial');

Route::get('/viewer', function () {
    $grid_options = DB::table('grid')->get();

    return view('viewer', compact('grid_options'));
});

Route::view('/fullscreenviewer', 'fullscreenviewer');

Route::resource('/tokens', TokenController::class)->middleware('auth');
