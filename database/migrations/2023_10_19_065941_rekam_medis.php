<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    public function up(): void
    {
        Schema::create('rekam_medis', function (Blueprint $table){
            /* Run the migrations.*/
            $table->integer('no_rm')->nulable(false);
            $table->unsignedBigInteger('id_pendaftaran');
            $table->integer('id_asisten');
            $table->integer('id_dokter');
            $table->date('tgl_pelayanan');
            $table->string('keluhan_rm', 60);
            $table->text('diagnosis');
            $table->foreign('id_pendaftaran')->on('pendaftaran')->references('id_pendaftaran');
            $table->foreign('id_asisten')->on('asisten_dokter')->references('id_asisten')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_dokter')->on('dokter')->references('id_dokter')->onDelete('cascade')->onUpdate('cascade');;
            
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