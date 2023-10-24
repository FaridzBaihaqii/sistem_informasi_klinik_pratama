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
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalDataObat');

        DB::unprepared('
        CREATE FUNCTION CountTotalDataObat() RETURNS INT
        BEGIN
            DECLARE total INT;
            SELECT COUNT(*) INTO total FROM data_obat;
            RETURN total;
        END
        ');


        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalRekamMedis');

        DB::unprepared('
        CREATE FUNCTION CountTotalRekamMedis() RETURNS INT
        BEGIN
            DECLARE total INT;
            SELECT COUNT(*) INTO total FROM rekam_medis;
            RETURN total;
        END
        ');

        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalPendaftaran');

        DB::unprepared('
        CREATE FUNCTION CountTotalPendaftaran() RETURNS INT
        BEGIN
            DECLARE total INT;
            SELECT COUNT(*) INTO total FROM pendaftaran;
            RETURN total;
        END
        ');
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalDataObat');
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalRekamMedis');
        DB::unprepared('DROP FUNCTION IF EXISTS CountTotalPendaftaran');
    }
};
