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
            $table->unsignedBigInteger('id_pendaftaran');
            $table->unsignedBigInteger('id_resepsionis');
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_poli');
            $table->string('keluhan', 60);
            $table->date('tgl_pendaftaran');
            $table->date('jadwal_pelayanan');
            $table->string('info_janji', 60);

            $table->foreign('id_resepsionis')->references('id_resepsionis')->on('resepsionis')->onDelete('cascade');

            $table->foreign('id_pasien')
                ->references('id_pasien')
                ->on('pasien')
                ->onDelete('cascade');

            $table->foreign('id_poli')
                ->references('id_poli')
                ->on('poli')
                ->onDelete('cascade');
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
