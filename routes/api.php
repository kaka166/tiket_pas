<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\PesanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::resource('tiket', TiketController::class);

Route::middleware('auth:sanctum')->group(function (){
    Route::put('/tiket/{id}', [TiketController::class, 'update'])->middleware('admin');
    Route::get('/tiket', [TiketController::class, 'index']);
    Route::get('/tiket/{id}', [TiketController::class, 'index'])->middleware('admin');
    Route::post('/tiket', [TiketController::class, 'store'])->middleware('admin');
    Route::delete('/tiket/{id}', [TiketController::class, 'destroy'])->middleware('admin');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/pesan', [PesanController::class, 'store']);
    Route::get('/pesan', [PesanController::class, 'index'])->middleware('admin');
    Route::get('/pesan/{id}', [PesanController::class, 'show'])->middleware('admin');
});

