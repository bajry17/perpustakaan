<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RakController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::prefix('/buku')->group(function(){
    Route::get('/buku',[BukuController::class, 'index']);
    Route::post('/create',[BukuController::class, 'store']);
    Route::put('/update',[BukuController::class, 'update']);
    Route::delete('/delete',[BukuController::class, 'delete']);
});

Route::prefix('/anggota')->group(function(){
    Route::get('/anggota',[AnggotaController::class, 'index']);
    Route::post('/create',[AnggotaController::class, 'store']);
    Route::put('/update',[AnggotaController::class, 'update']);
    Route::delete('/delete',[AnggotaController::class, 'delete']);
});
Route::prefix('/petugas')->group(function(){
    Route::get('/petugas',[PetugasController::class, 'index']);
    Route::post('/create',[PetugasController::class, 'store']);
    Route::put('/update',[PetugasController::class, 'update']);
    Route::delete('/delete',[PetugasController::class, 'delete']);
});
Route::prefix('/rak')->group(function(){
    Route::get('/rak',[RakController::class, 'index']);
    Route::post('/create',[RakController::class, 'store']);
    Route::put('/update',[RakController::class, 'update']);
    Route::delete('/delete',[RakController::class, 'delete']);
});
Route::prefix('/peminjaman')->group(function(){
    Route::get('/peminjaman',[PeminjamanController::class, 'index']);
    Route::post('/create',[PeminjamanController::class, 'store']);
    Route::put('/update',[PeminjamanController::class, 'update']);
    Route::delete('/delete',[PeminjamanController::class, 'delete']);
});
Route::prefix('/pengembalian')->group(function(){
    Route::get('/pengembalian',[PengembalianController::class, 'index']);
    Route::post('/create',[PengembalianController::class, 'store']);
    Route::put('/update',[PengembalianController::class, 'update']);
    Route::delete('/delete',[PengembalianController::class, 'delete']);
});
