<?php

namespace App\Http\Controllers;
use App\Models\Akun;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class DokterController extends Controller
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new Dokter;    
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Dokter $dokter)
    {
    $data = [
            'dokter' => $this->userModel->all()
    ];
    return view ('dokter.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Dokter $dokter)
    {

        return view('dokter.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Dokter $dokter)
    {
          
        // data dari form di view yang dikumpulkan berbentuk array akan di vilter sesuai validasi yang ditentukan
        $data = $request->validate(
            [
                'nama_dokter' => 'required',
                'no_telp' => 'required',
                'foto_profil' => 'sometimes',
            ]
            );

            if ($request->hasFile('foto_profil') && $request->file('foto_profil')->isValid()) {
                $foto_file = $request->file('foto_profil');
                $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
                $foto_file->move(public_path('foto'), $foto_nama);
                $data['foto_profil'] = $foto_nama;
            }

            if (DB::statement("CALL CreateDokter(?,?,?)", [$data['nama_dokter'], $data['no_telp'], $data['foto_profil']])) {
                return redirect('/dokter')->with('success', 'Data Pendaftaran Baru Berhasil Ditambah');
            }
            return back()->with('error','Pendaftaran Gagal Ditambahkan');
        }

    
    /**
     * Display the specified resource.
     */
    public function show(Akun $Akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokter $dokter, Request $request)
    {
        $data = [
            'dokter' => Dokter::where('id_dokter', $request->id)->first()
        ];
        return view('dokter.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokter $dokter)
    {
        $id_dokter = $request->input('id_dokter');

        $data = $request->validate([
            'nama_dokter' => 'sometimes',
            'no_telp' => 'sometimes',
            'foto_profil' => 'sometimes',
        ]);

        if ($id_dokter !==null){
            if ($request->hasFile('foto_profil')){
                $foto_file = $request->file('foto_profil');
                $foto_extension = $foto_file->getClientOriginalExtension();
                $foto_nama= md5($foto_file->getClientOriginalName() . time()) . ' .' . $foto_extension;
                $foto_file->move(public_path('foto'), $foto_nama);            

                $update_data = $dokter->where('id_dokter', $id_dokter)->first();
                File::delete(public_path('foto') . '/' . $update_data->file);

                $data['foto_profil'] = $foto_nama;
            }

            $dataUpdate = $dokter->where('id_dokter', $id_dokter)->update($data);

            if($dataUpdate) {
                return redirect('/dokter')->with('success', 'Data berhasil diupdate');
            }
        }

        return back()->with('error', 'Data Gagal diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Dokter $dokter)
    {
        $id_dokter = $request->input('id_dokter');
        $aksi = $dokter->where('id_dokter', $id_dokter)->delete();
            if($aksi)
            {
                $pesan = [
                    'success' => true,
                    'pesan'   => 'Pendaftaran Dokter berhasil dihapus'
                ];
            }else
            {
                $pesan = [
                    'success' => false,
                    'pesan'   => 'Pendaftaran Dokter gagal dihapus'
                ];
            }
            return response()->json($pesan);

    }
}

