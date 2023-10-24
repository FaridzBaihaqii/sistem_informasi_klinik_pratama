<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    public function up(): void
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->integer('no_rm', true)->nullable(false);
            $table->enum('ruangan', ['A1','A2','B3','B4']);
            $table->date('tgl_pelayanan');
            $table->string('keluhan_rm', 60);
            $table->text('diagnosis');
            $table->integer('id_dokter');
            $table->integer('id_pasien');
            $table->text('foto_pasien')->nullable(true);
            $table->timestamps();

            $table->foreign('id_dokter')->references('id_dokter')->on('dokter')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_pasien')->references('id_pasien')->on('pasien')->onDelete('cascade')->onUpdate('cascade');
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