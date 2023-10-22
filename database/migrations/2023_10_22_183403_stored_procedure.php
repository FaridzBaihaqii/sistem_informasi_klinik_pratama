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
        DB::unprepared('DROP Procedure IF EXISTS CreateDokter');
        DB::unprepared("
        CREATE PROCEDURE CreatePasien(
            IN new_nama_dokter VARCHAR(255),
            IN new_no_telp BIGINT,
            IN new_foto_profil TEXT,
        )
        BEGIN
            DECLARE new_id_dokter INT;
        
            INSERT INTO dokter (nama_dokter, no_telp, foto_profil)
            VALUES (new_nama_dokter, new_no_telp, new_foto_profil); 


    END
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //

    }
};
