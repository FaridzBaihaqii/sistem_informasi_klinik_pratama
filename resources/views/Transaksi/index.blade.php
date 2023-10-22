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
            <table class="table table-bordered DataTable">
            <thead class="thead table-dark">
                <tr class="">
                    <th scope="col">No</th>
                    <th scope="col">Tabel</th>
                    <th scope="col">Tanggal </th>
                    <th scope="col">Jam</th>
                    <th scope="col">Aksi</th>
                    <th scope="col">Record</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $i)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $i->tabel }}</td>
                        <td>{{ $i->tanggal }}</td>
                        <td>{{ $i->jam }}</td>
                        <th>{{ $i->aksi }}</th>
                        <th>{{ $i->record }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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