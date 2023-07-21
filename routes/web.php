<?php

use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\TempController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('provinsi', [ProvinsiController::class, 'index'])->name('provinsi.index');
Route::get('kabupaten', [KabupatenController::class, 'index'])->name('kabupaten.index');
Route::get('kecamatan', [KecamatanController::class, 'index'])->name('kecamatan.index');
Route::get('kelurahan', [KelurahanController::class, 'index'])->name('kelurahan.index');
