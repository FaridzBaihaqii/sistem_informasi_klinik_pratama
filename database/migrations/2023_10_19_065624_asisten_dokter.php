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
        Schema::create('asisten_dokter', function (Blueprint $table) {
            $table->integer('id_asisten');
            $table->string('id_user', 255)->index('id_user');
            $table->string('nama_asisten', 255);
            $table->bigInteger('no_telp');
            $table->text('foto_profil');
                    
            $table->foreign('id_user')->on('akun')->references('id_user')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIFExists('asisten_dokter');
    }
};
