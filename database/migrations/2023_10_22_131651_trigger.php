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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER add_data_obat');
    }
};
