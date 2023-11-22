<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ApotekerController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\ResepDokterController;
use App\Http\Controllers\ResepsionisController;

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
    return redirect('/dashboard/pasien');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['UserPeran:resepsionis'])->group(function() {
        // Resepsionis
            Route::get('/resepsionis', [ResepsionisController::class, 'index']);
            Route::get('/resepsionis/tambah', [ResepsionisController::class, 'create']);
            Route::post('/resepsionis/simpan', [ResepsionisController::class, 'store']);
            Route::get('/resepsionis/edit/{id}', [ResepsionisController::class, 'edit']);
            Route::get('/resepsionis/detail/{id}', [ResepsionisController::class, 'detail']);
            Route::post('/resepsionis/edit/simpan', [ResepsionisController::class, 'update']);
            Route::post('/resepsionis/detail/{id}', [ResepsionisController::class, 'detail']);
            Route::get('/resepsionis/unduh', [ResepsionisController::class, 'unduhresepsionis']);
            Route::delete('/resepsionis/hapus', [ResepsionisController::class, 'destroy']);
        //Poli
            Route::get('/pendaftaran/poli', [PoliController::class, 'index']);
            Route::get('/pendaftaran/poli/tambah', [PoliController::class, 'create']);
            Route::post('/pendaftaran/poli/simpan', [PoliController::class, 'store']);
            Route::get('/pendaftaran/poli/edit/{id}', [PoliController::class, 'edit']);
            Route::post('/pendaftaran/poli/edit/simpan', [PoliController::class, 'update']);
            Route::delete('/pendaftaran/poli/hapus', [PoliController::class, 'destroy']);
        //Dokter
            Route::get('/dokter', [DokterController::class, 'index']);
            Route::get('/dokter/tambah', [DokterController::class, 'create']);
            Route::post('/dokter/simpan', [DokterController::class, 'store']);
            Route::delete('/dokter/hapus/', [DokterController::class, 'destroy']);
            Route::post('/dokter/simpan', [DokterController::class, 'store']);
            Route::get('/dokter/edit/{id}', [DokterController::class, 'edit']);
            Route::post('/dokter/edit/simpan', [DokterController::class, 'update']);
            Route::delete('/dokter/hapus', [DokterController::class, 'destroy']);
    });

    Route::middleware(['UserPeran:apoteker'])->group(function() {
        //Apoteker
            Route::get('/obat/apoteker', [ApotekerController::class, 'index']);
            Route::get('/obat/apoteker/detail/{id}', [ApotekerController::class, 'detail']);
            Route::get('/obat/apoteker/tambah', [ApotekerController::class, 'create']);
            Route::post('/obat/apoteker/simpan', [ApotekerController::class, 'store']);
            Route::get('/obat/apoteker/edit/{id}', [ApotekerController::class, 'edit']);
            Route::post('/obat/apoteker/edit/simpan', [ApotekerController::class, 'update']);
            Route::delete('/obat/apoteker/hapus', [ApotekerController::class, 'destroy']);
            Route::get('/obat/apoteker/unduh', [ApotekerController::class, 'unduhObat']);
        //Tipe Obat
            Route::get('/obat/tipe', [TipeController::class, 'index']);
            Route::get('/obat/tipe/tambah', [TipeController::class, 'create']);
            Route::post('/obat/tipe/simpan', [TipeController::class, 'store']);
            Route::get('/obat/tipe/edit/{id}', [TipeController::class, 'edit']);
            Route::post('/obat/tipe/edit/simpan', [TipeController::class, 'update']);
            Route::delete('/obat/tipe/hapus', [TipeController::class, 'destroy']);
    });

    Route::middleware(['UserPeran:asisten'])->group(function() {
        //Rekam Medis
            Route::get('/rekam/asisten', [RekamMedisController::class, 'index']);
            Route::get('/rekam/asisten/detail/{id}', [RekamMedisController::class, 'detail']);
            Route::get('/rekam/asisten/tambah', [RekamMedisController::class, 'create']);
            Route::post('/rekam/asisten/simpan', [RekamMedisController::class, 'store']);
            Route::get('/rekam/asisten/edit/{id}', [RekamMedisController::class, 'edit']);
            Route::post('/rekam/asisten/edit/simpan', [RekamMedisController::class, 'update']);
            Route::get('/rekam/asisten/unduh', [RekamMedisController::class, 'unduhRekam']);
            Route::delete('/rekam/asisten/hapus', [RekamMedisController::class, 'destroy']);
        //Resep Dokter
            Route::get('/resep/asisten/', [ResepDokterController::class, 'index']);
            Route::get('/resep/asisten/detail/{id}', [ResepDokterController::class, 'detail']);
            Route::get('/resep/asisten/tambah', [ResepDokterController::class, 'create']);
            Route::get('/resep/asisten/get-rekam-data', [ResepDokterController::class, 'getRekamData'])->name('getRekamData'); 
            Route::post('/resep/asisten/simpan', [ResepDokterController::class, 'store']);
            Route::get('/resep/asisten/edit/{id}', [ResepDokterController::class, 'edit']);
            Route::post('/resep/asisten/edit/simpan', [ResepDokterController::class, 'update']);
            Route::delete('/resep/asisten/hapus', [ResepDokterController::class, 'destroy']);
    });

        // Pasien
        Route::get('/dashboard/pasien', [PasienController::class, 'index']);
        Route::get('/dashboard/pasien/tambah', [PasienController::class, 'create']);
        Route::post('/dashboard/pasien/simpan', [PasienController::class, 'store']);
        Route::get('/dashboard/pasien/edit/{id}', [PasienController::class, 'edit']);
        Route::get('/dashboard/pasien/detail/{id}', [PasienController::class, 'detail']);
        Route::post('/dashboard/pasien/edit/simpan', [PasienController::class, 'update']);
        Route::post('/dashboard/pasien/detail/{id}', [PasienController::class, 'detail']);
        Route::delete('/dashboard/pasien/hapus', [PasienController::class, 'destroy']);
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

    //Logout
    Route::prefix('auth')->group(function(){
       Route::get('/',[AuthController::class, 'index']);
       Route::get('/logout',[AuthController::class, 'logout']);
       Route::post('/check',[AuthController::class,'check']);
    });