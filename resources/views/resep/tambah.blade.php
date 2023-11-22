@extends('layout.layout')
@section('title', 'Tambah Resep Dokter ')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="card-header">
                    <span class="h1">
                        Tambah Resep Dokter
                    </span>
                    
                </div>
                <br>
                <div class="card-body" >
                    <form method="POST" action="simpan" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group">
                                <label>Nomor Rekam Medis</label>
                                <select name="no_rm" id="no_rm" class="form-control" required>
                                    <option value="" selected disabled>Pilih Rekam Medis</option>
                                    @foreach ($rekam as $r)
                                    <option value="{{ $r->no_rm }}">{{ $r->no_rm }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Dokter</label>    
                                <input type='text' name="nama_dokter" class="form-control" id="nama_dokter" disabled></input>
                            </div>
                            <div class="form-group">
                                <label>Nama Pasien</label>    
                                <input type='text' name="nama_pasien" class="form-control" id="nama_pasien" disabled></input>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pelayanan</label>
                                <input type="date" class="form-control" name="tgl_pelayanan" id="tgl_pelayanan" disabled/>
                            </div>
                            <div class="form-group">
                                <label>Diagnosis</label>    
                                <textarea name="diagnosis" class="form-control" id="diagnosis" cols="30" rows="10" disabled></textarea>
                            </div>
                            <div class="form-group">
                                <label>Nama Obat</label>
                                <select name="id_obat" id="id_obat" class="form-control" required>
                                    <option value="" disabled>Pilih Obat</option>
                                    @foreach ($obat as $o)
                                        <option value="{{ $o->id_obat }}">{{ $o->nama_obat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Aturan Pakai</label>    
                                <textarea name="aturan_pakai" class="form-control" id="aturan_pakai" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        @csrf
                        <div class="d-flex mt-3">
                            <button type="submit" class="btn btn-primary" style="margin-right: 4px;">SIMPAN</button>
                            <a href="#" onclick="window.history.back();" class="btn btn-success">KEMBALI</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jika Anda belum memasukkan jQuery, pastikan untuk memasukkannya -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Handle change event on select with id 'no_rm'
            $('#no_rm').change(function() {
                var selectedNoRM = $(this).val();

                // Perform AJAX request to retrieve data based on selected 'no_rm'
                $.ajax({
                    url: '/resep/asisten/get-rekam-data',
                    method: 'GET',
                    data: {
                        'no_rm': selectedNoRM
                    },
                    success: function(response) {
                        // Update the values of 'tgl_pelayanan' and 'diagnosis' based on the response
                        $('#tgl_pelayanan').val(response.tgl_pelayanan);
                        $('#diagnosis').val(response.diagnosis);
                        $('#nama_pasien').val(response.nama_pasien);
                        $('#nama_dokter').val(response.nama_dokter);
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            });
        });
    </script>


@endsection