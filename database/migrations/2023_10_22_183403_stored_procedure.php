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
        CREATE PROCEDURE CreateDokter(
            IN new_nama_dokter VARCHAR(255),
            IN new_no_telp VARCHAR(20), -- Menggunakan VARCHAR untuk nomor telepon
            IN new_foto_profil TEXT
        )
        BEGIN
            DECLARE new_id_dokter INT;
        
            -- Sisipkan data ke dalam tabel dokter
            INSERT INTO dokter (nama_dokter, no_telp, foto_profil)
            VALUES (new_nama_dokter, new_no_telp, new_foto_profil); 
        
            -- Dapatkan ID dokter yang baru disisipkan
            SET new_id_dokter = LAST_INSERT_ID();
        
            -- Update kolom id_dokter dengan nilai yang baru disisipkan
            UPDATE dokter SET id_dokter = new_id_dokter WHERE id_dokter IS NULL;
        END
        
        
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        DB::unprepared('DROP Procedure IF EXISTS CreateDokter');
    }
};
