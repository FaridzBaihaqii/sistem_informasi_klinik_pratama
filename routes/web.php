<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApotekerController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ResepDokterController;
use App\Http\Controllers\ResepsionisController;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Jika belom login, maka muncul
Route::middleware(['guest'])->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'check']);
});

// Jika sudah login, kembali ke dalam halaman 
Route::get('/home', function () {
    return redirect('/');
});

Route::middleware(['web'])->group(function () {

    //Resepsionis
    Route::prefix('resepsionis')->group(function () {
        Route::get('/', [ResepsionisController::class, 'index']);
        Route::get('/tambah', [ResepsionisController::class, 'create']);
        Route::post('/simpan', [ResepsionisController::class, 'store']);
        Route::get('/edit/{id}', [ResepsionisController::class, 'edit']);
        Route::get('/detail/{id}', [ResepsionisController::class, 'detail']);
        Route::post('/edit/simpan', [ResepsionisController::class, 'update']);
        Route::post('/resepsionis/detail/{id}', [ResepsionisController::class, 'detail']);
        Route::get('/unduh', [ResepsionisController::class, 'unduhPendaftaran']);
        Route::delete('/hapus', [ResepsionisController::class, 'destroy']);
    });

    //Poli
    Route::prefix('pendaftaran')->group(function () {
        Route::get('/poli', [PoliController::class, 'index']);
        Route::get('/poli/tambah', [PoliController::class, 'create']);
        Route::post('/poli/simpan', [PoliController::class, 'store']);
        Route::get('/poli/edit/{id}', [PoliController::class, 'edit']);
        Route::post('/poli/edit/simpan', [PoliController::class, 'update']);
        Route::delete('/poli/hapus', [PoliController::class, 'destroy']);
    });

    // Pasien
    Route::prefix('dashboard')->group(function () {
        Route::get('/pasien', [PasienController::class, 'index']);
        Route::get('/pasien/tambah', [PasienController::class, 'create']);
        Route::post('/pasien/simpan', [PasienController::class, 'store']);
        Route::get('/pasien/edit/{id}', [PasienController::class, 'edit']);
        Route::get('/pasien/detail/{id}', [PasienController::class, 'detail']);
        Route::post('/pasien/edit/simpan', [PasienController::class, 'update']);
        Route::post('/pasien/detail/{id}', [PasienController::class, 'detail']);
        Route::delete('/pasien/hapus', [PasienController::class, 'destroy']);
    });

    //Apoteker
    Route::prefix('obat')->group(function () {
        Route::get('/apoteker', [ApotekerController::class, 'index']);
        Route::get('/apoteker/detail/{id}', [ApotekerController::class, 'detail']);
        Route::get('/apoteker/tambah', [ApotekerController::class, 'create']);
        Route::post('/apoteker/simpan', [ApotekerController::class, 'store']);
        Route::get('/apoteker/edit/{id}', [ApotekerController::class, 'edit']);
        Route::post('/apoteker/edit/simpan', [ApotekerController::class, 'update']);
        Route::delete('/apoteker/hapus', [ApotekerController::class, 'destroy']);
        Route::get('/apoteker/unduh', [ApotekerController::class, 'unduhObat']);
    });

    //Tipe Obat
    Route::prefix('obat')->group(function () {
        Route::get('/tipe', [TipeController::class, 'index']);
        Route::get('/tipe/tambah', [TipeController::class, 'create']);
        Route::post('/tipe/simpan', [TipeController::class, 'store']);
        Route::get('/tipe/edit/{id}', [TipeController::class, 'edit']);
        Route::post('/tipe/edit/simpan', [TipeController::class, 'update']);
        Route::delete('/tipe/hapus', [TipeController::class, 'destroy']);
    });

    //Rekam Medis
    Route::prefix('rekam')->group(function () {
        Route::get('/asisten', [RekamMedisController::class, 'index']);
        Route::get('/asisten/detail/{id}', [RekamMedisController::class, 'detail']);
        Route::get('/asisten/tambah', [RekamMedisController::class, 'create']);
        Route::post('/asisten/simpan', [RekamMedisController::class, 'store']);
        Route::get('/asisten/edit/{id}', [RekamMedisController::class, 'edit']);
        Route::post('/asisten/edit/simpan', [RekamMedisController::class, 'update']);
        Route::get('/asisten/unduh', [RekamMedisController::class, 'unduhRekam']);
        Route::delete('/asisten/hapus', [RekamMedisController::class, 'destroy']);
    });

    //Resep Dokter
    Route::prefix('resep/asisten')->group(function () {
        Route::get('/', [ResepDokterController::class, 'index']);
        Route::get('/detail/{id}', [ResepDokterController::class, 'detail']);
        Route::get('/tambah', [ResepDokterController::class, 'create']);
        Route::get('/get-rekam-data', [ResepDokterController::class, 'getRekamData'])->name('getRekamData'); 
        Route::post('/simpan', [ResepDokterController::class, 'store']);
        Route::get('/edit/{id}', [ResepDokterController::class, 'edit']);
        Route::post('/edit/simpan', [ResepDokterController::class, 'update']);
        Route::delete('/hapus', [ResepDokterController::class, 'destroy']);
    });
    // routes/web.php


    //Transaksi klinik
    Route::prefix('transaksi')->group(function () {
        Route::get('/klinik', [TransaksiController::class, 'index']);
        Route::post('/klinik/hapus', [TransaksiController::class, 'destroy']);
    });

    //Akun
    Route::prefix('dashboard')->group(function () {
        Route::get('/akun', [AkunController::class, 'index']);
        Route::get('/akun/tambah', [AkunController::class, 'create']);
        Route::post('/akun/simpan', [AkunController::class, 'store']);
        Route::delete('/akun/hapus/', [AkunController::class, 'destroy']);
        Route::post('/akun/simpan', [AkunController::class, 'store']);
        Route::get('/akun/edit/{id}', [AkunController::class, 'edit']);
        Route::post('/akun/edit/simpan', [AkunController::class, 'update']);
        Route::delete('/akun/hapus', [AkunController::class, 'destroy']);
    });

    //Dokter
    Route::prefix('resepsionis')->group(function () {
        Route::get('/dokter', [DokterController::class, 'index']);
        Route::get('/dokter/tambah', [DokterController::class, 'create']);
        Route::post('/dokter/simpan', [DokterController::class, 'store']);
        Route::delete('/dokter/hapus/', [DokterController::class, 'destroy']);
        Route::post('/dokter/simpan', [DokterController::class, 'store']);
        Route::get('/dokter/edit/{id}', [DokterController::class, 'edit']);
        Route::post('/dokter/edit/simpan', [DokterController::class, 'update']);
        Route::delete('/dokter/hapus', [DokterController::class, 'destroy']);
    });

    //Logout
    Route::prefix('auth')->group(function(){
       Route::get('/',[AuthController::class, 'index']);
       Route::get('/logout',[AuthController::class, 'logout']);
       Route::post('/check',[AuthController::class,'check']);
    });

});