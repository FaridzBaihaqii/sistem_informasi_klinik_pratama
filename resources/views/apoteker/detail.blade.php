@extends('layout.layout')
@section('title', 'Data Obat')
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
                    Detail Data Obat
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
                                    @foreach ($apoteker as $a)
                                        @if ($a->foto_obat)
                                        <div class="photo-container" style="margin-top:-20px">
                                            <br>
                                            <img src="{{ url('foto') . '/' . $a->foto_obat }} "style="max-width: 170px; height: auto;" />                                </div>
                                        @endif
                                        <table class="table table-bordered mt-3">
                                            <tbody>
                                                <tr>
                                                    <td class="fw-bolder">Nama Obat</td>
                                                    <td>: {{$a->nama_obat}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Tipe Obat</td>
                                                    <td>: {{$a->nama_tipe}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Stok Obat</td>
                                                    <td>: {{$a->stok_obat}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="fw-bolder">Tanggal Exp</td>
                                                    <td>: {{$a->tgl_exp}}</td>
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

                    
                <!-- </div>
                        
                                @foreach ($apoteker as $a)
                                        {{ $a->nama_obat }}
                                        {{ $a->nama_tipe }}
                                        {{ $a->stok_obat }}
                                        {{ $a->tgl_exp }}
                                        
                                            @if ($a->foto_obat)
                                                <img src="{{ url('foto') . '/' . $a->foto_obat }} "
                                                    style="max-width: 150px; height: auto;" />
                                            @endif
                                        
                                    </tr>
                                @endforeach -->

                    </div>
                </div>
                <div class="card-footer"> 
                </div>
            </div>
        </div>
        <br>
    </div>
@endsection

