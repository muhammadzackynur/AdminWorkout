<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeWorkController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk menyimpan data HomeWork
Route::post('/homework/store', [HomeWorkController::class, 'store'])
    ->middleware(['web']);
