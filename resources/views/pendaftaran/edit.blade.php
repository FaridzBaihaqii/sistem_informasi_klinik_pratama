@extends('layout.layout')
@section('title', 'Edit Pendaftaran ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Edit Data Pendaftaran
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                            <div class="form-group">
                                    <label>Nama Pendaftar</label>
                                    <input type="text" class="form-control" name="nama_pendaftar" value="{{ $pendaftaran->nama_pendaftar }}"/>
                                </div>
                                <div class="form-group">
                                    <label>Keluhan</label>
                                    <input type="text" class="form-control" name="keluhan" value="{{ $pendaftaran->keluhan }}"/>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pendaftaran</label>
                                    <input type="date" class="form-control" name="tgl_pendaftaran" value="{{ $pendaftaran->tgl_pendaftaran }}" />
                                </div>
                                <div class="form-group">
                                    <label>Poli</label>
                                    <input type="text" class="form-control" name="nama_poli" value="{{ $pendaftaran->nama_poli }}" />
                                </div>
                                <div class="form-group">
                                    <label>Jadwal Pelayanan</label>
                                    <input type="date" class="form-control" name="jadwal_pelayanan"  value="{{ $pendaftaran->jadwal_pelayanan }}/>
                                </div>
                                <div class="form-group">
                                    <label>Info Janji Temu</label>
                                    <input type="text" class="form-control" name="info_janji" value="{{ $pendaftaran->info_janji }}"/>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id_pendaftaran" value="{{ $pendaftaran->id_pendaftaran }}"/>
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