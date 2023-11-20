@extends('layout.layout')
@section('title', 'Data Resep Dokter')
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
                <br>
                <div class="card-header">
                 
                </div>
                            <hr>
                        <table class="table table-hover table-bordered">
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
                                            <a href="asisten/edit/{{ $r->no_rm }}"><btn class="btn btn-primary">EDIT</btn></a>
                                            <btn class="btn btn-danger btnHapus" idRekam="{{ $r->no_rm }}">HAPUS</btn>
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
<<<<<<< HEAD
                            <btn class="btn btn-success btn">Tambah resep Medis <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg></btn>
=======
                            <btn class="btn btn-success btn">Tambah Rekam Medis</btn>
>>>>>>> 4be1454a873f51a432f3e85cf3e4b53208f0a7fe
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
        $('tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idRekam = $(this).closest('.btnHapus').attr('idRekam');
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

                            no_rm: idRekam,

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