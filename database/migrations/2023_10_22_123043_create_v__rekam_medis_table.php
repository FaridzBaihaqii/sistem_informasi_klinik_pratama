<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared(
            'CREATE OR REPLACE VIEW v_rekam_medis_table AS 
                SELECT  rekam_medis.no_rm, rekam_medis.id_dokter, dokter.nama_dokter, pasien.nama_pasien, rekam_medis.ruangan, rekam_medis.tgl_pelayanan, rekam_medis.keluhan_rm, rekam_medis.diagnosis, rekam_medis.foto_pasien FROM rekam_medis 
                INNER JOIN dokter ON dokter.id_dokter = rekam_medis.id_dokter
                INNER JOIN pasien ON pasien.id_pasien = rekam_medis.id_pasien;
            '
        );

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v__rekam_medis');
    }
};
