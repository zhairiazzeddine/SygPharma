<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\PharmacyController;



Route::get('/', [PharmacyController::class, 'index'])->name('public.home');

Route::get('/map', [PharmacyController::class, 'map'])->name('public.map');

Route::get('/formulaire-inscription', function(){ return view('public.formulaire'); })->name('public.formulaire');


Route::fallback(function () {
    return response()
        ->view('errors.404', [], 404);
});