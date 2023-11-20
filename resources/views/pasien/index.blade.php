@extends('layout.layout')
@section('title', 'Daftar Pasien')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1" style="color:#92E3A9; font-weight: bold;">
                        Data Pasien
                    </span>
                </div>
                            <hr>
                        <table class="table table-hover table-bordered DataTable">
                            <thead >
                                <tr class="" >
                                    <div style="backgroundcolor: #92E3A9">
                                    <th>NAMA PASIEN</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>TANGGAL LAHIR</th>
                                    <th>ALAMAT</th>
                                    <th>NO TELP</th>
                                    <th>NO BPJS</th>
                                    <th>FOTO PROFIL</th>
                                    <th>AKSI</th>
                                    </div>
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
                                                    style="max-width: 150px; height: auto;" />
                                            @endif
                                        </td>
                                        <td>

                                            <a href="pasien/edit/{{ $p->id_pasien }}"><btn class="btn btn-primary">EDIT</btn></a>

                                            <btn class="btn btn-danger btnHapus" idPasien="{{ $p->id_pasien }}">HAPUS</btn>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="pasien/tambah">
                        <btn class="btn btn-success">Tambah Data Pasien <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg></btn>
                    </a>

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
            let idPasien = $(this).closest('.btnHapus').attr('idPasien');
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
                            id_pasien: idPasien,
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