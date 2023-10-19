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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->increments('no_rm');
            $table->unsignedInteger('id_pendaftaran');
            $table->unsignedInteger('id_asisten');
            $table->unsignedInteger('id_dokter');
            $table->date('tgl_pelayanan');
            $table->string('keluhan_rm', 60);
            $table->text('diagnosis');
            
            $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('pendaftaran');
            $table->foreign('id_asisten')->references('id_asisten')->on('asisten_dokter');
            $table->foreign('id_dokter')->references('id_dokter')->on('dokter');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
