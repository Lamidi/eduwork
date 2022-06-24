<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PresensiController;

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
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('presensi', PresensiController::class);
});
Route::get('test_spatie', [App\Http\Controllers\PresensiController::class, 'test_spatie']);
Route::get('/masuk', [PresensiController::class, 'index'])->name('masuk');
Route::get('/rekap_karyawan', [PresensiController::class, 'halamanrekap'])->name('rekap_karyawan');
Route::post('/simpan_masuk', [App\Http\Controllers\PresensiController::class, 'store']);
Route::post('/simpan_keluar', [App\Http\Controllers\PresensiController::class, 'presensipulang']);
