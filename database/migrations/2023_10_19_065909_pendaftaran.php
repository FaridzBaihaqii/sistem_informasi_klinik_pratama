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
        Schema::create('pendaftaran', function (Blueprint $table) 
        {
            $table->integer('id_pendaftaran', true)->nullable(false);
            $table->string('nama_pendaftar', 60);
            $table->string('keluhan', 60);
            $table->date('tgl_pendaftaran');
            $table->integer('id_poli', false)->index('id_poli');
            $table->date('jadwal_pelayanan');
            $table->string('info_janji', 60);

            // Foreign
            $table->foreign('id_poli')->on('poli')
                ->references('id_poli')->onDelete('cascade')->onUpdate('cascade');
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