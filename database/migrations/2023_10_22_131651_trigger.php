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
        CREATE TRIGGER add_pendaftaran
        BEFORE INSERT ON pendaftaran
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("pendaftaran", CURDATE(), CURTIME(), "Tambah", "Sukses");
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

    DB::unprepared('
        CREATE TRIGGER add_resep_dokter
        BEFORE INSERT ON resep_dokter
        FOR EACH ROW
        BEGIN
            INSERT logs(tabel, tanggal, jam, aksi, record)
            VALUES ("resep_dokter", CURDATE(), CURTIME(), "Tambah", "Sukses");
        END
    ');

    DB::unprepared('
        CREATE TRIGGER add_pasien
        AFTER UPDATE ON pendaftaran FOR EACH ROW
        BEGIN
            IF NEW.status_konfirmasi = "berhasil" THEN
                INSERT INTO pasien (nama_pasien, tgl_lahir, id_pendaftaran, alamat, no_telp, no_bpjs, jenkel,foto_profil)
                VALUES (NEW.nama_pendaftar, NEW.tgl_lahir, NEW.id_pendaftaran, "-", "62", "08", "-" , "pasien.png")
                ON DUPLICATE KEY UPDATE
                    nama_pasien = NEW.nama_pendaftar,
                    tgl_lahir = NEW.tgl_lahir;
            END IF;
        END
    ');


// DB::unprepared('
// CREATE TRIGGER add_resep_dokter
// AFTER INSERT ON resep_dokter
// FOR EACH ROW
// BEGIN
//     DECLARE tanggal_pelayanan DATE;
//     DECLARE diagnosis VARCHAR(255); -- Sesuaikan tipe data dengan kolom yang sesuai
//     -- Tambahkan deklarasi variabel lainnya sesuai kebutuhan

//     -- Ambil data dari tabel rekam_medis berdasarkan no_rm
//     SELECT tanggal_pelayanan, diagnosis
//     INTO tanggal_pelayanan, diagnosis
//     -- Tambahkan variabel lainnya sesuai kebutuhan
//     FROM rekam_medis
//     WHERE no_rm = NEW.no_rm; -- NEW.no_rm adalah nilai foreign key pada resep_dokter yang baru diinsert

//     -- Lakukan operasi sesuai kebutuhan, contoh:
//     INSERT INTO logs(tabel, tanggal, jam, aksi, record)
//     VALUES ("resep_dokter", CURDATE(), CURTIME(), "Tambah", "Sukses");

//     -- Tambahkan operasi lainnya sesuai kebutuhan

// END
// ');



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER add_data_obat');
        DB::unprepared('DROP TRIGGER add_pendaftaran');
    }
};
