<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\password;

class AkunController extends Controller
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
    public function index(Akun $akun)
    {
    // $data = [
    //         'Akun' => $akun->all()
    // ];
    $data = [
            'akun' => $this->userModel->all()
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
    public function store(Request $request, Akun $akun)
    {
        
        // data dari form di view yang dikumpulkan berbentuk array akan di filter sesuai validasi yang ditentukan
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'peran' => 'required',
        ]);

        // dd($data);
        
        // Menyertakan 'peran' dengan nilai yang valid
        
        // Proses Insert
        if (Akun::create($data)) {
            $data['password'] = Hash::make($request->input('password'));
            if ($this->userModel->create($data)) {
                return redirect('/dashboard/akun')->with('success','Data cabang baru berhasil ditambah');
            } else {
                return back()->with("error","Data Surat Gagal Ditambahkan");
            }
        } else {
            return back()->with('error','Data cabang gagal ditambahkan');
        }
        
    }
    
    /**
     * Display the specified resource.
     */
    public function show(Akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Akun $akun, Request $request)
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
    public function update(Request $request, Akun $akun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Akun $akun, string $id)
    {
        $remove_akun = Akun::where('id_user', $id)->first();

        if ($remove_akun) {

            $remove_akun->delete();

            return redirect()->to('dashboard/jenis')->with('success', 'you are remove data');
        }else {
            return redirect()->back();
        }
    }
}
