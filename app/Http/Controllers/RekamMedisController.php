<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RekamMedis $rekam)
    {

        $data = [
            'rekam' => $rekam->all()
        ];
        return view('rekam.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('rekam.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, RekamMedis $rekam)
    {
        $data = $request->validate(
            [
                'nama_pasien'    => 'required',
                'ruangan'    => 'required',
                'tgl_pelayanan'    => 'required',
                'keluhan_rm'      => 'required',
                'diagnosis'      => 'required',
                'foto_pasien'    => 'sometimes',
            ]
        );

        //Proses Insert
        if ($request->hasFile('foto_pasien') && $request->file('foto_pasien')->isValid()) {
            $foto_file = $request->file('foto_pasien');
            $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $data['foto_pasien'] = $foto_nama;
        }

        if ($rekam->create($data)) {
            return redirect('/rekam/asisten')->with('success', 'Rekam Medis Baru Berhasil Ditambah');
        }

        return back()->with('error', 'Data Obat Gagal Ditambahkan');
    }
    

    /**
     * Display the specified resource.
     */
    // public function show(rekam $rekam)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RekamMedis $rekam, string $id)
    {
        $data = [
            'rekam' =>  RekamMedis::where('no_rm', $id)->first()
        ];

        return view('rekam.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RekamMedis $rekam)
    {
        $data = $request->validate(
            [
                'nama_pasien'    => 'required',
                'ruangan'    => 'required',
                'tgl_pelayanan'    => 'required',
                'keluhan_rm'      => 'required',
                'diagnosis'      => 'required',
                'foto_pasien'    => 'sometimes',
            ]
        );

        $no_rm = $request->input('no_rm');

        if ($no_rm !== null) {
            // Process Update
            $dataUpdate = $rekam->where('no_rm', $no_rm)->update($data);

            if ($dataUpdate) {
                return redirect('/rekam/asisten')->with('success', 'Rekam Medis Berhasil Diupdate');
            } else {
                return back()->with('error', 'Rekam Medis Gagal Diupdate');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RekamMedis $rekam, Request $request)
    {
        $no_rm = $request->input('no_rm');

        // Hapus 
        $aksi = $rekam->where('no_rm', $no_rm)->delete();

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
