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
            IN new_no_telp INT,
            IN new_foto_profil TEXT
        )
        BEGIN
            DECLARE new_id_dokter INT;
        
            INSERT INTO dokter (nama_dokter, no_telp, foto_profil)
            VALUES (new_nama_dokter, new_no_telp, new_foto_profil); 

            INSERT INTO dokter (id_dokter) VALUES (new_id_dokter);
    END
        ");
        
        DB::unprepared('DROP Procedure IF EXISTS CreateDataObat');
        DB::unprepared("
        CREATE PROCEDURE CreateDataObat(
            IN new_nama_obat VARCHAR(60),
            IN new_stock_obat INT,
            IN new_id_tipe INT,
            IN new_tgl_exp date,
            IN new_foto_obat TEXT
        )
        BEGIN
            DECLARE new_id_obat INT;
        
            INSERT INTO data_obat (nama_obat, stok_obat, id_tipe, tgl_exp, foto_obat)
            VALUES (new_nama_obat, new_stok_obat, new_id_tipe, new_tgl_exp, new_foto_obat); 

            INSERT INTO data_obat (id_obat) VALUES (new_id_obat);
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
        DB::unprepared('DROP Procedure IF EXISTS CreateDataObat');
    }
};
