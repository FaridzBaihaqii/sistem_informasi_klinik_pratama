@extends('layout.layout')
@section('title', 'Edit Obat ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Data Obat
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input type="text" class="form-control" name="nama_obat" value="{{ $apoteker->nama_obat }}" required />
                                </div>
                                <div class="form-group">
                                    <label>Tipe Obat</label>
                                    <input type="text" class="form-control" name="nama_tipe" value="{{ $apoteker->nama_tipe }}" disabled required />
                                </div>
                                <div class="form-group">
                                    <label>Stok Obat</label>
                                    <input type="text" class="form-control" name="stok_obat" value="{{ $apoteker->stok_obat }}" required />
                                </div>
                                <div class="form-group">
                                    <label>Tanggal EXP</label>
                                    <input type="date" class="form-control" name="tgl_exp" value="{{ $apoteker->tgl_exp }}" required />
                                </div>
                                <div class="form-group">
                                    <label>Foto Obat</label>
                                    <input type="file" class="form-control" name="foto_obat" />
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_obat" value="{{ $apoteker->id_obat }}" required/>
                                </div>
                                </div>
                                @csrf
                                <div class="d-flex mt-3">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 4px;">SIMPAN</button>
                                    <a href="#" onclick="window.history.back();" class="btn btn-success">KEMBALI</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection