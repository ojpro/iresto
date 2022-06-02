<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\ClientController;
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
	Route::get('/', [\App\Http\Controllers\ClientController::class, 'all_clients']);
	Route::post('/register', [ClientController::class,'store']);
	Route::post('/login', [\App\Http\Controllers\MainController::class, 'login']);
	Route::get("/{id}", [\App\Http\Controllers\ClientController::class, 'find'])->where('id', '[0-9]+');

});

// Orders

Route::prefix('/orders')->group(function () {
	Route::post('/create', [OrderDetailController::class, 'store']);
});


// Plates

Route::prefix('/plates')->group(function () {
	Route::get('/', [\App\Http\Controllers\PlateController::class, 'fetchAll']);
	Route::get('/{id}', [\App\Http\Controllers\PlateController::class, 'fetch']);
	Route::get('/category/{category}', [\App\Http\Controllers\PlateController::class, 'fetchByCategory']);
	Route::get('/{id}/images',[\App\Http\Controllers\PlateImageController::class,'search']);
	Route::get('/{id}/thumbnail',[\App\Http\Controllers\PlateImageController::class,'thumbnail']);
});

// Categories

Route::prefix('/categories')->group(function () {
	Route::get('/', [\App\Http\Controllers\CategoryController::class, 'all']);
	Route::get('/{id}', [\App\Http\Controllers\CategoryController::class, 'find']);
});

// Plate Images

Route::delete('/plate-images/{id}', [\App\Http\Controllers\PlateImageController::class, 'destroy'])
	->name('plates-images.destroy');