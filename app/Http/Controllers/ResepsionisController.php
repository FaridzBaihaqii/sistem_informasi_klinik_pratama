<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResepsionisController extends Controller
{
    //halaman manage penggunaan, admin only
    protected $userModel;
    public function construct()
    {
        $this->userModel = new Pendaftaran;    
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Pendaftaran $pendaftaran)
    {
    $data = [
            'pendaftaran' => $this->userModel->all()
    ];
    return view ('pendaftaran.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create(Pendaftaran $pendaftaran)
    {

        return view('pendaftaran.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pendaftaran $pendaftaran)
    {
          
        // data dari form di view yang dikumpulkan berbentuk array akan di vilter sesuai validasi yang ditentukan
        $data = $request->validate(
            [
                'keluhan' => ['required'],
                'poli' => ['required'],
                'tgl_pendaftaran' => ['required'],
                'jadwal_pelayanan' => ['required'],
                'info_janji' => ['required'],
            ]
            );

            if ($pendaftaran->create($data)) {
                return redirect('/dashboard/resepsionis')->with('success', 'Data Pendaftaran Baru Berhasil Ditambah');
            }
            return back()->with('error','Pendaftaran Gagal Ditambahkan');
        }
    
    
    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendaftaran $pendaftaran, Request $request)
    {
        //
        $data = [
            'Pendaftaran' => Akun::where('id_user', $request->id)->first()
        ];
        return view('Pendaftaram.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Akun $Akun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Akun $Akun)
    {
        $id_user = $request->input('id_user');
        $aksi = $Akun->where('id_user',$id_user)->delete();
            if($aksi)
            {
                $pesan = [
                    'success' => true,
                    'pesan'   => 'Pendaftaran berhasil dihapus'
                ];
            }else
            {
                $pesan = [
                    'success' => false,
                    'pesan'   => 'Pendaftaran gagal dihapus'
                ];
            }
            return response()->json($pesan);

    }
}
