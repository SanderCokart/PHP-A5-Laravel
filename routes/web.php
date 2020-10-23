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
Route::get('/' , [\App\Http\Controllers\BandController::class , 'index']);
Route::get('/home' , [\App\Http\Controllers\BandController::class , 'home'])->middleware('auth');

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/band', function(){
    return redirect('/');
});
Route::resource('band', \App\Http\Controllers\BandController::class);


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
