<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoletoController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('boletos', BoletoController::class);
