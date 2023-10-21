@extends('layout.layout')
@section('title', 'Edit Obat ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Rekam Medis
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Pasien</label>
                                    <input type="text" class="form-control" name="nama_pasien" value="{{ $rekam->nama_pasien }}" />
                                </div>
                                <div class="form-group">
                                    <label>Ruang</label><br>
                                    <select name="ruangan" class="form-control">
                                        <option value="A1"  {{$rekam->ruangan == 'A1' ? 'checked' : ''}}>A1</option>
                                        <option value="A2"  {{$rekam->ruangan == 'A2' ? 'checked' : ''}}>A2</option>
                                        <option value="B3"  {{$rekam->ruangan == 'B3' ? 'checked' : ''}}>B3</option>
                                        <option value="B4"  {{$rekam->ruangan == 'B4' ? 'checked' : ''}}>B4</option>
                                       
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pelayanan</label>
                                    <input type="date" class="form-control" name="tgl_pelayanan" value="{{ $rekam->tgl_pelayanan }}" />
                                </div>
                                <div class="form-group">
                                    <label>Keluhan</label>
                                    <input type="text" class="form-control" name="keluhan_rm" value="{{ $rekam->keluhan_rm }}" />
                                </div>
                                <div class="form-group">
                                    <label>Diagnosis</label>
                                    <input type="text" class="form-control" name="diagnosis" value="{{ $rekam->diagnosis }}" />
                                </div>
                                <div class="form-group">
                                    <label>Foto Pasien</label>
                                    <input type="file" class="form-control" name="foto_pasien" />
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="no_rm" value="{{ $rekam->no_rm }}"/>
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