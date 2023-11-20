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
        Schema::create('resep_dokter', function (Blueprint $table) {
            $table->integer('id_resep', true)->nullable(false);
            $table->integer('no_rm');
            $table->integer('id_obat');
            
            $table->foreign('id_obat')->references('id_obat')->on('data_obat')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('no_rm')->references('no_rm')->on('rekam_medis')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
