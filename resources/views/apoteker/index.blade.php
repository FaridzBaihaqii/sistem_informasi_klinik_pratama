@extends('layout.layout')
@section('title', 'Data Obat')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1" style="color:#92E3A9; font-weight: bold;">
                        Data Obat
                    </span>
                </div>
                <br>
                <div class="card-header">
                    <span class="h5">
                        Jumlah Obat Yang Tersedia : {{$jumlahObat}}
                    </span>
                </div>
                            <hr>
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>NAMA OBAT</th>
                                    <th>TIPE OBAT</th>
                                    <th>STOK OBAT</th>
                                    <th>TANGGAL EXP</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($apoteker as $a)
                                    <tr>
                                        <td>{{ $a->nama_obat }}</td>
                                        <td>{{ $a->nama_tipe }}</td>
                                        <td>{{ $a->stok_obat }}</td>
                                        <td>{{ $a->tgl_exp }}</td>
                                        <td>
                                            <a href="apoteker/detail/{{ $a->id_obat }}"><btn class="btn btn-info">Detail</btn></a>
                                            <a href="apoteker/edit/{{ $a->id_obat }}"><btn class="btn btn-warning">EDIT</btn></a>
                                            <btn class="btn btn-danger btnHapus" idObat="{{ $a->id_obat }}">HAPUS</btn>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="apoteker/tambah">
                        <btn class="btn btn-success">Tambah Obat <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg></btn>
                    </a>
                </div>
                <div class="card-footer"> 
                </div>
            </div>
        </div>
        <br>
    </div>
@endsection

@section('footer')
    <script type="module">
        $('tbody').on('click', '.btnHapus', function(a) {
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