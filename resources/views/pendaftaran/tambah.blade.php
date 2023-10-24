@extends('layout.layout')
@section('title', 'Tambah Pendaftaran ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Data Pendaftaran
                    </span>
                </div>
                <div class="card-body">
                <form method="POST" action="simpan">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Pendaftar</label>
                                    <input type="text" class="form-control" name="nama_pendaftar" />
                                </div>
                                <div class="form-group">
                                    <label>Keluhan</label>
                                    <input type="text" class="form-control" name="keluhan" />
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pendaftaran</label>
                                    <input type="date" class="form-control" name="tgl_pendaftaran" />
                                </div>
                                <div class="form-">
                                <label>Poli</label><br>
                                <select name="poli" class="form-control">
                                    <option value="poli_umum">Poli Umum</option>
                                    <option value="poli_gigi">Poli Gigi</option>
                                </select>
                                </div>
                                <div class="form-group">
                                    <label>Jadwal Pelayanan</label>
                                    <input type="date" class="form-control" name="jadwal_pelayanan" />
                                </div>
                                <div class="form-group">
                                    <label>Info Janji Temu</label>
                                    <input type="text" class="form-control" name="info_janji" />
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