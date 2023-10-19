<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;

class ResepsionisController extends Controller
{
    //halaman manage penggunaan, admin only
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new Akun;    
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Akun $Akun)
    {
    // $data = [
    //         'Akun' => $Akun->all()
    // ];
    $data = [
            'user' => $this->userModel->all()
    ];
    return view ('Akun.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Akun.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Akun $Akun)
    {
          
        // data dari form di view yang dikumpulkan berbentuk array akan di vilter sesuai validasi yang ditentukan
        $data = $request->validate(
            [
                'username' => ['required'],
                'password' => ['required'],
                'peran' => ['required'],
            ]
            );
            if($request->input('id_user') !== null){
                //Proses Update
                $dataUpdate = Akun::where('username', $request->input('username'))
                    ->update($data); 
                if($dataUpdate){
                    return redirect('dashboard/manage-user')->with('success', 'data Akun berhasil diupdate');
                } else {
                    return back()->with('error', 'data Akun gagal di update');
                }
            }
            else{
             //Proses Insert
            if($data):
            //Simpan jika data terisi semua
                $data['password'] = Hash::make($request->input('password'));
                if($this->userModel->create($data));
                return redirect('/dashboard/akun')->with('success','Data Pendaftaran baru berhasil ditambah');
            else:
            //Kembali ke form tambah data
                return back()->with('error','Data Pendaftaran gagal ditambahkan');
            endif;
        }
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
    public function edit(Akun $Akun, Request $request)
    {
        //
        $data = [
            'Akun' => Akun::where('id_user', $request->id)->first()
        ];
        return view('Akun.edit', $data);
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
