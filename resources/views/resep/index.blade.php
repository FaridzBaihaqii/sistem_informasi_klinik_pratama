@extends('layout.layout')
@section('title', 'Daftar Resep Dokter')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <br/>
                <div class="card-header">
                    <span class="h1" style="color:#92E3A9; font-weight: bold;">
                        Resep Dokter
                    </span>
                </div>
                <div class="card-header">
                 
                </div>
                            <hr>
                        <table class="table table-hover table-bordered">
                        <a href="asisten/tambah">
                            <btn class="btn btn-success btn">Tambah Resep Dokter</btn>
                        </a>
                        <hr>
                            <thead>
                                <tr>
                                    <th>NO REKAM MEDIS</th>
                                    <th>TANGGAL PELAYANAN</th>
                                    <th>DIAGNOSIS</th>
                                    <th>OBAT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($resep as $r)
                                    <tr>
                                        <td>{{ $r->no_rm }}</td>
                                        <td>{{ $r->tgl_pelayanan}}</td>
                                        <td>{{ $r->diagnosis }}</td>
                                        <td>{{ $r->nama_obat }}</td>
                                        <td>
                                            <a href="asisten/detail/{{ $r->id_resep }}"><btn class="btn btn-info">DETAIL</btn></a>
                                            <a href="asisten/edit/{{ $r->id_resep }}"><btn class="btn btn-warning">EDIT</btn></a>
                                            <btn class="btn btn-danger btnHapus" idResep="{{ $r->id_resep }}">HAPUS</btn>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br/>
    </div>
@endsection

@section('footer')
    <script type="module">
        $('tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idResep = $(this).closest('.btnHapus').attr('idResep');
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
    </script>

@endsection