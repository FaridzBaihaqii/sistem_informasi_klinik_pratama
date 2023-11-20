<?php

namespace App\Http\Controllers;

use App\Models\DataObat;
use App\Models\RekamMedis;
use App\Models\ResepDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResepDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ResepDokter $resep)
    {
        $data = [
            'resep' => $resep
                        ->join('rekam_medis', 'resep_dokter.no_rm' , '=', 'rekam_medis.no_rm')
                        ->join('data_obat', 'resep_dokter.id_obat' , '=', 'data_obat.id_obat')->get(),
            'jumlahRekam' => DB::select('SELECT CountTotalRekamMedis() AS totalRekam')[0]->totalRekam
        ];
    
        return view('resep.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create(RekamMedis $rekam, DataObat $data_obat)
    {
        $data = [
            'rekam' => $rekam->all(),
            'obat' => $data_obat->all()
        ];
        // dd($data);
        return view('resep.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, ResepDokter $resep)
    {
        $data = $request->validate(
            [
                'no_rm'      => 'required',
                'id_obat'    => 'required',
            ]
        );

        //Proses Insert

        if ($resep->create($data)) {
            return redirect('/resep/asisten')->with('success', 'Resep Dokter Baru Berhasil Ditambah');
        }

        return back()->with('error', 'Data Obat Gagal Ditambahkan');
    }

    public function getRekamData(Request $request, RekamMedis $rekam)
    {
        $no_rm = $request->input('no_rm');

        // Fetch data based on the selected 'no_rm'
        $rekamData = $rekam->where('no_rm', $no_rm)->first();

        return response()->json([
            'tgl_pelayanan' => $rekamData->tgl_pelayanan,
            'diagnosis' => $rekamData->diagnosis,
    ]);
    }
    

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ResepDokter $resep, string $id)
    {
        $data = [
            'resep' =>  ResepDokter::where('id_resep', $id)->first()
        ];

        return view('resep.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ResepDokter $resep)
    {
        $data = $request->validate(
            [
                'id_obat' => 'required',
                'no_rm'   => 'required',
            ]
        );

        $id_resep = $request->input('id_resep');

        if ($id_resep !== null) {
            // Process Update
            $dataUpdate = $resep->where('id_resep', $id_resep)->update($data);

            if ($dataUpdate) {
                return redirect('/resep/asisten')->with('success', 'resep Medis Berhasil Diupdate');
            } else {
                return back()->with('error', 'resep Medis Gagal Diupdate');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, ResepDokter $resep)
    {
        $id_resep = $request->input('id_resep');

        // Hapus 
        $aksi = $resep->where('id_resep', $id_resep)->delete();

        if ($aksi) {
            // Pesan Berhasil
            $pesan = [
                'success' => true,
                'pesan'   => 'Data jenis surat berhasil dihapus'
            ];
        } else {
            // Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan'   => 'Data gagal dihapus'
            ];
        }

        return response()->json($pesan);
    }
}
