<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Resepsionis;
use App\Http\Middleware\UserAccess;

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

Route::middleware(['auth'])->group(function () {

    //Dashboard
    Route::prefix('dashboard')->middleware(['UserAccess:resepsionis,asisten,apoteker'])->group(function () {
        Route::get('/pasien', [DashboardController::class, 'index']);
        Route::get('/pasien/tambah', [DashboardController::class, 'create']);
        Route::post('/pasien/simpan', [DashboardController::class, 'store']);
        Route::get('/pasien/edit/{id}', [DashboardController::class, 'edit']);
        Route::post('/pasien/edit/simpan', [DashboardController::class, 'update']);
        Route::delete('/pasien/hapus', [DashboardController::class, 'destroy']);
    });

    //Asisten
    Route::prefix('admin')->middleware(['UserAccess:asisten'])->group(function () {
        Route::get('/asisten', [AsistenController::class, 'index']);
        Route::get('/asisten/tambah', [AsistenController::class, 'create']);
        Route::post('/asisten/simpan', [AsistenController::class, 'store']);
        Route::get('/asisten/edit/{id}', [AsistenController::class, 'edit']);
        Route::post('/asisten/edit/simpan', [AsistenController::class, 'update']);
        Route::delete('/asisten/hapus', [AsistenController::class, 'destroy']);
    });

    //Resepsionis
    Route::prefix('pendaftaran')->middleware(['UserAccess:resepsionis'])->group(function () {
        Route::get('/resepsionis', [ResepsionisController::class, 'index']);
        Route::get('/resepsionis/tambah', [ResepsionisController::class, 'create']);
        Route::post('/resepsionis/simpan', [ResepsionisController::class, 'store']);
        Route::get('/resepsionis/edit/{id}', [ResepsionisController::class, 'edit']);
        Route::post('/resepsionis/edit/simpan', [ResepsionisController::class, 'update']);
        Route::delete('/resepsionis/hapus', [ResepsionisController::class, 'destroy']);
    });

    //Apoteker
    Route::prefix('obat')->middleware(['UserAccess:apoteker'])->group(function () {
        Route::get('/apoteker', [ApotekerController::class, 'index']);
        Route::get('/Apoteker/tambah', [ApotekerController::class, 'create']);
        Route::post('/Apoteker/simpan', [ApotekerController::class, 'store']);
        Route::get('/Apoteker/edit/{id}', [ApotekerController::class, 'edit']);
        Route::post('/Apoteker/edit/simpan', [ApotekerController::class, 'update']);
        Route::delete('/Apoteker/hapus', [ApotekerController::class, 'destroy']);
    });

    //Transaksi klinik
    Route::prefix('transaksi')->middleware(['UserAccess:resepsionis,asisten,apoteker'])->group(function () {
        Route::get('/klinik', [TransaksiKlinikController::class, 'index']);
        Route::post('/klinik/hapus', [TransaksiKlinikController::class, 'destroy']);
    });

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::prefix('dashboard')->group(function () {
    Route::get('/akun', [AkunController::class, 'index']);
    Route::get('/akun/tambah', [AkunController::class, 'create']);
    Route::post('/akun/simpan', [AkunController::class, 'store']);
});