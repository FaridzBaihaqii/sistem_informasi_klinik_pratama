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
        DB::unprepared('
        CREATE TRIGGER add_data_obat
        BEFORE INSERT ON data_obat
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("data_obat", CURDATE(), CURTIME(), "Tambah", "Sukses");
        END
    ');

    DB::unprepared('
<<<<<<< HEAD
        CREATE TRIGGER add_pendaftaran
        BEFORE INSERT ON pendaftaran
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("data_obat", CURDATE(), CURTIME(), "Tambah", "Sukses");
        END
    ');
=======
        CREATE TRIGGER add_data_pasien
        BEFORE INSERT ON pasien
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("pasien", CURDATE(), CURTIME(), "Tambah", "Sukses");
        END
    ');
    
    DB::unprepared('

    CREATE TRIGGER add_rekam_medis
    BEFORE INSERT ON rekam_medis
    FOR EACH ROW
    BEGIN
        INSERT logs(tabel, tanggal, jam, aksi, record)
        VALUES ("rekam_medis", CURDATE(), CURTIME(), "Tambah", "Sukses");
    END
');
>>>>>>> ab29a22d7d61c5a9515862ef60154959e3ffac52
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER add_data_obat');
<<<<<<< HEAD
        DB::unprepared('DROP TRIGGER add_data_pendaftaran');
=======
        DB::unprepared('DROP TRIGGER add_data_pasien');
        DB::unprepared('DROP TRIGGER add_rekam_medis');
>>>>>>> ab29a22d7d61c5a9515862ef60154959e3ffac52
    }
};
