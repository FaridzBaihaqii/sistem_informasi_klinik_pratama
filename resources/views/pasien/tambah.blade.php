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
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" />
                                    @csrf
                                </div>
                                <div class="form-group">
                                    <label>Nama Pasien</label>
                                    <select name="id_pendaftaran" class="form-control">
                                        @foreach ($pendaftaran as $p)
                                            <option value="{{ $pendaftaran->id_pendaftaran }}">
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" />
                                </div>
                                <div class="form-group">
                                    <label>Foto Pasien</label>
                                    <input type="file" class="form-control" name="file" />
                                </div>
                                <div class="form-group">
                                    <label>No. Telp</label>
                                    <input type="file" class="form-control" name="text" />
                                </div>
                                <div class="col-md-4 mt-3">
                                    <button type="submit" class="btn btn-primary">SIMPAN</button>
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