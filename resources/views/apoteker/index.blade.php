@extends('layout.layout')
@section('title', 'Data Obat')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Data Obat <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M175 389.4c-9.8 16-15 34.3-15 53.1c-10 3.5-20.8 5.5-32 5.5c-53 0-96-43-96-96V64C14.3 64 0 49.7 0 32S14.3 0 32 0H96h64 64c17.7 0 32 14.3 32 32s-14.3 32-32 32V309.9l-49 79.6zM96 64v96h64V64H96zM352 0H480h32c17.7 0 32 14.3 32 32s-14.3 32-32 32V214.9L629.7 406.2c6.7 10.9 10.3 23.5 10.3 36.4c0 38.3-31.1 69.4-69.4 69.4H261.4c-38.3 0-69.4-31.1-69.4-69.4c0-12.8 3.6-25.4 10.3-36.4L320 214.9V64c-17.7 0-32-14.3-32-32s14.3-32 32-32h32zm32 64V224c0 5.9-1.6 11.7-4.7 16.8L330.5 320h171l-48.8-79.2c-3.1-5-4.7-10.8-4.7-16.8V64H384z"/></svg>
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="apoteker/tambah">
                                <btn class="btn btn-success">Tambah Obat</btn>
                            </a>

                        </div>
                        <p>
                            <hr>
                        <table class="table table-hover table-bordered ">
                            <thead>
                                <tr>
                                    <th>NAMA OBAT</th>
                                    <th>TIPE OBAT</th>
                                    <th>STOK OBAT</th>
                                    <th>TANGGAL EXP</th>
                                    <th>FOTO OBAT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apoteker as $a)
                                    <tr>
                                        <td>{{ $a->nama_obat }}</td>
                                        <td>{{ $a->tipe_obat }}</td>
                                        <td>{{ $a->stok_obat }}</td>
                                        <td>{{ $a->tgl_exp }}</td>
                                        <td>
                                            @if ($a->foto_obat)
                                                <img src="{{ url('foto') . '/' . $a->foto_obat }} "
                                                    style="max-width: 150px; height: auto;" />
                                            @endif
                                        </td>
                                        <td>
                                            <a href="apoteker/edit/{{ $a->id_obat }}"><btn class="btn btn-primary">EDIT</btn></a>
                                            <btn class="btn btn-danger btnHapus" idObat="{{ $a->id_obat }}">HAPUS</btn>
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
            let idObat = $(this).closest('.btnHapus').attr('idObat');
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
                        url: '/obat/apoteker/hapus',
                        data: {
                            id_obat: idObat,
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