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

        DB::unprepared("DROP VIEW IF EXISTS view_tipe;");

        DB::unprepared("
        CREATE VIEW view_tipe AS
        SELECT
            d.id_obat AS id_obat, 
            d.nama_obat AS nama_obat,
            d.stok_obat AS stok_obat,
            d.tgl_exp AS tgl_exp,
            d.foto_obat AS foto_obat,
            t.id_tipe AS id_tipe,
            t.nama_tipe AS nama_tipe
        FROM data_obat d
        INNER JOIN tipe_obat t ON d.id_tipe = t.id_tipe

        ");

        DB::unprepared("DROP VIEW IF EXISTS view_poli;");

        DB::unprepared("
        CREATE VIEW view_poli AS
        SELECT
            pe.id_pendaftaran AS id_pendaftaran,
            pe.nama_pendaftar AS nama_pendaftar,
            pe.keluhan AS keluhan,
            pe.tgl_pendaftaran AS tgl_pendaftaran,
            pe.jadwal_pelayanan AS jadwal_pelayanan,
            pe.info_janji AS info_janji,
            p.id_poli AS id_poli,
            p.nama_poli AS nama_poli
        FROM pendaftaran pe
        INNER JOIN poli p ON pe.id_poli = p.id_poli;

        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v__rekam_medis');
        DB::unprepared("DROP VIEW IF EXISTS view_tipe;");
        DB::unprepared("DROP VIEW IF EXISTS view_poli;");
    }
};
