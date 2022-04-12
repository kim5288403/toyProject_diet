<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name("index");

Route::get('/login',[AuthController::class,"login"])->name("login");
Route::get('/join',[AuthController::class,"join"])->name("join");
Route::post('/store',[AuthController::class,"store"])->name("store");

Route::group(["as"=>'users.'],function (){
    Route::get('/{id}',[UserController::class,"detail"])->name("detail");
});

