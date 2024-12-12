<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rutas para mis menus de CRUD
Route::resource('personas', \App\Http\Controllers\PersonaController::class)->middleware('auth');
Route::resource('wods', \App\Http\Controllers\WodController::class)->middleware('auth');
Route::resource('weighliftings', \App\Http\Controllers\WeighliftingController::class)->middleware('auth');
Route::resource('runs', \App\Http\Controllers\RunController::class)->middleware('auth');
Route::resource('benchmarks', \App\Http\Controllers\BenchmarkController::class)->middleware('auth');
Route::resource('otros', \App\Http\Controllers\OtroController::class)->middleware('auth');
Route::resource('cuerpos', \App\Http\Controllers\CuerpoController::class)->middleware('auth');



 
