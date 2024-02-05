<?php

namespace App\Http\Controllers;

use App\Models\Tipe;
use Illuminate\Http\Request;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Tipe $tipe)
    {
        
        $data = [
            'tipe' => $tipe->all()
        ];
        return view('tipe.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('tipe.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Tipe $tipe)
    {
        $data = $request->validate(
            [
                'nama_tipe'    => 'required',
            ]
        );

        
        if ($tipe->create($data)) {
            return redirect('/obat/tipe')->with('success', 'Data Tipe Obat Baru Berhasil Ditambah');
        }

        return back()->with('error', 'Data Tipe Obat Gagal Ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    // public function show(Tipe $tipe)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipe $tipe, Request $request)
    {
        $data = [
            'tipe' => Tipe::where('id_tipe', $request->id)->first()
        ];
        return view('tipe.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipe $tipe)
    {
        $data = $request->validate([
            'nama_tipe' => 'required',
        ]);

        $id_tipe = $request->input('id_tipe');

        if ($id_tipe !==null){

            $dataUpdate = $tipe->where('id_tipe', $id_tipe)->update($data);

            if($dataUpdate) {
                return redirect('obat/tipe')->with('success', 'Data Tipe Obat Berhasil Diupdate');
            }
        }

            return back()->with('error', 'Data Tipe Obat Gagal diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipe $tipe, Request $request)
    {
        $id_tipe = $request->input('id_tipe');

        // Hapus 
        $aksi = $tipe->where('id_tipe', $id_tipe)->delete();

        if ($aksi) {
            // Pesan Berhasil
            $pesan = [
                'success' => true,
                'pesan'   => 'Data Tipe Obat Berhasil Dihapus'
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
