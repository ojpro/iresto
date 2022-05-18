<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
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

// Client

Route::prefix('/clients')->group(function () {
	Route::get('/',[\App\Http\Controllers\MainController::class,'all_clients']);
	Route::post('/register',[RegisteredUserController::class, 'store']);
	Route::post('/login',[\App\Http\Controllers\MainController::class, 'login']);
	Route::get("/{id}",[\App\Http\Controllers\MainController::class,'find'])->where('id','[0-9]+');

});