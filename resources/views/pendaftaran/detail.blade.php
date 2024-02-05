@extends('layout.layout')
@section('title', 'Detail Pendaftaran')
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
                    <span class="h1" style="color:#92E3A9; font-weight: bold;">
                    Detail Data Pendaftaran
                    </span>
                </div>
                <hr>
                <div>
                <div class="card">
                    <div class="card-body m-0">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="container">
                                    @foreach ($pendaftaran as $p)
                                        <table class="table table-bordered mt-3">
                                            <tbody>
                                                <tr>
                                                    <td class="fw-bolder" style="width: 250px;">Nama Pendaftar</td>
                                                    <td style="width: 150px;">: {{$p->nama_pendaftar}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Keluhan</td>
                                                    <td>: {{$p->keluhan}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Tanggal Lahir</td>
                                                    <td>: {{$p->tgl_lahir}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Tanggal Pendaftaran</td>
                                                    <td>: {{$p->tgl_pendaftaran}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Poli</td>
                                                    <td>: {{$p->nama_poli}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Jadwal Pelayanan</td>
                                                    <td>: {{$p->jadwal_pelayanan}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Info Temu Janji</td>
                                                    <td>: {{$p->info_janji}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Konfirmasi</td>
                                                    <td>: {{ $p->status_konfirmasi }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-md-4 mt-3 d-flex">
                                            <a href="#" onclick="window.history.back();"
                                                class="btn btn-success">KEMBALI</a>
                                            <a href="/resepsionis/confirm/{{ $p->id_pendaftaran }}"
                                                class="btn btn-info mx-2 text-white">KONFIRMASI</a>
                                        </div>
                                    </div>

                                    @csrf
                                </div>

                            </div>
                        </div>
                    </div>

                    </div>
                </div>
                <div class="card-footer"> 
                </div>
            </div>
        </div>
        <br>
    </div>
@endsection

