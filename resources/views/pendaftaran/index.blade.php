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
                            <btn class="btn btn-success">Tambah Pendaftaran</btn>
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