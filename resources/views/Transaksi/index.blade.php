@extends('layout.layout')
@section('title', 'History')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="">
            <div class="card-header">
                <span class="h1"  style="color:#92E3A9; font-weight: bold;">
                    History
                </span>
                <hr>
            </div>
            <br>
            <div class="card-body">
                <form method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                                    @foreach ($transaksi as $tx)
                                    <div class="card" style=" padding:10px;  ">
                                        <span class="h3">Tabel : {{ $tx->tabel }}</span >
                                        <div>
                                        <span >Tanggal : {{ $tx->tanggal }} </span >
                                        <span >Waktu : {{ $tx->jam }} </span >
                                        <span >Aksi : {{ $tx->aksi }} </span >
                                        <span >Status : {{ $tx->record }}</span >
                                        </div>
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