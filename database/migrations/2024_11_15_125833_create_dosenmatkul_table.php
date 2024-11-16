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
        Schema::create('dosenmatkul', function (Blueprint $table) {
            $table->id();
            $table->string('nip_dosen');
            $table->foreign('nip_dosen')->references('nip_dosen')->on('dosen')->onDelete('cascade');
            $table->string('kode_mk');
            $table->foreign('kode_mk')->references('kode_mk')->on('matakuliah')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dosenmatkul', function(Blueprint $table){
            $table->dropForeign(['nip_dosen']);
            $table->dropForeign(['kode_mk']);
        });
        Schema::dropIfExists('dosenmatkul');
    }
};
