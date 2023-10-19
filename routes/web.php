<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApotekerController;
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

// Route::middleware(['auth'])->group(function () {

    //Dashboard
    Route::prefix('dashboard')->group(function () {
        Route::get('/pasien', [DashboardController::class, 'index']);
        Route::get('/pasien/tambah', [DashboardController::class, 'create']);
        Route::post('/pasien/simpan', [DashboardController::class, 'store']);
        Route::get('/pasien/edit/{id}', [DashboardController::class, 'edit']);
        Route::post('/pasien/edit/simpan', [DashboardController::class, 'update']);
        Route::delete('/pasien/hapus', [DashboardController::class, 'destroy']);
    });

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

    //Apoteker
    Route::prefix('obat')->group(function () {
        Route::get('/apoteker', [ApotekerController::class, 'index']);
        Route::get('/apoteker/tambah', [ApotekerController::class, 'create']);
        Route::post('/apoteker/simpan', [ApotekerController::class, 'store']);
        Route::get('/apoteker/edit/{id}', [ApotekerController::class, 'edit']);
        Route::post('/apoteker/edit/simpan', [ApotekerController::class, 'update']);
        Route::delete('/apoteker/hapus', [ApotekerController::class, 'destroy']);
    });

    //Transaksi klinik
    Route::prefix('transaksi')->group(function () {
        Route::get('/klinik', [TransaksiKlinikController::class, 'index']);
        Route::post('/klinik/hapus', [TransaksiKlinikController::class, 'destroy']);
    });

    Route::get('/logout', [AuthController::class, 'logout']);
<<<<<<< HEAD
// });
=======
});

Route::prefix('dashboard')->group(function () {
    Route::get('/akun', [AkunController::class, 'index']);
    Route::get('/akun/tambah', [AkunController::class, 'create']);
    Route::post('/akun/simpan', [AkunController::class, 'store']);
    Route::post('/akun/simpan', [AkunController::class, 'store']);
    Route::get('/akun/edit/{id}', [AkunController::class, 'edit']);
    Route::post('/akun/edit/simpan', [AkunController::class, 'update']);
});
>>>>>>> 89544ea7b7de0d15f6903913ec1ab10ad966a40e
