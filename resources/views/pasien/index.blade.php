@extends('layout.layout')
<<<<<<< HEAD:resources/views/pasien/index.blade.php
@section('title', 'Data Pendaftaran')
=======
@section('title', 'Daftar Pasien')
>>>>>>> 9e96b97336651f8fd02f42d1337502e9c395cf96:resources/views/dashboard/index.blade.php
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Data Pasien
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="pasien/tambah">
                                <btn class="btn btn-success">Tambah Data Pasien</btn>
                            </a>

                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>NAMA PASIEN</th>
                                    <th>JENKEL</th>
                                    <th>TANGGAL LAHIR</th>
                                    <th>ALAMAT</th>
                                    <th>NO TELP</th>
                                    <th>NO BPJS</th>
                                    <th>FOTO PROFIL</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pasien as $p)
                                    <tr>
                                        <td>{{ $p->nama_pasien }}</td>
                                        <td>{{ $p->jenkel }}</td>
                                        <td>{{ $p->tgl_lahir }}</td>
                                        <td>{{ $p->alamat }}</td>
                                        <td>{{ $p->no_telp }}</td>
                                        <td>{{ $p->no_bpjs }}</td>
                                        <td>
                                        @if ($p-> foto_profil)
                                                <img src="{{ url('foto') . '/' . $p->foto_profil }} "
                                                    style="max-width: 250px; height: auto;" />
                                            @endif
                                        </td>
                                        <td>
<<<<<<< HEAD:resources/views/pasien/index.blade.php
                                            <a href="pasien/edit/{{ $p->id_pasien }}">
                                                <btn class="btn btn-primary">EDIT</btn>
                                            </a>
                                            <btn class="btn btn-danger btnHapus" Username="{{ $p->id_pasien }}">HAPUS</btn>
=======
                                            <a href="pasien/edit/{{ $p->username }}"><btn class="btn btn-primary">EDIT</btn></a>
                                            <btn class="btn btn-danger btnHapus" Username="{{ $p->username }}">HAPUS</btn>
>>>>>>> 9e96b97336651f8fd02f42d1337502e9c395cf96:resources/views/dashboard/index.blade.php
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script type="module">
        $('.DataTable tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let Username = $(this).closest('.btnHapus').attr('Username');
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
                        url: 'pasien/hapus',
                        data: {
                            username: Username,
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