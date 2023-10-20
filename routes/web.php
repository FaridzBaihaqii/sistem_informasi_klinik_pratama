<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResepsionisController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ApotekerController;
use App\Http\Controllers\RekamMedisController;

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
    Route::post('/', [AuthController::class, 'login']);
});

// Jika sudah login, kembali ke dalam halaman 
Route::get('/home', function () {
    return redirect('dashboard/pasien');
});

// Route::middleware(['auth'])->group(function () {

    //Asisten
    Route::prefix('admin')->group(function () {
        Route::get('/asisten', [AsistenController::class, 'index']);
        Route::get('/asisten/tambah', [AsistenController::class, 'create']);
        Route::post('/asisten/simpan', [AsistenController::class, 'store']);
        Route::get('/asisten/edit/{id}', [AsistenController::class, 'edit']);
        Route::post('/asisten/edit/simpan', [AsistenController::class, 'update']);
        Route::delete('/asisten/hapus', [AsistenController::class, 'destroy']);
    });

    //Resepsionis
    Route::prefix('pendaftaran')->group(function () {
        Route::get('/resepsionis', [ResepsionisController::class, 'index']);
        Route::get('/resepsionis/tambah', [ResepsionisController::class, 'create']);
        Route::post('/resepsionis/simpan', [ResepsionisController::class, 'store']);
        Route::get('/resepsionis/edit/{id}', [ResepsionisController::class, 'edit']);
        Route::post('/resepsionis/edit/simpan', [ResepsionisController::class, 'update']);
        Route::delete('/resepsionis/hapus', [ResepsionisController::class, 'destroy']);
    });

    // Pasien
    Route::prefix('Pasien')->group(function () {
        Route::get('/pasien', [PasienController::class, 'index']);
        Route::get('/pasien/tambah', [PasienController::class, 'create']);
        Route::post('/pasien/simpan', [PasienController::class, 'store']);
        Route::get('/pasien/edit/{id}', [PasienController::class, 'edit']);
        Route::post('/pasien/edit/simpan', [PasienController::class, 'update']);
        Route::delete('/pasien/hapus', [PasienController::class, 'destroy']);
    });

    //Apoteker
    Route::prefix('obat')->group(function () {
        Route::get('/apoteker', [ApotekerController::class, 'index']);
        Route::get('/apoteker/tambah', [ApotekerController::class, 'create']);
        Route::post('/apoteker/simpan', [ApotekerController::class, 'store']);
        Route::get('/apoteker/edit/{id}', [ApotekerController::class, 'edit']);
        Route::post('/apoteker/edit/simpan', [ApotekerController::class, 'update']);
        Route::delete('/apoteker/hapus', [ApotekerController::class, 'destroy']);
    });

    //Rekam Medis
    Route::prefix('rekam')->group(function () {
        Route::get('/asisten', [RekamMedisController::class, 'index']);
        Route::get('/asisten/tambah', [RekamMedisController::class, 'create']);
        Route::post('/asisten/simpan', [RekamMedisController::class, 'store']);
        Route::get('/asisten/edit/{id}', [RekamMedisController::class, 'edit']);
        Route::post('/asisten/edit/simpan', [RekamMedisController::class, 'update']);
        Route::delete('/asisten/hapus', [RekamMedisController::class, 'destroy']);
    });

    //Transaksi klinik
    Route::prefix('transaksi')->group(function () {
        Route::get('/klinik', [TransaksiKlinikController::class, 'index']);
        Route::post('/klinik/hapus', [TransaksiKlinikController::class, 'destroy']);
    });

    Route::get('/logout', [AuthController::class, 'logout']);

Route::prefix('auth')->group(function(){
    Route::get('/',[AuthController::class, 'index']);
    Route::get('/logout',[AuthController::class, 'logout']);
    Route::post('/check',[AuthController::class, 'check']);
});

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
