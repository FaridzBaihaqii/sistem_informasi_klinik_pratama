<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index(Logs $logs)
    {
        $data = [
            'transaksi' => $logs::orderBy('id_log', 'desc')->get()
        ];

        return view('transaksi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaksi.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id_log = $request->input('id_log');
        // dd($id_log);

        if ($id_log != null) {
            foreach ($id_log as $id) {
                Logs::where('id_log', $id)->delete();
            }
        }
        return redirect()->to('/transaksi/klinik')->with('success', 'Data Berhasil Dihapus');
    }
}
