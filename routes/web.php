<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\AudioQueueController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController as AuthRegisterController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\InterfaceController;
use App\Http\Controllers\InterfaceOf;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PoliDokterController;
use App\Http\Controllers\Admin\PoliController;
use App\Http\Controllers\Admin\TabelpegawaiController;
use App\Http\Controllers\KelolaTampilan;
use App\Http\Controllers\ReservasiController;
use App\Http\Middleware\AdminMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Authentication Routes
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/login/register', [AuthRegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/login/registerproses', [AuthRegisterController::class, 'signupproses'])->name('registerproses');



// Landing Pages & Public Interfaces
Route::get('/landingpage', [InterfaceController::class, 'index'])->name('landingpage');
Route::get('/landingof', [InterfaceOf::class, 'index'])->name('landingof');
Route::get('/antrian', [InterfaceOf::class, 'getAntrian'])->name('antrian');
Route::get('/daftarantri', [App\Http\Controllers\DaftarantriControlller::class, 'index'])->name('daftarantri');
Route::post('/daftarantri/markascalled', [App\Http\Controllers\DaftarantriControlller::class, 'markAsCalled'])->name('daftarantri.markascalled');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/reservasi/store', [ReservasiController::class, 'store'])->name('reservasi.store');


// Antrian & Reservasi Routes
Route::post('/ambil-nomor', [InterfaceOf::class, 'ambilNomor'])->name('ambil.nomor');
Route::post('/ambil-nomor-antrian', [AntrianController::class, 'ambilNomorAntrian'])->name('ambil-nomor-antrian');
Route::post('/ambilNomorReservasi', [AntrianController::class, 'ambilNomorReservasi'])->name('ambil-nomor-reservasi');

// Reservasi Routes
Route::post('/reservasi/store', [ReservasiController::class, 'store'])->name('reservasi.store');
Route::get('/reservasi/check/{id}', [ReservasiController::class, 'checkStatus'])->name('reservasi.check');

// Audio Queue API Routes
Route::prefix('api')->group(function () {
    // Audio Queue API
    Route::prefix('audio-queue')->group(function () {
        Route::get('/next', [AudioQueueController::class, 'getNextAudio']);
        Route::post('/mark-played', [AudioQueueController::class, 'markAudioPlayed']);
        Route::get('/check', [AudioQueueController::class, 'checkPendingAudio']);
        Route::post('/complete-antrian', [AudioQueueController::class, 'completeAntrian']);
    });

    // Antrian API
    Route::post('/mark-antrian-called', [InterfaceOf::class, 'markAntrianAsCalled']);
    Route::post('/increment-call-count', [InterfaceOf::class, 'incrementCallCount']);
});

// Poli-Dokter Routes


// Dokter Routes (Protected)
Route::middleware(['auth', 'check.role:3'])->prefix('dokter')->group(function () {
    Route::get('/', [DokterController::class, 'index'])->name('dokter');
    Route::get('/antrian', [DokterController::class, 'antrian'])->name('dokter.antrian');
    Route::post('/panggil', [DokterController::class, 'panggilAntrian'])->name('dokter.panggil');
    Route::post('/panggil-antrian', [DokterController::class, 'panggilAntrian'])->name('dokter.panggil-antrian');
    Route::post('/mulai-layanan', [DokterController::class, 'mulaiLayanan'])->name('dokter.mulai-layanan');
    Route::post('/selesai-layanan', [DokterController::class, 'selesaiLayanan'])->name('dokter.selesai-layanan');
    Route::post('/rujukan/submit', [DokterController::class, 'store'])->name('dokter.rujukan.submit');

    // Reservation management for doctors
    Route::post('/accept-reservation', [DokterController::class, 'acceptReservation'])->name('dokter.accept-reservation');
    Route::post('/reject-reservation', [DokterController::class, 'rejectReservation'])->name('dokter.reject-reservation');
});

// Antrian routes (need to be after Dokter routes to avoid conflicts)
Route::post('/update-status-antrian', [DokterController::class, 'updateStatus'])->name('antrian.update-status');
Route::delete('/delete-antrian', [DokterController::class, 'delete'])->name('antrian.delete');

// Pegawai Routes (Protected)
// Route::middleware(['auth', 'check.role:2'])->prefix('pegawai')->group(function () {
//     Route::get('/', [PegawaiController::class, 'index'])->name('pegawai.pegawai');
//     Route::get('/get-dokter/{poliId}', [PegawaiController::class, 'getDokter'])->name('pegawai.get-dokter');
//     Route::get('/get-jadwal/{dokterId}', [PegawaiController::class, 'getJadwal'])->name('pegawai.get-jadwal');
//     Route::get('/antrian-poli/{poliId}', [PegawaiController::class, 'antrianPoli'])->name('pegawai.antrian_poli');
//     Route::get('/edit-jadwal', [PegawaiController::class, 'jadwal'])->name('pegawai.edit_jadwal');
//     Route::get('/editjadwal', [PegawaiController::class, 'jadwal'])->name('pegawai.jadwal');
//     Route::post('/panggil-antrian', [PegawaiController::class, 'panggilAntrian'])->name('pegawai.panggil');
//     Route::post('/akhiri-antrian', [PegawaiController::class, 'akhiriAntrian'])->name('pegawai.akhiri');
//     Route::get('/poli', [DokterController::class, 'index'])->name('pegawai.poli');
// });
// Route::get('/admin/getDokterByPoli/{id}', [JadwalController::class, 'getDokterByPoli']);

// Admin Routes (Protected)




// Route::middleware(['admin'])->prefix('admin')->group(function () {

// });

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

      // Jadwal Management
      Route::get('/edit-jadwal', [JadwalController::class, 'editJadwal'])->name('admin.edit-jadwal');
      Route::get('/editjadwal', [JadwalController::class, 'editJadwal'])->name('editjadwal');
      Route::post('/update-jadwal-dokter', [JadwalController::class, 'updateJadwal'])->name('update-jadwal-dokter');
      Route::get('/getDokterByPoli/{id}', [JadwalController::class, 'getDokterByPoli']);

      // Pegawai Management
      Route::get('/tabelpegawai', [TabelpegawaiController::class, 'index'])->name('admin.tabelpegawai');
      Route::get('/tambahpegawai', [TabelpegawaiController::class, 'create'])->name('admin.tambahpegawai.create');
      Route::post('/tambahpegawai/store', [TabelpegawaiController::class, 'store'])->name('admin.tambahpegawai');
      Route::get('/pegawai/{id}', [TabelpegawaiController::class, 'edit'])->name('admin.pegawai.edit');
      Route::post('/pegawai/{id}', [TabelpegawaiController::class, 'update'])->name('pegawai.update');
      Route::delete('/pegawai/{id}',  [TabelpegawaiController::class, 'destroy'])->name('pegawai.destroy');

      // Poli/Loket Management
      Route::get('/loket', [PoliController::class, 'create'])->name('loket.create');
      Route::post('/loket', [PoliController::class, 'store'])->name('loket.store');
      Route::delete('/poli/{id}', [PoliController::class, 'destroy'])->name('poli.destroy');
      Route::post('/poli/toggle-status/{id}', [PoliController::class, 'toggleStatus'])->name('poli.toggleStatus');

Route::get('/', [PoliController::class, 'index'])->name('landingpage');


      // Kelola Tampilan
      Route::get('/edittampilan', [KelolaTampilan::class, 'index'])->name('admin.edittampilan');
      Route::post('/edit-tampilan', [KelolaTampilan::class, 'update'])->name('edit.tampilan.update');
      Route::post('/upload-background-image', [KelolaTampilan::class, 'uploadBackgroundImage'])->name('upload.background.image');

      // Poli Dokter
      Route::get('/poli-dokter', [PoliDokterController::class, 'index'])->name('poli-dokter.index');
      Route::get('/get-dokter-by-poli/{id}', [PoliDokterController::class, 'getDokterByPoli'])->name('poli-dokter.get-dokter');

      // Antrian
      Route::get('/get-jadwal-dokter/{dokter}', [AntrianController::class, 'getJadwalDokter'])->name('get-jadwal-dokter');
      Route::get('/get-jadwal-by-dokter/{dokterId}', [InterfaceController::class, 'getJadwalByDokter'])->name('get-jadwal-by-dokter');
});
