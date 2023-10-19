@extends('layout.layout')
@section('title', 'Daftar Surat')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="h1">
                        Data Obat
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
                        <table class="table table-hover table-bordered DataTable">
                            <thead>
                                <tr>
                                    <th>NAMA OBAT</th>
                                    <th>TIPE OBAT</th>
                                    <th>ALAMAT</th>
                                    <th>STOK OBAT</th>
                                    <th>TANGGAL EXP</th>
                                    <th>FOTO OBAT</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obat as $o)
                                    <tr>
                                        <td>{{ $o->tgl_lahir }}</td>
                                        <td>{{ $o->nama_oasien }}</td>
                                        <td>{{ $o->alamat }}</td>
                                        <td>
                                            @if ($s->file)
                                                <img src="{{ url('foto') . '/' . $o->file }} "
                                                    style="max-width: 250px; height: auto;" />
                                            @endif
                                        </td>
                                        <td>{{ $p->no_telp }}</td>
                                        <td>
                                            <a href="pasien/edit/{{ $p->username }}">
                                                <btn class="btn btn-primary">EDIT</btn>
                                            </a>
                                            <btn class="btn btn-danger btnHapus" Username="{{ $p->username }}">HAPUS</btn>
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