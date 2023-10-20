<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\DataObat;
use Illuminate\Http\Request;

class ApotekerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DataObat $apoteker)
    {

        $data = [
            'apoteker' => $apoteker->all()
        ];
        return view('apoteker.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('apoteker.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, DataObat $apoteker)
    {
        $data = $request->validate(
            [
                'nama_obat'    => 'required',
                'tipe_obat'    => 'required',
                'stok_obat'    => 'required',
                'tgl_exp'      => 'required',
                'foto_obat'    => 'required',
            ]
        );
        // dd($data);
        // //Proses Insert
        if ($request->hasFile('foto_obat') && $request->file('foto_obat')->isValid()) {
            $foto_file = $request->file('foto_obat');
            $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $data['foto_obat'] = $foto_nama;
        }

        if ($apoteker->create($data)) {
            return redirect('/obat/apoteker')->with('success', 'Rekam Medis Baru Berhasil Ditambah');
        }

        return back()->with('error', 'Rekam Meids Gagal Ditambahkan');
    }
    

    /**
     * Display the specified resource.
     */
    // public function show(Apoteker $apoteker)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataObat $apoteker, string $id)
    {
        $data = [
            'apoteker' =>  DataObat::where('id_obat', $id)->first()
        ];

        return view('apoteker.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataObat $apoteker)
    {
        $data = $request->validate(
            [
                'nama_obat'    => 'required',
                'tipe_obat'    => 'required',
                'stok_obat'    => 'required',
                'tgl_exp'    => 'required',
                'foto_obat'    => 'required|file',
            ]
        );

        $id_obat = $request->input('id_obat');

        if ($id_obat !== null) {
            // Process Update
            $dataUpdate = $apoteker->where('id_obat', $id_obat)->update($data);

            if ($dataUpdate) {
                return redirect('obat/apoteker')->with('success', 'Data Berhasil Diupdate');
            } else {
                return back()->with('error', 'Data Obat Gagal Diupdate');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataObat $apoteker, Request $request)
    {
        $id_obat = $request->input('id_obat');

        // Hapus 
        $aksi = $apoteker->where('id_obat', $id_obat)->delete();

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
