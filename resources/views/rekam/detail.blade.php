@extends('layout.layout')
@section('title', 'Detail Rekam Medis')
@section('content')
<style>
    table{
        border:1px solid transparent !important;
    }

</style>
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1" style="color:#92E3A9; font-weight: bold; text: center;">
                    Detail Rekam Medis 
                    </span>
                </div>
                <hr>
                <div>
                <div class="card">
                    <div class="card-body m-0">
                        <div class="">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="container">
                                    @foreach ($rekam as $r)
                                        @if ($r->foto_pasien)
                                        <div class="photo-container" style="margin-top:-20px">
                                            <br>
                                            <img src="{{ url('foto') . '/' . $r->foto_pasien }} "style="max-width: 170px; height: auto;" />                                
                                        </div>
                                        @endif
                                        <table class="table table-bordered mt-3">
                                            <tbody>
                                                <tr>
                                                    <td class="fw-bolder">NO Rekam Medis</td>
                                                    <td>: {{$r->no_rm}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Nama Pasien</td>
                                                    <td>: {{$r->nama_pasien}}</td>
                                                </tr>
                                            
                                                <tr>
                                                    <td class="fw-bolder">Ruangan</td>
                                                    <td>: {{$r->ruangan}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Keluhan</td>
                                                    <td>: {{$r->keluhan_rm}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Diagnosis</td>
                                                    <td>: {{$r->diagnosis}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Tanggal Pelayanan</td>
                                                    <td>: {{$r->tgl_pelayanan}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Nama Dokter</td>
                                                    <td>: {{$r->nama_dokter}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                        <div class="col-md-4 mt-3 d-inline-flex grid gap-3" style="width: 300px">
                                            <a href="#" onclick="window.history.back();" class="btn btn-info">KEMBALI</a>
                                            <a href="{{ url('resep/asisten/tambah') }}" onclick="window.history.back();" class="btn btn-warning"> Buat Resep Dokter</a>
                                        </div>
                                    </div>

                                    @csrf
                                </div>

                            </div>
                        </div>
                    </div>
@endsection

