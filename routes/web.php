<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PoliController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\InterfaceController;
use App\Http\Controllers\admin\TabelpegawaiController;
use App\Http\Controllers\Dokter\DokterController;
use App\Http\Controllers\Pegawai\PegawaiController;
use App\Http\Controllers\Login\SignController;
use App\Http\Controllers\Login\RegisterController;
use App\Http\Controllers\InterfaceOf;


Route::get('/', [InterfaceController::class, 'index']);
Route::get('/landingof', [InterfaceOf::class, 'index']);
Route::get('/dokter/dok', [DokterController::class, 'index']);
Route::get('/pegawai/pegawai', [PegawaiController::class, 'index']);
Route::get('/admin/tabelpegawai', [TabelpegawaiController::class, 'index'])->name('table.user');
Route::get('/admin/tambahpegawai', [TabelpegawaiController::class, 'tambahPegawai']);
Route::post('/admin/tambahpegawai/store', [TabelpegawaiController::class, 'store']);
Route::delete('/pegawai/{id}', [TabelpegawaiController::class, 'destroy'])->name('pegawai.destroy');
Route::get('/pegawai/{id}', [TabelpegawaiController::class, 'edit'])->name('pegawai.edit');
Route::put('/admin/pegawai/{id}', [TabelpegawaiController::class, 'update'])->name('pegawai.update');
// Di web.php

Route::prefix('admin')->group(function () {
    // Route GET untuk menampilkan form loket
    Route::get('/loket', [PoliController::class, 'create'])->name('loket.create');
    
    // Route POST untuk menyimpan data
    Route::post('/loket', [PoliController::class, 'store'])->name('loket.store');
});
Route::get('/landingpage', [PoliController::class, 'index'])->name('landing-page');
Route::post('/poli/toggle-status/{id}', [PoliController::class, 'toggleStatus'])
    ->name('poli.toggle-status');

// Jika ingin menggunakan SignController
Route::get('/login/sign-in', [SignController::class, 'index']);

// ATAU jika ingin menggunakan RegisterController
Route::get('/login/register', [RegisterController::class, 'index']);