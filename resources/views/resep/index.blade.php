@extends('layout.layout')
@section('title', 'Data resep Medis')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <br/>
                <div class="card-header">
                    <span class="h1" style="color:#92E3A9; font-weight: bold;">
                        Resep Dokter Pasien
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>NAMA PASIEN</th>
                                    <th>TANGGAL PELAYANAN</th>
                                    <th>DIAGNOSIS</th>
                                    <th>NAMA OBAT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resep as $r)
                                    <tr>
                                        <td>{{ $r->nama_pasien }}</td>
                                        <td>{{ $r->tgl_pelayanan }}</td>
                                        <td>
                                        <>{{ $r->diagnosis }}</
                                        <td>
                                        <td>
                                        <>{{ $r->nama_obat }}</
                                        <td>
                                            <a href="asisten/edit/{{ $r->id_resep }}"><btn class="btn btn-primary">EDIT</btn></a>
                                            <btn class="btn btn-danger btnHapus" idResep="{{ $r->id_resep }}">HAPUS</btn>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-md-4">
                        <a href="asisten/tambah">
                            <btn class="btn btn-success btn">Tambah resep Medis</btn>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <br/>
    </div>
@endsection

@section('footer')
    <script type="module">
        $('.DataTable tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idresep = $(this).closest('.btnHapus').attr('idResep');
            swal.fire({
                title: "Apakah anda ingin menghapus data ini?",
                showCancelButton: true,
                confirmButtonText: 'Setuju',
                cancelButtonText: `Batal`,
                confirmButtonColor: 'red'

            }).then((result) => {
                if (result.isConfirmed) {
                    //Ajax Delete
                    $.ajax({
                        type: 'DELETE',
                        url: 'asisten/hapus',
                        data: {
                            id_resep: idResep,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if (data.success) {
                                swal.fire('Berhasil di hapus!', '', 'success').then(function() {
                                    //Refresh Halaman
                                    location.reload();
                                });
                            }
                        }
                    });
                }
            });
        });
        $(document).ready(function() {
            $('.DataTable').DataTable();
        });
    </script>

@endsection