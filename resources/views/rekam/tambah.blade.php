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
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                                <div class="form-group">
                                    <label>Nama Pasien</label>
                                    <input type="text" class="form-control" name="nama_pasien" />
                                </div>
                                <div class="form-group">
                                    <label>Ruangan</label>
                                    <select name="ruangan" class="form-control">
                                        <option value="A1">A1</option>
                                        <option value="A2">A2</option>
                                        <option value="B3">B3</option>
                                        <option value="B4">B4</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pelayanan</label>
                                    <input type="date" class="form-control" name="tgl_pelayanan" />
                                </div>
                                <div class="form-group">
                                    <label>Keluhan</label>
                                    <input type="text" class="form-control" name="keluhan_rm" />
                                </div>
                                <div class="form-group">
                                    <label>Diagnosis</label>    
                                    <textarea name="diagnosis" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Foto Pasien</label>
                                    <input type="file" class="form-control" name="foto_pasien" />
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