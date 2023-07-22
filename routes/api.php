<?php

use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\ProvinsiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('provinsi', [ProvinsiController::class, 'index'])->name('provinsi.index');
Route::get('provinsi/{id}', [ProvinsiController::class, 'show'])->name('provinsi.show');

Route::get('kabupaten', [KabupatenController::class, 'index'])->name('kabupaten.index');
Route::get('kabupaten/{id}', [KabupatenController::class, 'show'])->name('kabupaten.show');

Route::get('kecamatan', [KecamatanController::class, 'index'])->name('kecamatan.index');
Route::get('kecamatan/{id}', [KecamatanController::class, 'show'])->name('kecamatan.show');

Route::get('kelurahan', [KelurahanController::class, 'index'])->name('kelurahan.index');
Route::get('kelurahan/{id}', [KelurahanController::class, 'show'])->name('kelurahan.show');
