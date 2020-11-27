<?php

use Illuminate\Support\Facades\Route;

/*GENERATE AUTH ROUTES*/
Auth::routes();

/*ROOT*/
Route::get('/', [\App\Http\Controllers\BandController::class, 'index'])->name('root');

/*DASHBOARD FOR LOGGED IN USERS*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

/*RESOURCES*/
/*BANDS*/
/*SUPPLEMENTS*/
Route::post('bands/{band}/invite', [\App\Http\Controllers\BandController::class, 'invite'])->name('moderator.add');
Route::delete('bands/{band}/unInvite/{mod}', [\App\Http\Controllers\BandController::class, 'unInvite'])->name('moderator.remove');
/*MAIN RESOURCE*/
Route::resource('bands', \App\Http\Controllers\BandController::class)->except(['destroy']);
/*REDIRECTS*/

/*USERS*/
Route::resource('users', \App\Http\Controllers\UserController::class)->only([
    'update', 'edit'
]);
