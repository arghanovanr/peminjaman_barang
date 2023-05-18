<?php

use App\Http\Controllers\BarangController;
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


//CRUD Barang Kantor
Route::get('/barang', [BarangController::class, 'index'])->middleware('auth');
Route::get('/barang/input', [BarangController::class, 'create'])->middleware('auth');
Route::post('/barang', [BarangController::class, 'store'])->middleware('auth');
Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->middleware('auth');
Route::put('/barang/{id}', [BarangController::class, 'update'])->middleware('auth');
Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
