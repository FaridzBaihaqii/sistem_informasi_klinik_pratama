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
            $table->string('username', 255);
            $table->string('nama_asisten', 255);
            $table->bigInteger('no_telp');
            $table->text('foto_profil');

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
