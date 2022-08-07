<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\Manage_UserController;
use App\Http\Controllers\VerifikasiController;
use App\Http\Controllers\HistoryController;

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

Route::resource('merk', MerkController::class)->middleware('checkRole:admin');
Route::resource('mobil', MobilController::class)->middleware('checkRole:admin');
Route::resource('pengguna', PenggunaController::class)->middleware('checkRole:admin');
Route::resource('manage_user', Manage_UserController::class)->middleware('checkRole:admin');
Route::resource('rental', RentalController::class)->middleware('checkRole:admin');
Route::resource('verifikasi', VerifikasiController::class);
Route::resource('history', HistoryController::class);
Route::get('/verifikasi/get_data/{kode}', [VerifikasiController::class, 'getUserData']);
Route::get('/mobil/get_data/{kode}', [MobilController::class, 'getUserData'])->middleware('checkRole:admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
