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
        DB::unprepared("DROP VIEW IF EXISTS view_pendaftaran;");

        DB::unprepared("
        CREATE VIEW view_pendaftaran AS
        SELECT
            p.id_pendaftaran AS id_pendaftaran,
            p.nama_pendaftaran AS nama_pendaftaran,
            p.keluhan AS keluhan,
            p.tgl_pendaftaran AS tgl_pendaftaran,
            p.id_poli AS id_poli,
            p.jadwal_pelayanan AS jadwal_pelayanan,
            p.info_janji AS info_janji,
        FROM pendaftaran p
        // INNER JOIN tipe_obat t ON d.id_tipe = t.id_tipe
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('v_pendaftaran');
        DB::unprepared("DROP VIEW IF EXISTS view_pendaftaran;");
    }
};
