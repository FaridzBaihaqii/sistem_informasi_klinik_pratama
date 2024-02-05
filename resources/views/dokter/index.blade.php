@extends('layout.layout')
@section('title', 'Daftar Dokter')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1" style="color:#92E3A9; font-weight: bold;">
                        Data Dokter
                    </span>
                </div>
                <hr>
                    <table class="table table-hover table-bordered">
                        <a href="dokter/tambah">
                            <btn class="btn btn-success">Tambah Data Dokter</btn>
                        </a>
                        <hr>
                            <thead>
                                <tr>
                                    <th>NAMA DOKTER</th>
                                    <th>NO TELP</th>
                                    <th>FOTO PROFIL</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dokter as $d)
                                    <tr>
                                        <td>{{ $d->nama_dokter }}</td>
                                        <td>{{ $d->no_telp }}</td>
                                        <td>
                                        @if ($d-> foto_profil)
                                                <img src="{{ url('foto') . '/' . $d->foto_profil }} "
                                                    style="max-width: 150px; height: auto;" />
                                            @endif
                                        </td>
                                        <td>

                                            <a href="dokter/edit/{{ $d->id_dokter }}"><btn class="btn btn-primary">EDIT</btn></a>
                                            <btn class="btn btn-danger btnHapus" idDokter="{{ $d->id_dokter }}">HAPUS</btn>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script type="module">
        $(' tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idDokter = $(this).closest('.btnHapus').attr('idDokter');
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
                        url: 'dokter/hapus',
                        data: {
                            id_dokter: idDokter,
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