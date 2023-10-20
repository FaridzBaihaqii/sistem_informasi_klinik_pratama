<?php

namespace App\Http\Controllers;
use App\Models\Akun;
use App\Models\Pasien;
use Illuminate\Http\Request;

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
                return redirect('/dashboard/pasien')->with('success', 'Data Pendaftaran Baru Berhasil Ditambah');
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
        //
        $data = [
            'Pasien' => Akun::where('id_user', $request->id)->first()
        ];
        return view('Pasien.edit', $data);
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

