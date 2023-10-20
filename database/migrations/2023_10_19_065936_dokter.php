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
        Schema::create('dokter', function (Blueprint $table) {
            $table->integer('id_dokter');
            $table->unsignedBigInteger('id_poli');
            $table->string('username', 255);
            $table->string('nama_dokter', 60);
            $table->bigInteger('no_telp');
            $table->text('foto_profil');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter');
    }
};
