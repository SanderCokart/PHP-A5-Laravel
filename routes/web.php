<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

//ROOT
Route::get('/', [\App\Http\Controllers\BandController::class, 'index'])->name('home');
//DASHBOARD FOR LOGGED IN USERS
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

//RESOURCES
Route::resource('bands', \App\Http\Controllers\BandController::class);
Route::post('bands/{band}/invite', [\App\Http\Controllers\BandController::class, 'invite'])->name('moderator.add');
Route::delete('bands/{band}/unInvite/{mod}', [\App\Http\Controllers\BandController::class, 'unInvite'])->name('moderator.remove');

Route::resource('users', \App\Http\Controllers\UserController::class)->only([
    'update', 'edit'
]);
