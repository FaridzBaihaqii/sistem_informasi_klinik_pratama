@extends('layout.layout')
@section('title', 'Tambah Pasien ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="">
                    <span class="h1">
                        Tambah Data Pasien
                    </span>
                </div>
                <div class="card-body">
                <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Nama Pasien</label>
                                    <input type="text" class="form-control" name="nama_pasien" />
                                </div>
                                <label>Jenis Kelamin</label><br>
                                <select name="jenkel" class="form-control">
                                    <option value="default" hidden>- pilih opsi -</option>
                                    <option value="laki-laki">Laki-Laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" />
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" />
                                </div>
                                <div class="form-group">
                                    <label>No Telp</label>
                                    <input type="number" class="form-control" name="no_telp" />
                                </div>
                                <div class="form-group">
                                    <label>No BPJS</label>
                                    <input type="number" class="form-control" name="no_bpjs" />
                                </div>
                                <div class="form-group">
                                    <label>Foto Profil</label>
                                    <input type="file" class="form-control" name="foto_profil" />
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