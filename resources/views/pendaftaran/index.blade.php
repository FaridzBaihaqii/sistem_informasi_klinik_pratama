@extends('layout.layout')
@section('title', 'Data Pendaftaran')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1" style="color:#92E3A9; font-weight: bold;">
                        Data Pendaftaran
                    </span>
                </div>
                <br>
                <div class="card-header">
                    <span class="h5">
                        Jumlah Pendaftaran Yang Tercatat : {{$jumlahPendaftaran}}
                    </span>
                    <a href="resepsionis/unduh">
                        <btn class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32V274.7l-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7V32zM64 352c-35.3 0-64 28.7-64 64v32c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V416c0-35.3-28.7-64-64-64H346.5l-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352H64zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>Unduh Pendaftaran</btn>
                    </a>
                </div>
                <hr>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>NAMA PENDAFTAR</th>
                                    <th>KELUHAN</th>
                                    <th>TANGGAL PENDAFTARAN</th>
                                    <th>POLI</th>
                                    <th>JADWAL PELAYANAN</th>
                                    <th>INFO JANJI TEMU</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendaftaran as $p)
                                    <tr>
                                        <td>{{ $p->nama_pendaftar }}</td>
                                        <td>{{ $p->keluhan }}</td>
                                        <td>{{ $p->tgl_pendaftaran }}</td>
                                        <td>{{ $p->nama_poli }}</td>
                                        <td>{{ $p->jadwal_pelayanan }}</td>
                                        <td>{{ $p->info_janji }}</td>
                                        <td>
                                            <a href="resepsionis/edit/{{ $p->id_pendaftaran }}"><btn class="btn btn-primary">EDIT</btn></a>
                                            <btn class="btn btn-danger btnHapus" idPendaftaran="{{ $p->id_pendaftaran }}">HAPUS</btn>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-md-4">
                        <a href="resepsionis/tambah">
                            <btn class="btn btn-success">Tambah Pendaftaran <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg></btn>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script type="module">
        $('.DataTable tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idPendaftaran = $(this).closest('.btnHapus').attr('idPendaftaran');
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
                        url: 'resepsionis/hapus',
                        data: {
                            id_pendaftaran: idPendaftaran,
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