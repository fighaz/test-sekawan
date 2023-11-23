<?php

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamanUser;
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

Route::get('/kendaraan', [KendaraanController::class, 'index']);

Route::get('/admin/pinjam/{idkendaraan}', [PeminjamanController::class, 'create'])->middleware('admin');
Route::post('/admin/store/', [PeminjamanController::class, 'store'])->middleware('admin');
Route::get('/admin/peminjaman', [PeminjamanController::class, 'show'])->middleware('admin');
Route::get('/admin', [PeminjamanController::class, 'index'])->middleware('admin');

Route::get('/user', [PeminjamanUser::class, 'showPeminjaman'])->middleware('user');
Route::get('/konfirm/{id}', [PeminjamanUser::class, 'konfirm'])->middleware('user');
Route::get('/tolak/{id}', [PeminjamanUser::class, 'tolak'])->middleware('user');
Route::get('/', [LoginController::class, 'index'])->middleware('user');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);