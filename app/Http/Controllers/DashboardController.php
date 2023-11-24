<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalRekam = DB::select('SELECT CountTotalRekamMedis() AS totalRekam')[0]->totalRekam;
        $totalObat = DB::select('SELECT CountTotalDataObat() AS totalObat')[0]->totalObat;
        $totalPendaftaran = DB::select('SELECT CountTotalPendaftaran() AS totalPendaftaran')[0]->totalPendaftaran;
        $totalPasien = DB::select('SELECT CountTotalPasien() AS totalPasien')[0]->totalPasien;
        $totalDokter = DB::select('SELECT CountTotalDokter() AS totalDokter')[0]->totalDokter;
        $data = [
            'jumlahRekam' => $totalRekam,
            'jumlahObat' => $totalObat,
            'jumlahPendaftaran' => $totalPendaftaran,
            'jumlahPasien' => $totalPasien,
            'jumlahDokter' => $totalDokter
        ];
        return view('dashboard.index', $data);
    }
}
