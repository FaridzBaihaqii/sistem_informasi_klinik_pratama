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
        Schema::create('resepsionis', function (Blueprint $table) {
            $table->id('id_resepsionis');
            $table->string('username', 255);
            $table->string('nama_resepsionis', 60);
            $table->bigInteger('no_telp');
            $table->text('foto_profil');
            
            $table->foreign('username')->references('username')->on('akun')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resepsionis');
    }
};
