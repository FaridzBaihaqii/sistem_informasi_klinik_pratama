    @extends('layout.layout')
    @section('title', 'Edit Obat ')
    @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <span class="h1">
                            Edit Resep Dokter
                        </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="simpan" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Nomor Rekam Medis</label>
                                        <select name="no_rm" id="no_rm" class="form-control" required>
                                            <option value="">Pilih Rekam Medis</option>
                                            @foreach ($viewResep as $r)
                                            <option value="{{ $r->no_rm }}" {{ old('no_rm', $resep->no_rm) == $r->no_rm ? 'selected' : '' }}>
                                                {{ $r->no_rm }}
                                            </option>
                                       
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Pelayanan</label>
                                        <input type="date" class="form-control" name="tgl_pelayanan" id="tgl_pelayanan" value="{{$r->tgl_pelayanan}}" disabled/>
                                    </div>
                                    @endforeach
                                    <div class="form-group">
                                        <label>Diagnosis</label>
                                        @foreach ($viewResep as $r)    
                                        <textarea name="diagnosis" class="form-control" id="diagnosis" cols="30" rows="10"  value="{{$r->diagnosis}}" disabled></textarea>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Obat</label>
                                        <select name="id_obat" id="id_obat" class="form-control" required>
                                            <option value="" disabled>Pilih Obat</option>
                                            @foreach ($viewResep as $r)
                                                <option value="{{ $r->id_obat }}">{{ $r->nama_obat }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Aturan Pakai</label>   
                                        @foreach ($viewResep as $r) 
                                        <textarea name="aturan_pakai" class="form-control" id="aturan_pakai" cols="30" rows="10"  value="{{$r->aturan_pakai}}"></textarea>
                                        @endforeach
                                    </div>
                                   
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" name="id_resep" value="{{ $resep->id_resep }}"/>
                                    </div>
                                    </div>
                                    @csrf
                                    <div class="d-flex mt-3">
                                        <button type="submit" class="btn btn-primary" style="margin-right: 4px;">SIMPAN</button>
                                        <a href="#" onclick="window.history.back();" class="btn btn-success">KEMBALI</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <script>
            $(document).ready(function() {
                // Handle change event on select with id 'no_rm'
                $('#no_rm').change(function() {
                    var selectedNoRM = $(this).val();

                    // Perform AJAX request to retrieve data based on selected 'no_rm'
                    $.ajax({
                        url: '{{ route('getRekamData') }}',
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