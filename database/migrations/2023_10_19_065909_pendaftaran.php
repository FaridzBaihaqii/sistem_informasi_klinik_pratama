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
            $table->string('keluhan', 60);
            $table->date('tgl_pendaftaran');
            $table->enum('poli',['poli_umum', 'poli_gigi']);
            $table->date('jadwal_pelayanan');
            $table->string('info_janji', 60);
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