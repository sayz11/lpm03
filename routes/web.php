<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route for user model
Route::get('/users', [App\Http\Controllers\UserController::class,'index']);
Route::get('/users/{user}', [App\Http\Controllers\UserController::class,'show']);
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class,'edit']);
Route::post('/users/{user}/edit', [App\Http\Controllers\UserController::class,'update']);
Route::get('/users/{user}/delete', [App\Http\Controllers\UserController::class,'delete']);

//route for equip model
Route::get('/equips', [App\Http\Controllers\EquipController::class,'index']);
Route::get('/equips/create', [App\Http\Controllers\EquipController::class,'create'])->middleware('auth');
Route::post('/equips/create', [App\Http\Controllers\EquipController::class,'store']);
Route::get('/equips/{equip}', [App\Http\Controllers\EquipController::class,'show']);
Route::get('/equips/{equip}/edit', [App\Http\Controllers\EquipController::class,'edit']);
Route::post('/equips/{equip}/edit', [App\Http\Controllers\EquipController::class,'update']);
Route::get('/equips/{equip}/delete', [App\Http\Controllers\EquipController::class,'delete']);