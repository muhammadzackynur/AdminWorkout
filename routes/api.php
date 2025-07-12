<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute API untuk aplikasi Anda. Rute-rute
| ini dimuat oleh RouteServiceProvider dan semuanya akan
| ditugaskan ke grup middleware "api".
|
*/

// Rute untuk Login (tidak memerlukan otentikasi)
Route::post('/login', [AuthController::class, 'login']);

// Grup rute yang memerlukan otentikasi menggunakan Sanctum
Route::middleware('auth:sanctum')->group(function () {
    
    // Rute untuk Logout
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Rute untuk mendapatkan data user yang sedang login
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Anda bisa menambahkan rute API lain yang butuh login di sini
    // Contoh:
    // Route::get('/menu-makanan', [MenuMakananController::class, 'index']);

});