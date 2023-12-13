@extends('layout.layout')
@section('title', 'Data Rekam Medis')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <br/>
                <div class="card-header">
                    <span class="h1" style="color:#92E3A9; font-weight: bold;">

                    </span>
                </div>
                <div class="card-header d-flex justify-content-between gap-3 row">
                    <div class="card text-center bg-white col">
                        <div class="card-body">
                                <h3 class="card-title">JUMLAH PASIEN</h3>
                            <h1 class="fw-bold">{{$jumlahPasien}}</h1>
                        </div>
                    </div>
                        <div class="card text-center bg-white col">
                            <div class="card-body">
                                    <h3 class="card-title">JUMLAH OBAT</h3>
                                <h1 class="fw-bold">{{$jumlahObat}}</h1>
                            </div>
                        </div>
                        <div class="card text-center bg-white col">
                            <div class="card-body">
                                    <h3 class="card-title">JUMLAH DOKTER</h3>
                                <h1 class="fw-bold">{{$jumlahDokter}}</h1>
                            </div>
                        </div>
                </div>
                <br>
                <div class="card-header d-flex justify-content-between gap-3 row">
                    <div class="card text-center bg-white col">
                        <div class="card-body">
                                <h3 class="card-title">JUMLAH REKAM MEDIS</h3>
                            <h1 class="fw-bold">{{$jumlahRekam}}</h1>
                        </div>
                    </div>
                    <div class="card text-center bg-white col">
                        <div class="card-body">
                                <h3 class="card-title">JUMLAH PENDAFTARAN</h3>
                            <h1 class="fw-bold">{{$jumlahPendaftaran}}</h1>
                        </div>
                    </div>
            </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
    </div>
@endsection

@section('footer')
    <script type="module">
        $('tbody').on('click', '.btnHapus', function(a) {
            a.preventDefault();
            let idRekam = $(this).closest('.btnHapus').attr('idRekam');
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
                        url: 'asisten/hapus',
                        data: {

                            no_rm: idRekam,

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