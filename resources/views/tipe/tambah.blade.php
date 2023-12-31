@extends('layout.layout')
@section('title', 'Tambah Obat ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Tambah Data Tipe Obat
                    </span>
                </div>
                <div class="card-body">
                    <form method="POST" action="/obat/tipe/simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-5">
                               <div class="form-group">
                                    <label>Tipe Obat</label>
                                    <input type="text" class="form-control @error('nama_tipe') is-invalid @enderror" value="{{ old('nama_tipe')}}" name="nama_tipe" style="text-transform: capitalize" />
                                    @error('nama_tipe')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
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