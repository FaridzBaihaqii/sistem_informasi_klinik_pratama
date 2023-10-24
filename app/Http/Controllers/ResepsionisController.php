<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Pendaftaran;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResepsionisController extends Controller
{
    //halaman manage penggunaan, admin only
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new Pendaftaran;    
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Pendaftaran $pendaftaran)
    {
        $totalPendaftaran = DB::select('SELECT CountTotalPendaftaran() AS totalPendaftaran')[0]->totalPendaftaran;
        // Mengirim data agar ditampilkan kedalam view dengan isi array data pendaftaran
        // Array dari model pendaftaran yang disimpan dalam variabel data
    $data = [
            'pendaftaran' => $this->userModel->all(),
            'jumlahPendaftaran' => $totalPendaftaran
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
                'nama_pendaftar' => ['required'],
                'keluhan' => ['required'],
                'poli' => ['required'],
                'tgl_pendaftaran' => ['required'],
                'jadwal_pelayanan' => ['required'],
                'info_janji' => ['required'],
            ]
            );

            DB::beginTransaction();
            try{
                DB::statement("CALL CreatePendaftaran(?,?,?,?,?,?)", [$data['nama_pendaftar'],$data['keluhan'],$data['tgl_pendaftaran'],$data['poli'],$data['jadwal_pelayanan'],$data['info_janji']  ]);
                DB::commit();
                return redirect('/pendaftaran/resepsionis')->with('success', 'Data Pendaftaran Baru Berhasil Ditambah');
            }catch(Exception $e){
                DB::rollBack();
                return back()->with('error','Pendaftaran Gagal Ditambahkan');
            }
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
            'pendaftaran' => Pendaftaran::where('id_pendaftaran', $request->id)->first()
        ];
        return view('pendaftaran.edit', $data);
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $id_pendaftaran = $request->input('id_pendaftaran');

        $data = $request->validate([
            'nama_pendaftar' => 'sometimes',
            'keluhan' => 'sometimes',
            'tgl_pendaftaran' => 'sometimes',
            'poli' => 'sometimes',
            'jadwal_pelayanan' => 'sometimes',
            'info_janji' => 'sometimes',
        ]);

        DB::beginTransaction();
            try {
                $dataUpdate = $pendaftaran->where('id_pendaftaran', $id_pendaftaran)->update($data);
                DB::commit();
                return redirect('pendaftaran/resepsionis')->with('success', 'Data Berhasil Diupdate');
                
            } catch (Exception $e) {
                DB::rollback();
                dd($e->getMessage());
            }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Pendaftaran $pendaftaran)
    {
        $id_pendaftaran = $request->input('id_pendaftaran');
        $aksi = $pendaftaran->where('id_pendaftaran', $id_pendaftaran)->delete();
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
