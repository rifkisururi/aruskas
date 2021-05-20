<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kas/{type}', [App\Http\Controllers\HomeController::class, 'kas'])->name('kas');
Route::get('/kasedit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('kas-edit');
Route::get('/kashapus/{id}', [App\Http\Controllers\HomeController::class, 'destroy'])->name('kas-hapus');
Route::put('/kasedit/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('kas-update');

Route::POST('/kas/{type}', [App\Http\Controllers\HomeController::class, 'store']);

Route::get('/rekapitulasi', [App\Http\Controllers\HomeController::class, 'rekapitulasi'])->name('kas-rekapitulasi');
Route::get('/grafik/{year}', [App\Http\Controllers\HomeController::class, 'grafik'])->name('kas-grafik');

Route::get('/export', [App\Http\Controllers\HomeController::class, 'export'])->name('export');
