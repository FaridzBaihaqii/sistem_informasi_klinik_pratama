@extends('layout.layout')
@section('title', 'History')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <span class="h1">
                    History
                </span>
            </div>
            <div class="card-body">
                <form method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-hover table-bordered DataTable mt-2">
                                <thead>
                                    <tr>
                                        <th>Tabel</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Aksi</th>
                                        <th>Record</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaksi as $tx)
                                    <tr>
                                        <td>{{ $tx->tabel }}</td>
                                        <td>{{ $tx->tanggal }}</td>
                                        <td>{{ $tx->jam }}</td>
                                        <td>{{ $tx->aksi }}</td>
                                        <td>{{ $tx->record }}</td>
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