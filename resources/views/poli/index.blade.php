@extends('layout.layout')
@section('title', 'Daftar Poli')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1" style="color:#92E3A9; font-weight: bold;">
                        Data Poli
                    </span>
                </div>
                            <hr>
                        <table class="table table-hover table-bordered">
                        <a href="poli/tambah">
                        <btn class="btn btn-success">Tambah Poli</btn>
                    </a>
                <hr>
                            <thead>
                                <tr>
                                    <th>NAMA POLI</th>
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($poli as $p)
                                    <tr>
                                        <td>{{ $p->nama_poli }}</td>
                                        <td>
                                            <a href="poli/edit/{{ $p->id_poli }}"><btn class="btn btn-primary">EDIT</btn></a>
                                            <btn class="btn btn-danger btnHapus" idPoli="{{ $p->id_poli }}">HAPUS</btn>
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
        $('tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idPoli = $(this).closest('.btnHapus').attr('idPoli');
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
                        url: '/pendaftaran/poli/hapus',
                        data: {
                            id_poli: idPoli,
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