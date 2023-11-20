<?php

namespace App\Http\Controllers;
use App\Models\Akun;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;

class PasienController extends Controller
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new Pasien;    
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Pasien $pasien)
    {
    $data = [
            'pasien' => $this->userModel->all()
    ];
    return view ('pasien.index', $data);
    }

    public function detail(Pasien $pasien, Request $request)
    {
        $data = [
            'pasien' => Pasien::where('id_pasien', $request->id)->first()
        ];
        return view('pasien.detail', $data);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Pasien $pasien)
    {

        return view('pasien.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pasien $pasien)
    {
          
        // data dari form di view yang dikumpulkan berbentuk array akan di vilter sesuai validasi yang ditentukan
        $data = $request->validate(
            [
                'nama_pasien' => 'required',
                'jenkel' => 'required',
                'tgl_lahir' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',
                'no_bpjs' => 'required',
                'foto_profil' => 'sometimes',
            ]
            );

            if ($request->hasFile('foto_profil') && $request->file('foto_profil')->isValid()) {
                $foto_file = $request->file('foto_profil');
                $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
                $foto_file->move(public_path('foto'), $foto_nama);
                $data['foto_profil'] = $foto_nama;
            }

            if ($pasien->create($data)) {
                return redirect('/resepsionis/pasien')->with('success', 'Data Pendaftaran Baru Berhasil Ditambah');
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
    public function edit(Pasien $pasien, Request $request)
    {
        $data = [
            'pasien' => Pasien::where('id_pasien', $request->id)->first()
        ];
        return view('pasien.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        $id_pasien = $request->input('id_pasien');

        $data = $request->validate([
            'nama_pasien' => 'sometimes',
            'jenkel' => 'sometimes',
            'tgl_lahir' => 'sometimes',
            'alamat' => 'sometimes',
            'no_telp' => 'sometimes',
            'no_bpjs' => 'sometimes',
            'foto_profil' => 'sometimes',
        ]);

        if ($id_pasien !==null){
            if ($request->hasFile('foto_profil')){
                $foto_file = $request->file('foto_profil');
                $foto_extension = $foto_file->getClientOriginalExtension();
                $foto_nama= md5($foto_file->getClientOriginalName() . time()) . ' .' . $foto_extension;
                $foto_file->move(public_path('foto'), $foto_nama);            
                $update_data = $pasien->where('id_pasien', $id_pasien)->first();
                File::delete(public_path('foto') . '/' . $update_data->file);
                $data['foto_profil'] = $foto_nama;
            }

            $dataUpdate = $pasien->where('id_pasien', $id_pasien)->update($data);

            if($dataUpdate) {
                return redirect('resepsionis/pasien')->with('success', 'Data berhasil diupdate');
            }
        }

        return back()->with('error', 'Data Gagal diupdate');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Pasien $pasien)
    {
        $id_pasien = $request->input('id_pasien');
        $aksi = $pasien->where('id_pasien', $id_pasien)->delete();
            if($aksi)
            {
                $pesan = [
                    'success' => true,
                    'pesan'   => 'Pendaftaran Pasien berhasil dihapus'
                ];
            }else
            {
                $pesan = [
                    'success' => false,
                    'pesan'   => 'Pendaftaran Pasien gagal dihapus'
                ];
            }
            return response()->json($pesan);
    }
}

