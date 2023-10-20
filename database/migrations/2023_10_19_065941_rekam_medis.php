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
            $table->string('nama_pasien');
            $table->enum('ruangan', ['A1','A2','B3','B4']);
            $table->date('tgl_pelayanan');
            $table->string('keluhan_rm', 60);
            $table->text('diagnosis');
            $table->text('foto_pasien')->nullable(true);
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