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
        DB::unprepared("DROP VIEW IF EXISTS view_rekam");

        DB::unprepared("
        CREATE VIEW view_rekam AS
        SELECT
            r.no_rm AS no_rm, 
            r.ruangan AS ruangan,
            r.keluhan_rm AS keluhan_rm,
            r.diagnosis AS diagnosis,
            r.tgl_pelayanan AS tgl_pelayanan,
            r.foto_pasien AS foto_pasien,
            p.id_pasien AS id_pasien,
            p.nama_pasien AS nama_pasien,
            d.id_dokter AS id_dokter,
            d.nama_dokter AS nama_dokter
        FROM rekam_medis r
        INNER JOIN pasien p ON r.id_pasien = p.id_pasien
        INNER JOIN dokter d ON r.id_dokter = d.id_dokter;

        ");

        DB::unprepared("DROP VIEW IF EXISTS view_resep");

        DB::unprepared("
        CREATE VIEW view_resep AS
        SELECT
            re.id_resep AS id_resep, 
            re.aturan_pakai AS aturan_pakai, 
            r.no_rm AS no_rm,
            r.diagnosis AS diagnosis,
            r.tgl_pelayanan AS tgl_pelayanan,
            p.id_pasien AS id_pasien,
            p.nama_pasien AS nama_pasien,
            d.id_dokter AS id_dokter,
            d.nama_dokter AS nama_dokter,
            o.id_obat AS id_obat,
            o.nama_obat AS nama_obat
        FROM resep_dokter re
        INNER JOIN rekam_medis r ON re.no_rm = r.no_rm
        INNER JOIN pasien p ON r.id_pasien = p.id_pasien
        INNER JOIN dokter d ON r.id_dokter = d.id_dokter
        INNER JOIN data_obat o ON re.id_obat = o.id_obat;
        ");

        // DB::unprepared(
        //     'CREATE OR REPLACE VIEW v_rekam_medis_table AS 
        //         SELECT  rekam_medis.no_rm, rekam_medis.id_dokter, dokter.nama_dokter, pasien.nama_pasien, rekam_medis.ruangan, rekam_medis.tgl_pelayanan, rekam_medis.keluhan_rm, rekam_medis.diagnosis, rekam_medis.foto_pasien FROM rekam_medis 
        //         INNER JOIN dokter ON dokter.id_dokter = rekam_medis.id_dokter
        //         INNER JOIN pasien ON pasien.id_pasien = rekam_medis.id_pasien;
        //     '
        // );

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
