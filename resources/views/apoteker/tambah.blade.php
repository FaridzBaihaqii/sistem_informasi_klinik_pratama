@extends('layout.layout')
@section('title', 'Tambah Obat ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Data Obat
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="/obat/apoteker/simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                               <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input type="text" class="form-control" name="nama_obat" style="text-transform: capitalize" />
                                </div>
                                <label>Tipe Obat</label><br>
                                <select name="id_tipe" id="id_tipe" class="form-control" required>
                                        <option value="default" hidden>- pilih opsi -</option>
                                        @foreach ($tipe as $t)
                                        <option value="{{ $t->id_tipe }}">{{ $t->nama_tipe }}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label>Stok Obat</label>
                                    <input type="text" class="form-control" name="stok_obat" />
                                </div>
                                <div class="form-group">
                                    <label>Tanggal EXP</label>
                                    <input type="date" class="form-control" name="tgl_exp" />
                                </div>
                                <div class="form-group">
                                    <label>Foto Obat</label>
                                    <input type="file" class="form-control" name="foto_obat" />
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