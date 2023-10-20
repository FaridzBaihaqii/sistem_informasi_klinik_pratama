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
                <form action="simpan" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nama Pasien</label>
                            <input type="text" class="form-control" name="id_pasien">
                            @foreach ($JenisPendaftaran as $J)
                                <option value="{{ $pendaftaran->id_pasien }}">
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Poli</label>
                            <input typr="text" class="form-control" name="id_poli"
                        </div>
                        <div class="form-group">
                            <label for="keluhan">keluhan</label>
                            <input type="number" class="form-control" name="keluhan">
                        </div>
                        <div class="form-group">
                           <label>Tanggal Pendaftaran</label>
                           <input type="date" class="form-control" name="tgl_pendaftaran" />
                        </div>
                        <div class="form-group">
                           <label>Jadwal Pelayanan</label>
                           <input type="date" class="form-control" name="jadwal_pelayanan" />
                        </div>
                        <div class="mt-3">
                            {{-- <a href="#" onclick="window.history.back();" class="btn btn-success">KEMBALI</a> --}}
                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection