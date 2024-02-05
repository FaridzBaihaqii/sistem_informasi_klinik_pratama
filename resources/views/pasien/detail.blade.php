@extends('layout.layout')
@section('title', 'Detail Pasien')
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
                    Detail Data Pasien
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
                                    @foreach ($pasien as $p)
                                    @if ($p->foto_profil)
                                        <div class="photo-container" style="margin-top:-20px">
                                            <br>
                                            <img src="{{ url('foto') . '/' . $p->foto_profil }} "style="max-width: 170px; height: auto;" />                                
                                        </div>
                                        @endif
                                        <table class="table table-bordered mt-3">
                                            <tbody>
                                                <tr>
                                                    <td class="fw-bolder" style="width: 250px;">Nama Pasien</td>
                                                    <td>: {{$p->nama_pasien}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Jenis Kelamin</td>
                                                    <td>: {{$p->jenkel}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Tanggal Lahir</td>
                                                    <td>: {{$p->tgl_lahir}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Alamat</td>
                                                    <td>: {{$p->alamat}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">NO TELP</td>
                                                    <td>: {{$p->no_telp}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">NO BPJS</td>
                                                    <td>: {{$p->no_bpjs}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="col-md-4 mt-3">
                                            <a href="#" onclick="window.history.back();" class="btn btn-success">KEMBALI</a>
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

