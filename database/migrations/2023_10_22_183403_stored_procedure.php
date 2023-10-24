<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
            -- Sisipkan data ke dalam tabel dokter
            INSERT INTO dokter (nama_dokter, no_telp, foto_profil)
            VALUES (new_nama_dokter, new_no_telp, new_foto_profil); 
        END
        
        
        ");
        
        DB::unprepared('DROP Procedure IF EXISTS CreateDataObat');
        DB::unprepared("
        CREATE PROCEDURE CreateDataObat(
            IN new_nama_obat VARCHAR(60),
            IN new_stok_obat INT,
            IN new_id_tipe INT,
            IN new_tgl_exp date,
            IN new_foto_obat TEXT
        )
        BEGIN
            INSERT INTO data_obat (nama_obat, stok_obat, id_tipe, tgl_exp, foto_obat)
            VALUES (new_nama_obat, new_stok_obat, new_id_tipe, new_tgl_exp, new_foto_obat); 
    END
        ");

        DB::unprepared('DROP Procedure IF EXISTS CreatePendaftaran');
        DB::unprepared("
        CREATE PROCEDURE CreatePendaftaran(
            IN new_nama_pendaftar VARCHAR(60),
            IN new_keluhan VARCHAR(60),
            IN new_tgl_pendaftaran DATE,
            IN new_id_poli INT,
            IN new_jadwal_pelayanan DATE,
            IN new_info_janji VARCHAR(60)
        )
        BEGIN
            INSERT INTO pendaftaran (nama_pendaftar, keluhan, tgl_pendaftaran, id_poli, jadwal_pelayanan, info_janji)
            VALUES (new_nama_pendaftar, new_keluhan, new_tgl_pendaftaran, new_id_poli, new_jadwal_pelayanan, new_info_janji); 
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
        DB::unprepared('DROP Procedure IF EXISTS CreatePendaftaran');
    }
};
