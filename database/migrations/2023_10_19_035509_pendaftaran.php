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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->bigIncrements('id_poli');
            $table->string('keluhan', 60);
            $table->date('tgl_pendaftaran');
            $table->date('tgl_pelayanan');
            $table->string('info_janji', 60);
            $table->unsignedBigInteger('id_resepsionis');
            $table->foreign('id_resepsionis')->references('id_resepsionis')->on('resepsionis');
            $table->unsignedBigInteger('id_pasien');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien');
            $table->unsignedBigInteger('id_pendaftaran');
            $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('pendaftaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
