@extends('layout.layout')
@section('title', 'Terdaftar')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1" style="color:#92E3A9; font-weight: bold;">
                        Rekam Medis Terdaftar
                    </span>
                    <hr>
                </div>
                <br>
                <div class="card-body">
                    <form method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                @foreach ($rekam as $r)
                                    <div class="card" style="padding: 10px; display: flex; align-items: flex-start;">
                                        
                                        <span class="h3">Rekam Medis {{ $r->nama_pasien }}</span>
                                        <table class="">
                                            <tbody>
                                            <span>Ruangan : {{ $r->ruangan }} </span>
                                            <span>Keluhan : {{ $r->keluhan_rm }} </span>
                                            <span>Diagnosis : {{ $r->diagnosis }} </span>
                                            <span>Tanggal Pelayanan : {{ $r->tgl_pelayanan }}</span>
                                            <span>Status : {{ $r->nama_dokter }}</span>
                                            <div class="d-flex">
                                            @if ($r->foto_pasien)
                                            <div class="photo-container" style="margin-top:-20px">
                                                <br>
                                                <img src="{{ url('foto') . '/' . $r->foto_pasien }} "style="max-width: 130px; height: auto;" />                                
                                            </div>
                                            @endif
                                        </div>
                                        </tbody>
                                        </table>
                                    </div>
                                    <br>
                                @endforeach

                            </div>
                    </form>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        document.getElementById('checkAll').addEventListener('click', function() {
            var checkbox = document.querySelectorAll('.checkbox');
            for (var i = 0; i < checkbox.length; i++) {
                checkbox[i].checked = !checkbox[i].checked;
            }
        })
    </script>
@endsection
