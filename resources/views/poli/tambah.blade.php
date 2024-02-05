@extends('layout.layout')
@section('title', 'Tambah Data Poli')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Data Poli
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="/pendaftaran/poli/simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                               <div class="form-group">
                                    <label>Nama Poli</label>
                                    <input type="text" class="form-control" name="nama_poli" style="text-transform: capitalize" />
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