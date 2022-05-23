<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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

Route::middleware(['auth'])->group(function () {

	Route::get('/', [MainController::class,'home']);

	Route::prefix('/dashboard')->group(function () {

		/* Dashboard */
		Route::view('/','dashboard')->name('dashboard');

		/* Plates */
		Route::resource('/plates', \App\Http\Controllers\PlateController::class);

		/* Plates Categories */
		Route::resource('/categories', \App\Http\Controllers\CategoryController::class)->except(['create','edit']);

		/* Clients */
		Route::get('/clients',[\App\Http\Controllers\ClientController::class,'index'])->name('clients.index');
	});
});

require __DIR__.'/auth.php';
