<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

//ROOT
Route::get('/', [\App\Http\Controllers\BandController::class, 'index']);

//DASHBOARD FOR LOGGED IN USERS
Route::get('/home', function () {
    return view('dashboard');
})->middleware('auth');

//REDIRECT FROM UNNECESSARY ROUTE
Route::get('/band', function () {
    return redirect('/');
});

//RESOURCES
Route::resource('band', \App\Http\Controllers\BandController::class);
