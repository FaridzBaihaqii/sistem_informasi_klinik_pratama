<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\DataObat;
use App\Models\Tipe;
use Exception;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ApotekerController extends Controller
{

    protected $tipeModel;
    public function __construct()
    {
        $this->tipeModel = new Tipe;   
    }
    /**
     * Display a listing of the resource.
     */
    public function index(DataObat $apoteker)
    {

        $totalObat = DB::select('SELECT CountTotalDataObat() AS totalObat')[0]->totalObat;
        
                
        $data = [
            'apoteker' => DB::table('view_tipe')->get(),
            'jumlahObat' => $totalObat
        ];
        return view('apoteker.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */

     public function create(Tipe $tipe,)
     {
     $data = [
         'tipe' => $this->tipeModel->all(),
     ];
         return view('apoteker.tambah', $data);
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, DataObat $apoteker)
    {

        //Array Untuk memvalidasi request dari user
        $data = $request->validate(
            [
                'nama_obat'    => 'required',
                'id_tipe'    => 'required',
                'stok_obat'    => 'required',
                'tgl_exp'      => 'required',
                'foto_obat'    => 'required',
            ]
        );

        //Proses Insert
        if ($request->hasFile('foto_obat') && $request->file('foto_obat')->isValid()) {
            $foto_file = $request->file('foto_obat');
            $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $data['foto_obat'] = $foto_nama;
        }

        if (DB::statement("CALL CreateDataObat(?,?,?,?,?)", [$data['nama_obat'], $data['stok_obat'], $data['id_tipe'], $data['tgl_exp'], $data['foto_obat']])) {
            return redirect('/obat/apoteker')->with('success', 'Data Obat Baru Berhasil Ditambah');
        }

        return back()->with('error', 'Data Obat Gagal Ditambahkan');
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
            'apoteker' =>  DataObat::where('id_obat', $id)->first(),
            'apoteker' =>  DB::table('view_tipe')->where('id_obat', $id)->first (),
        ];

        return view('apoteker.edit', $data);
    }

    public function detail(DataObat $apoteker, string $id)
    {
        $data = [
            'apoteker' =>  DataObat::where('id_obat', $id)->get(),
            'apoteker' => DB::table('view_tipe')->where('id_obat', $id)->get(),

        ];

        return view('apoteker.detail', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataObat $apoteker)
    {
        $data = $request->validate(
            [
                'nama_obat'    => 'sometimes',
                'id_obat'      => 'sometimes',
                'stok_obat'    => 'sometimes',
                'tgl_exp'      => 'sometimes',
                'foto_obat'    => 'sometimes',
            ]
        );

        $id_obat = $request->input('id_obat');

        if ($id_obat !== null) {

            // Process Update
            if ($request->hasFile('foto_obat') && $request->file('foto_obat')->isValid()) {
                $foto_file = $request->file('foto_obat');
                $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
                $foto_file->move(public_path('foto'), $foto_nama);
                $data['foto_obat'] = $foto_nama;
            }

                DB::beginTransaction();
                try {
                    $dataUpdate = $apoteker->where('id_obat', $id_obat)->update($data);
                    DB::commit();
                    return redirect('obat/apoteker')->with('success', 'Data Berhasil Diupdate');

                } catch (Exception $e) {
                    DB::rollback();
                    dd($e->getMessage());
                }

            // if ($dataUpdate) {
            //     return redirect('obat/apoteker')->with('success', 'Data Berhasil Diupdate');
            // } else {
            //     return back()->with('error', 'Data Obat Gagal Diupdate');
            // }
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
                'pesan'   => 'Data Obat Berhasil Dihapus'
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

