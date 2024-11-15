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
        Schema::create('dosen', function (Blueprint $table) {
            $table->string('nip_dosen')->primary();
            $table->string('nama_dosen');
            $table->string('dosen');
            $table->string('dosen_wali');
            $table->string('kaprodi');
            $table->string('dekan');
            $table->string('kode_prodi');
            $table->foreign('kode_prodi')->references('kode_prodi')->on('program_studi')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dosen', function (Blueprint $table) {
            $table->dropForeign(['kode_prodi']);  // Menghapus foreign key 
        });

        Schema::dropIfExists('dosen');
    }
};
