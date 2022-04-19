<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\HashTagController;
use App\Http\Controllers\MealController;
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
Route::group(["prefix"=>"diet"],function (){

Route::get('/', function () {
    return view('index');
})->name("index");

Route::get('/login',[AuthController::class,"login"])->name("login");
Route::get('/join',[AuthController::class,"join"])->name("join");
Route::post('/store',[AuthController::class,"store"])->name("store");

Route::group(["prefix"=>"users","as"=>'users.'],function (){
    Route::get('/{id}',[UserController::class,"detail"])->name("detail");
});

Route::group(["prefix"=>"food","as"=>'food.'],function (){
    Route::get('/',[FoodController::class,"data"])->name("data");
});

Route::group(["prefix"=>"meal","as"=>'meal.'],function (){
    Route::get('/',[MealController::class,"meal"])->name("meal");
    Route::get('/list',[MealController::class,"view"])->name("view");
    Route::get('/data',[MealController::class,"getData"])->name("getData");
    Route::post('/',[MealController::class,"create"])->name("create");
});

Route::group(["prefix"=>"hashTag","as"=>'hashTag.'],function (){
    Route::get('/',[HashTagController::class,"data"])->name("data");
});

});

