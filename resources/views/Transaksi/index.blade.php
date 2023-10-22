@extends('layout.layout')
@section('title', 'Daftar Transaksi')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    Data Transaksi 
                </span>
            </div>
            <div class="card-body">
                <form action="surat/hapus" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-danger" type="submit">Hapus</button>
                            <table class="table table-hover table-bordered DataTable mt-2">
                                <thead>
                                    <tr>
                                        <th>TRANSAKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi as $tx)
                                    <tr>
                                        <td>{{ $tx->log }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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