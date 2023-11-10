@extends('layout.layout')
@section('title', 'Data Obat')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h2">
                        Data Obat
                    </span>
                </div>
                <div class="card-header">
                    <span class="h5">
                        Jumlah Obat Yang Tersedia : {{$jumlahObat}}
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
                        <table class="table table-hover table-bordered">
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
                                        <td>{{ $a->nama_tipe }}</td>
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