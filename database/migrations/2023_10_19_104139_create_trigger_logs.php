<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    protected $trgName = 'trgPendaftaranInsert';

    public function up()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS ' . $this->trgName);
        DB::unprepared(
            'CREATE TRIGGER ' . $this->trgName . ' AFTER INSERT ON pendaftaran
    FOR EACH ROW
    BEGIN
        DECLARE surat_id INT;
        DECLARE userid VARCHAR(200);
        DECLARE jenissurat VARCHAR(200);
        DECLARE tanggalsurat DATE;

        SELECT username INTO userid FROM tbl_user WHERE id_user = NEW.id_user;
        SELECT jenis_surat INTO jenissurat FROM jenis_surat WHERE id_jenis_surat = NEW.id_jenis_surat;
        SELECT tanggal_surat INTO tanggalsurat FROM surat WHERE id_surat = NEW.id_surat;

        SELECT id_surat INTO surat_id FROM surat WHERE id_surat = NEW.id_surat;
        INSERT INTO logs (logs) VALUES (CONCAT(userid, ": Melakukan Penambahan Pendaftaran Dengan Nomor ", surat_id, ", Jenis Surat ", jenissurat, " dan Tanggal Surat ", tanggalsurat));
    END'
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // DROP Trigger on Rollback
        DB::unprepared('DROP TRIGGER IF EXISTS ' . $this->trgName); //
    }
};