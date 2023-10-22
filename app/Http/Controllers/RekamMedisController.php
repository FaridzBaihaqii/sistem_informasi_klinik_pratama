<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\RekamMedis;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekamMedisController extends Controller
{
    protected $pasienModel;
    protected $dokterModel;
    public function __construct()
    {
        $this->pasienModel = new Pasien;   
        $this->dokterModel = new Dokter;    
    }
    /**
     * Display a listing of the resource.
     */
    public function index(RekamMedis $rekam)
    {
        // join view
        // $test = RekamMedis::join('dokter', 'dokter.id_dokter','=','rekam_medis.id_dokter')
        // ->join('pasien', 'pasien.id_pasien','=','rekam_medis.id_pasien')
        // ->get(['dokter.nama_dokter','pasien.nama_pasien','rekam_medis.id_dokter','rekam_medis.ruangan','rekam_medis.tgl_pelayanan','rekam_medis.keluhan_rm','rekam_medis.diagnosis','rekam_medis.foto_pasien']);
        // Mengirim data agar ditampilkan ke dalam view dengan isi array data rekam
        
        // $data = [
        //     'rekam' => $test        
        // ];
        $data = [
            'rekam' => DB::table('v_rekam_medis_table')->get()
        ];

        // return view('rekam.index', $data);
    
        return view('rekam.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create(Pasien $pasien, Dokter $dokter)
    {
    $data = [
        'pasien' => $this->pasienModel->all(),
        'dokter' => $this->dokterModel->all()
    ];
        return view('rekam.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, RekamMedis $rekam)
    {
        $data = $request->validate(
            [
                'id_pasien'    => 'required',
                'id_dokter'    => 'required',
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RekamMedis $rekam, string $id, Pasien $pasien, Dokter $dokter)
    {
        $data = [
            'rekam' =>  RekamMedis::where('no_rm', $id)->first(),
            'pasien' => $this->pasienModel->all(),
            'dokter' => $this->dokterModel->all()
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
                'id_pasien'    => 'required',
                'id_dokter'    => 'required',
                'ruangan'    => 'required',
                'tgl_pelayanan'    => 'required',
                'keluhan_rm'      => 'required',
                'diagnosis'      => 'required',
                'foto_pasien'    => 'sometimes',
            ]
        );

        $no_rm = $request->input('no_rm');

        if ($no_rm !== null) {

            //Proses Insert
            if ($request->hasFile('foto_pasien') && $request->file('foto_pasien')->isValid()) {
                $foto_file = $request->file('foto_pasien');
                $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
                $foto_file->move(public_path('foto'), $foto_nama);
                $data['foto_pasien'] = $foto_nama;
            }

            DB::beginTransaction();
            try {
                $dataUpdate = $rekam->where('no_rm', $no_rm)->update($data);
                DB::commit();
                return redirect('rekam/asisten')->with('success', 'Data Berhasil Diupdate');
                
            } catch (Exception $e) {
                DB::rollback();
                dd($e->getMessage());
            }
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
    public function destroy(Request $request, RekamMedis $rekam)
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
