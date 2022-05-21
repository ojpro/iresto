<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\OrderDetailController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// TODO: use Auth

// Client

Route::prefix('/clients')->group(function () {
	Route::get('/',[\App\Http\Controllers\MainController::class,'all_clients']);
	Route::post('/register',[\App\Http\Controllers\ClientController::class, 'store']);
	Route::post('/login',[\App\Http\Controllers\MainController::class, 'login']);
	Route::get("/{id}",[\App\Http\Controllers\MainController::class,'find'])->where('id','[0-9]+');

});

// Orders

Route::prefix('/orders')->group(function(){
	Route::post('/create',[OrderDetailController::class,'store']);
});