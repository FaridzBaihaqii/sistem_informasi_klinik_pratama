@extends('layout.layout')
@section('title', 'Edit Obat ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit resep Medis
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Pasien</label>
                                    <input type="text" class="form-control" name="nama_pasien" value="{{ $resep->nama_pasien }}" />
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pelayanan</label>
                                    <input type="date" class="form-control" name="tgl_pelayanan" value="{{ $resep->tgl_pelayanan }}" />
                                </div>
                              
                                <div class="form-group">
                                    <label>Diagnosis</label>
                                    <input type="text" class="form-control" name="diagnosis" value="{{ $resep->diagnosis }}" />
                                </div>
                                <div class="form-group">
                                    <label>Nama Obat</label>
                                    <input type="text" class="form-control" name="diagnosis" value="{{ $resep->nama_obat }}" />
                                </div>
                               
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="nama_obat" value="{{ $resep->no_rm }}"/>
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