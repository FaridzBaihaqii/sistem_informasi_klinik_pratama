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
                                    <input type="text" class="form-control @error('nama_obat') is-invalid @enderror" value="{{ old('nama_obat')}}" name="nama_obat" style="text-transform: capitalize" />
                                    @error('nama_obat')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tipe Obat</label><br>
                                    <select name="id_tipe" class="form-control @error('id_tipe') is-invalid @enderror" >
                                            <option value="" selected disabled>- pilih opsi -</option>
                                        @foreach ($tipe as $t)
                                            <option value="{{ $t->id_tipe }}" {{old('id_tipe', request('id_tipe')) == $t->id_tipe ? 'selected' : ''}}>
                                                {{ $t->nama_tipe }}</option>
                                        @endforeach
                                    </select>
                                    @error('id_tipe')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Stok Obat</label>
                                    <input type="text" class="form-control @error('stok_obat') is-invalid @enderror" value="{{ old('stok_obat')}}" name="stok_obat" />
                                    @error('stok_obat')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Tanggal EXP</label>
                                    <input type="date" class="form-control @error('tgl_exp') is-invalid @enderror" value="{{ old('tgl_exp')}}" name="tgl_exp" />
                                    @error('tgl_exp')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Foto Obat</label>
                                    <input type="file" class="form-control @error('foto_obat') is-invalid @enderror" value="{{ old('foto_obat')}}" name="foto_obat" />
                                    @error('foto_obat')
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