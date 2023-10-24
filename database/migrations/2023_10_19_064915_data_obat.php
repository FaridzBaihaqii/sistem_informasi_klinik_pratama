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
        Schema::create('data_obat', function (Blueprint $table) {
            $table->integer('id_obat', true);
            $table->string('nama_obat', 60)->nullable(false);
            $table->integer('stok_obat')->nullable(false);
            $table->integer('id_tipe', true, false)->nullable(false);
            $table->date('tgl_exp')->nullable(false)->default('2024-01-01');
            $table->text('foto_obat')->nullable(true);

            $table->foreign('id_tipe')->references('id_tipe')->on('tipe_obat')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_obat');
    }
};