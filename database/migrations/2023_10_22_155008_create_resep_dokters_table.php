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
            // $table->id();
            // $table->timestamps();
            $table->integer('id_resep', true)->nullable(false);
            $table->integer('id_pasien', true);
            $table->date('tgl_pelayanan', true);
            $table->string('id_diagnosis', true);
            $table->string('id_diagnosis', true);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep_dokter');
    }
};
