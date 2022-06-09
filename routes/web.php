<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrmasController;
use App\Http\Controllers\KegiatanOrmasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DataOrmasController;
use App\Http\Controllers\DataKegiatanOrmasController;




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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/admin/ormas/list', [OrmasController::class, 'getOrmas'])->name('ormas.list');
Route::get('/admin/kegiatan-ormas/list', [KegiatanOrmasController::class, 'getKegiatanOrmas'])->name('kegiatan-ormas.list');
Route::get('/admin/management-user/list', [UserController::class, 'getUser'])->name('management-user.list');


//User
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::group(['prefix' => 'user', 'as' => 'user:'], function () {
        Route::resource('data-ormas', DataOrmasController::class);
        Route::get('/data-ormas-edit', [DataOrmasController::class, 'getDataormas'])->name('data-ormas.getDataormas');
        Route::resource('data-kegiatan-ormas', DataKegiatanOrmasController::class);
    });
});

//Admin
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin:'], function () {
        Route::resource('ormas', OrmasController::class);
        Route::get('ormas/{id}/log', [OrmasController::class, 'log'])->name('ormas.log');
        Route::get('ormas/{id}/cetak-surat-pernyataan', [OrmasController::class, 'cetakSuratPernyataan'])->name('cetak.surat.pernyataan');
        Route::get('ormas/{id}/cetak-formulir-isian', [OrmasController::class, 'cetakFormulirIsian'])->name('cetak.formulir.isian');
        Route::get('ormas/{id}/cetak-formulir-keabsahan', [OrmasController::class, 'cetakFormulirKeabsahan'])->name('cetak.formulir.keabsahan');
        Route::resource('kegiatan-ormas', KegiatanOrmasController::class);
        Route::get('management-users/{id}', [UserController::class, 'password'])->name('lihat.password');
        Route::put('management-users/{id}/edit', [UserController::class, 'passwordUpdate'])->name('ganti.password');
        Route::resource('management-user', UserController::class);
    });
});

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/profile', [UserController::class, 'cekProfile'])->name('cek.profile');
    Route::get('/ganti-password', [UserController::class, 'ubahPassword'])->name('user.password');
    Route::put('/ganti-passwordnya', [UserController::class, 'ubahPasswordnya'])->name('user.ubah.password');
    Route::get('/keluar', [UserController::class, 'logout'])->name('keluar');
});