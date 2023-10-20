@extends('layout.layout')
@section('title', 'Daftar Surat')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1">
                        Data Akun Pegawai
                    </span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <p>
                            <hr>
                        <table class="table table-hover ">
                            <thead class='table-dark'>
                                <tr>
                                    <th>Username</th>
                                    <th>Peran</th>
                                    {{-- <th>Foto</th> --}}
                                    <th>AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($akun as $a)
                                    <tr>
                                        <td>{{ $a->username }}</td>
                                        <td>{{ $a->peran }}</td>
                                        {{-- <td>
                                            @if ($a->file)
                                                <img src="{{ url('foto') . '/' . $a->file }} "
                                                    style="max-width: 250px; height: auto;" />
                                            @endif
                                        </td> --}}
                                        <td class="grid gap-3">
                                            <a href="akun/edit/{{ $a->id_user }}">
                                                <btn class="btn btn-primary">EDIT</btn>
                                            </a>
                                            <btn class="btn btn-danger btnHapus" idHapus="{{ $a->id_user }}">HAPUS</btn>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 float-m-end">
                    <a href="akun/tambah">
                        <btn class="btn btn-success">Tambah Akun</btn>
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
            let idHapus = $(this).closest('.btnHapus').attr('idHapus');
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
                        url: 'akun/hapus',
                        data: {
                            id_user: idHapus,
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