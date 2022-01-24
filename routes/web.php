<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrmasController;

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

Route::get('/admin/ormas/ormas/list', [OrmasController::class, 'getOrmas'])->name('ormas.list');
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin:'], function () {
        Route::resource('ormas', OrmasController::class);
        Route::get('ormas/{id}/cetak-surat-pernyataan', [OrmasController::class, 'cetakSuratPernyataan'])->name('cetak.surat.pernyataan');
        Route::get('ormas/{id}/cetak-formulir-isian', [OrmasController::class, 'cetakFormulirIsian'])->name('cetak.formulir.isian');
        Route::get('ormas/{id}/cetak-formulir-keabsahan', [OrmasController::class, 'cetakFormulirKeabsahan'])->name('cetak.formulir.keabsahan');
    });
});