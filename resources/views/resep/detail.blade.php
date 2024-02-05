@extends('layout.layout')
@section('title', 'Detail Resep Dokter')
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
                    Detail Resep Dokter 
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
                                    @foreach ($resep as $r)
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
                                                    <td class="fw-bolder">Nama Dokter</td>
                                                    <td>: {{$r->nama_dokter}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Tanggal Pelayanan</td>
                                                    <td>: {{$r->tgl_pelayanan}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Diagnosis</td>
                                                    <td>: {{$r->diagnosis}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Nama Obat</td>
                                                    <td>: {{$r->nama_obat}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Aturan Pakai</td>
                                                    <td>: {{$r->aturan_pakai}}</td>
                                                </tr>
                                                
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                        <div class="col-md-4 mt-3 d-inline-flex grid gap-3" style="width: 300px">
                                            <a href="#" onclick="window.history.back();" class="btn btn-info">KEMBALI</a>
                                        </div>
                                    </div>

                                    @csrf
                                </div>

                            </div>
                        </div>
                    </div>
@endsection

