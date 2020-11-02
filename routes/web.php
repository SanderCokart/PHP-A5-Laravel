<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

//ROOT
Route::get('/', [\App\Http\Controllers\BandController::class, 'index'])->name('home');
//DASHBOARD FOR LOGGED IN USERS
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

//REDIRECT FROM UNNECESSARY ROUTE
Route::get('/band', function () {
    return redirect('/');
});

//RESOURCES
Route::resource('band', \App\Http\Controllers\BandController::class);

Route::resource('user', \App\Http\Controllers\UserController::class)->only([
    'update', 'edit'
]);

Route::post('/moderator/invite', [\App\Http\Controllers\ModeratorController::class, 'invite'])->name('moderator.invite');
