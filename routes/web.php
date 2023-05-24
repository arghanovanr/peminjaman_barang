<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\PinjamBarangController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth', 'isAdmin'])->group(function () {
    //Data Master
    Route::get('/barang', [BarangController::class, 'index'])->middleware('auth');
    Route::get('/barang/input', [BarangController::class, 'create'])->middleware('auth');
    Route::post('/barang', [BarangController::class, 'store'])->middleware('auth');
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->middleware('auth');
    Route::put('/barang/{id}', [BarangController::class, 'update'])->middleware('auth');
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->middleware('auth');
    // User Management Route
    Route::get('/user', [UserController::class, 'index'])->middleware('auth');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->middleware('auth');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->middleware('auth');
    Route::put('/user/{id}', [UserController::class, 'update'])->middleware('auth');
    Route::get('/userpass/{id}/reset', [UserController::class, 'resetpass'])->middleware('auth');
    Route::put('/userpass/{id}', [UserController::class, 'updatepass'])->middleware('auth');
});

//CRUD Formulir
Route::get('/formulir', [FormulirController::class, 'index'])->middleware('auth');
Route::get('/formulir/input', [FormulirController::class, 'create'])->middleware('auth');
Route::get('/formulir/{id}/detail', [FormulirController::class, 'detail'])->middleware('auth');
Route::post('/formulir', [FormulirController::class, 'store'])->middleware('auth');
Route::get('/formulir/{id}/edit', [FormulirController::class, 'edit'])->middleware('auth');
Route::put('/formulir/{id}', [FormulirController::class, 'update'])->middleware('auth');
Route::delete('/formulir/{id}', [FormulirController::class, 'destroy'])->middleware('auth');

//CRUD Formulir
Route::get('/pinjambarang/{id}/input', [PinjamBarangController::class, 'create'])->middleware('auth');
Route::post('/pinjambarang', [PinjamBarangController::class, 'store'])->middleware('auth');
Route::get('/pinjambarang/{id}/edit', [PinjamBarangController::class, 'edit'])->middleware('auth');
Route::put('/pinjambarang/{id}', [PinjamBarangController::class, 'update'])->middleware('auth');
Route::delete('/pinjambarang/{id}', [PinjamBarangController::class, 'destroy'])->middleware('auth');

//CRUD User


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
