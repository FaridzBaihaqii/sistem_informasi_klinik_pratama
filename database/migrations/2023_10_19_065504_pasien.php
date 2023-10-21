<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->integer('id_pasien', true)->nullable(false);
            $table->string('nama_pasien', 60);
            $table->string('jenkel', 60)->nullable();
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->bigInteger('no_telp');
            $table->bigInteger('no_bpjs');
            $table->text('foto_profil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};