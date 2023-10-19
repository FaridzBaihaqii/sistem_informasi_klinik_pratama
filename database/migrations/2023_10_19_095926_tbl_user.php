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
        {
            Schema::create('tbl_user', function (Blueprint $table) {
                $table->integer('id_user', true);
                $table->string('username',200);
                $table->text('password');
                $table->enum('peran',['resepsionis','asisten dokter', 'apoteker']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists9('tbl_user');
    }
};
